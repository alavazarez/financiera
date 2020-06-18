<?php

namespace App\Exports;
use App\Models\Client;
use App\Models\Prestamo;
use App\Models\Pago;
use Maatwebsite\Excel\Concerns\FromCollection;

class PagosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        //$products = Productos::select('productos.*', 'categoria.nombre as categoria', 'genero.nombre as genero')->with(['categoria', 'genero'])->get();
        $download = Prestamo::with('pagos')->select('cuota')->get();

        //$products = Productos::join('Categorias','idCategoria', '=', 'Categorias.id')->select('Productos.id','Productos.nombre','Categorias.nombre as NombreCategoria')->get();
        //select("id", "cuota")->get();
        //->where('comercial_id', '=', Auth::user()->id)->get();
        return $download;
    }
}
