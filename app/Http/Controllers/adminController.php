<?php

namespace App\Http\Controllers;

use App\Exports\sorteoExport;
use App\Http\Requests\landingRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }
    public function index(){
        $clientes = Cliente::get();

        return view('admin.index',compact('clientes'));
    }

    public function store(landingRequest $request){
        Cliente::create($request->all());
        $ganador = Null;
        
        // 
        if (Cliente::count() == 5){
            $this->sorteo();
        }
        return redirect()->route('landing')->with('status');
    }

    public function show($id){
        return (new sorteoExport)->download(date('Ymd').'-clientes.xlsx');
    }

    //realiza el sorteo y actualiza el campo ganador al id seleccionado de forma aleatoria
    public function sorteo(){
        $ganador = Cliente::inRandomOrder()->take(1)->get();
        Cliente::find($ganador[0]->id)->update(['ganador'=>'Ganador']);
        session(['ganador'=>$ganador]);

    }

}
