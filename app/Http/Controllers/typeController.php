<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class typeController extends Controller
{
    public function index(Request $request)
    {
        // QUE EL FILTRO POR NOMBRE DE ROL
        $name = $request->search;

        $types = Type::where("name","like","%".$name."%")->orderBy("id","desc")->get();

        return response()->json([
            "types" => $types->map(function($rol) {
                return [
                    "id" => $rol->id,
                    "name" => $rol->name,
                    "state" => $rol->state,
                    // "price" => $rol->price,
                    "created_at" => $rol->created_at->format("Y-m-d h:i:s")
                ];
            }),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $is_type = Type::where("name",$request->name)->first();

        if($is_type){
            return response()->json([
                "message" => 403,
                "message_text" => "EL NOMBRE DE LA ESPECIALIDAD YA EXISTE"
            ]);
        }

        $type = Type::create($request->all());

        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = Type::findOrFail($id);
        return response()->json([
            // "id" => $type->id,
            // "state" => $type->state,
            // "name" => $type->name,
            "type" => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $is_type = Type::where("id","<>",$id)->where("name",$request->name)->first();

        if($is_type){
            return response()->json([
                "message" => 403,
                "message_text" => "EL NOMBRE DE LA ESPECIALIDAD YA EXISTE"
            ]);
        }

        $type = Type::findOrFail($id);
        $type->update($request->all());
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
