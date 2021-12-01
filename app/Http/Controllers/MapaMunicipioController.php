<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\municipio_mapa_p3;


use App\Models\Pacientes;



class MapaMunicipioController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:mapas-list|mapas-create|mapas-edit|mapas-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mapas-create', ['only' => ['create','store']]);
         $this->middleware('permission:mapas-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mapas-delete', ['only' => ['destroy']]);
    }
   
     public function index()
    {
    
    }
   
    public function show($id)
    {
        return view('MapaMunicipio.observacao',['id'=>$id]);

    }

     public function store(Request $request)
    {
            request()->validate([
 
        ]);

       municipio_mapa_p3::create($request->all());
 
    }
    

    
}





