<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\RegistroL;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\InvitacionClinicaMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewWorkshopRegisterMail;
use App\Mail\InvitacionConsultorioMail;

class registroLandingController extends Controller
{
    public function index()
    {
        // $this->authorize('index', Payment::class);

        $rlandings = RegistroL::orderBy('created_at', 'DESC')
        ->get();


        return response()->json([
            'code' => 200,
            'status' => 'Listar todos los registros',
            'rlandings' => $rlandings,
        ], 200);
    }

    public function config($type_id)
    {

        $rlanding = RegistroL::where("type_id", $type_id)->get();

        return response()->json([
            "rlanding" => $rlanding,
        ]);
    }

    public function registrolStore(Request $request)
    {
       
        // return RegistroL::create($request->all());


        

        // $patient_is_valid = Patient::where("n_doc", $request->n_doc)->first();

        // if($patient_is_valid){
        //     return response()->json([
        //         "message"=>403,
        //         "message_text"=> 'el paciente ya existe'
        //     ]);
        // }

        // if($request->hasFile('imagen')){
        //     $path = Storage::putFile("patients", $request->file('imagen'));
        //     $request->request->add(["avatar"=>$path]);
        // }

        // if($request->birth_date){
        //     $date_clean = preg_replace('/\(.*\)|[A-Z]{3}-\d{4}/', '',$request->birth_date );
        //     $request->request->add(["birth_date" => Carbon::parse($date_clean)->format('Y-m-d h:i:s')]);
        // }

        $rlanding = RegistroL::create($request->all());

        $request->request->add([
            "rlanding_id" =>$rlanding->id
        ]);

        // Mail::to($patient->email)->send(new NewPatientRegisterMail($patient));
        Mail::to('mercadocreativo@gmail.com')->send(new NewWorkshopRegisterMail($rlanding));

        
        return response()->json([
            "message"=>200,
        ]);
    }

    public function registrolShow($id)
    {
       
        $rlanding = RegistroL::findOrFail($id);

        return response()->json([
            "rlanding" => $rlanding,
        ]);
    }

    public function registrolUpdate(RegistroL $request,  $id)
    {
        try {
            DB::beginTransaction();

            $input = $request->all();
            $rlanding = RegistroL::find($id);
            $rlanding->update($input);


            DB::commit();
            return response()->json([
                'code' => 200,
                'status' => 'Update rlanding success',
                'rlanding' => $rlanding,
            ], 200);
        } catch (\Throwable $exception) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error no update'  . $exception,
            ], 500);
        }
    }

    public function registrolUpdateStatus(Request $request, $id)
    {
        $rlanding = RegistroL::findOrfail($id);
        $rlanding->status = $request->status;
        $rlanding->update();
        return $rlanding;
    }

    public function registrolUpdateType(Request $request, $id)
    {
        $rlanding = RegistroL::findOrfail($id);
        $rlanding->type_id = $request->type_id;
        $rlanding->update();
        return $rlanding;
    }

    public function registrolDestroy(RegistroL $rlanding)
    {
        $this->authorize('doctorDestroy', RegistroL::class);

        try {
            DB::beginTransaction();

            if ($rlanding->image) {
                Uploader::removeFile("public/rlandings", $rlanding->image);
            }

            $rlanding->delete();

            DB::commit();
            return response()->json([
                'code' => 200,
                'status' => 'doctor delete',
            ], 200);
        } catch (\Throwable $exception) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Borrado fallido. Conflicto',
            ], 409);
        }
    }

    public function recientes()
    {
        $rlandings = RegistroL::orderBy('created_at', 'DESC')
        ->get();

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'rlandings' => $rlandings
        ], 200);
    }

    public function upload(Request $request)
     {
         // recoger la imagen de la peticion
         $image = $request->file('file0');
         // validar la imagen
         $validate = \Validator::make($request->all(),[
             'file0' => 'required|image|mimes:jpg,jpeg,png,gif'
         ]);
         //guardar la imagen en un disco
         if(!$image || $validate->fails()){
             $data = [
                 'code' => 400,
                 'status' => 'error',
                 'message' => 'Error al subir la imagen'
             ];
         }else{
            $extension = $image->getClientOriginalExtension();
            $image_name = $image->getClientOriginalName();
            $pathFileName = trim(pathinfo($image_name, PATHINFO_FILENAME));
            $secureMaxName = substr(Str::slug($image_name), 0, 90);
            $image_name = now().$secureMaxName.'.'.$extension;

             \Storage::disk('workshops')->put($image_name, \File::get($image));

             $data = [
                 'code' => 200,
                 'status' => 'success',
                 'image' => $image_name
             ];

         }

         //return response($data, $data['code'])->header('Content-Type', 'text/plain'); //devuelve el resultado

         return response()->json($data, $data['code']);// devuelve un objeto json
     }

     public function getImage($filename)
     {

         //comprobar si existe la imagen
         $isset = \Storage::disk('workshops')->exists($filename);
         if ($isset) {
             $file = \Storage::disk('workshops')->get($filename);
             return new Response($file, 200);
         } else {
             $data = array(
                 'status' => 'error',
                 'code' => 404,
                 'mesaje' => 'Imagen no existe',
             );

             return response()->json($data, $data['code']);
         }

     }

     public function deleteFotoWorkshop($id)
     {
         $workshop = RegistroL::findOrFail($id);
         \Storage::delete('workshops/' . $workshop->image);
         $workshop->image = '';
         $workshop->save();
         return response()->json([
             'data' => $workshop,
             'msg' => [
                 'summary' => 'Archivo eliminado',
                 'detail' => '',
                 'code' => ''
             ]
         ]);
     }

     public function sendInvitation(Request $request, $id)
    {
        $workshop = RegistroL::findOrfail($id);
        $workshop->type_id = $request->type_id;
        $workshop->update();
        if($request->type_id ===2){
            //mail to 
            Mail::to($workshop->email)->send(new InvitacionConsultorioMail($workshop));
        }
        if($request->type_id ===1){
            Mail::to($workshop->email)->send(new InvitacionClinicaMail($workshop));
        }

        return $workshop;
        
    }

     public function search(Request $request){
        return RegistroL::search($request->buscar);
    }
}
