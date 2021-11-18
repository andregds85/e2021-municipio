<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Paciente;
use App\Models\User;
use Illuminate\Http\Request;


class soudomunicipio extends Controller
{
   
    function __construct()
    {
         $this->middleware('permission:municipio-list|Hospital-create|municipio-edit|municipio-delete', ['only' => ['index','show']]);
         $this->middleware('permission:municipio-create', ['only' => ['create','store']]);
         $this->middleware('permission:municipio-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:municipio-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
   
    {   
     return view('soudomunicipio.index');
    }

    
    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        
    }
    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
       
    }

    public function destroy($id)
    {
    
    }
}
