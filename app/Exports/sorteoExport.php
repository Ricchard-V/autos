<?php

namespace App\Exports;


use App\Models\Cliente;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class sorteoExport implements FromView
{

    use Exportable;


    public function view(): View
    {
        return view('exports.clientes',[
            'clientes' => Cliente::get()
        ]);
    }
}
