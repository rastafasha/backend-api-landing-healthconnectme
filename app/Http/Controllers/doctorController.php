<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class doctorController extends Controller
{
    public function index()
    {
        // $this->authorize('index', Payment::class);

        $doctores = Doctor::orderBy('created_at', 'DESC')
        ->get();


        return response()->json([
            'code' => 200,
            'status' => 'Listar todos los registros',
            'doctores' => $doctores,
        ], 200);
    }

    public function doctorStore(Request $request)
    {
        // $this->authorize('paymentStore', Payment::class);

        // try {
        //     DB::beginTransaction();

        //     $payment = new Payment();

        //     $file = null;
        //     if ($request->hasFile('image')) {
        //         $file = Uploader::uploadFile('image', 'public/payments');
        //     }

        //     $input = $this->paymentInput($file);
        //     $payment->fill($input)->save();

        //     DB::commit();
        //     return response()->json([
        //         'message' => 'Payment created successfully',
        //         'payment' => $payment,
        //     ], 201);
        // } catch (\Throwable $exception) {
        //     DB::rollBack();
        //     return response()->json([
        //         'message' => 'Error no crated' . $exception,
        //     ], 500);
        // }

        return Doctor::create($request->all());
    }

    public function doctorShow($id)
    {
       
        $doctor = Doctor::findOrFail($id);

        return response()->json([
            "doctor" => $doctor,
        ]);
    }

    public function doctorUpdate(Doctor $request,  $id)
    {
        try {
            DB::beginTransaction();

            $input = $request->all();
            $doctor = Doctor::find($id);
            $doctor->update($input);


            DB::commit();
            return response()->json([
                'code' => 200,
                'status' => 'Update doctor success',
                'doctor' => $doctor,
            ], 200);
        } catch (\Throwable $exception) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error no update'  . $exception,
            ], 500);
        }
    }

    public function doctorUpdateStatus(Request $request, $id)
    {
        $doctor = Doctor::findOrfail($id);
        $doctor->status = $request->status;
        $doctor->update();
        return $doctor;
    }

    public function doctorDestroy(Doctor $doctor)
    {
        $this->authorize('doctorDestroy', Doctor::class);

        try {
            DB::beginTransaction();

            if ($doctor->image) {
                Uploader::removeFile("public/doctors", $doctor->image);
            }

            $doctor->delete();

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
        $doctors = Doctor::orderBy('created_at', 'DESC')
        ->get();

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'doctors' => $doctors
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
         $workshop = Doctor::findOrFail($id);
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

     public function search(Request $request){
        return Doctor::search($request->buscar);
    }

}
