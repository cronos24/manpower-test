<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use Illuminate\Support\Facades\Validator;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $categories = Categorias::all(['id','name']);
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required|max:45',        
            ];
        $messages=[
            'required' => 'El campo <strong> ":attribute" </strong> es obligatorio.',
            'max' => 'El campo <strong> ":attribute" </strong> excede el tamaño maximo permitido.',
            ];
        $attributes=[
                'name'=>'Nombre'
            ];


        $validator=Validator::make($request->all(),$rules,$messages,$attributes);


        if($validator->fails())
        {
            $response['status'] = 'fail';
            $response['response'] = $validator->errors();
        }else{
            $categoria = new Categorias;
            $categoria->name       = $request->name;
            $categoria->save();

      
            $response['status'] = 'success';
            $response['response'] = $categoria;
        }


        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categorias::find($id);
        return response()->json($categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $rules=[
            'name'=>'required|max:45',        
            ];
        $messages=[
            'required' => 'El campo <strong> ":attribute" </strong> es obligatorio.',
            'max' => 'El campo <strong> ":attribute" </strong> excede el tamaño maximo permitido.',
            ];
        $attributes=[
                'name'=>'Nombre'
            ];


        $validator=Validator::make($request->all(),$rules,$messages,$attributes);


        if($validator->fails())
        {
            $response['status'] = 'fail';
            $response['response'] = $validator->errors();
        }else{
            $categoria = Categorias::find($id);
            $categoria->name       = $request->name;
            $categoria->save();

      
            $response['status'] = 'success';
            $response['response'] = $categoria;
        }


        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categorias::find($id);
        $categoria->delete();

        $response['status'] = 'success';
        $response['response'] = $categoria;

        return response()->json($response);
    }
}
