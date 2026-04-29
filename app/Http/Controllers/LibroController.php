<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(){
        return "lista de libros";
    }
     public function create(){
       return view('store');
    }
     public function store(){

    }
     public function show(){

    }
     public function edit(){

    }
     public function update(){

    }
     public function destroy(){

    }


}
