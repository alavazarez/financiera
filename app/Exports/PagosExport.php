<?php

namespace App\Exports;
use App\Models\Client;
use App\Models\Prestamo;
use App\Models\Pago;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\withHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutosize;

class PagosExport implements FromCollection, withHeadings, WithMapping, ShouldAutosize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $prestamo = Prestamo::with('client')->get();

        return $prestamo;
    }

    public function map($prestamo): array
    {
        return[
            $prestamo->id,
            $prestamo->client->name,
            $prestamo->cantidad,
            $prestamo->noPagos,
            $prestamo->cuota,
            $prestamo->totalPagar,
            $prestamo->pagos_realizados,
            $prestamo->prestamo_abonado,
            $prestamo->prestamo_restante,
        ];
    }

    public function headings():array
    {
        return[
            '#',
            'Nombre del cliente',
            'Cantidad prestada',
            'No. de pagos',
            'Cuota',
            'Total a pagar',
            'Pagos realizados',
            'Saldo abonado',
            'Saldo pendiente',
        ];
    }


}
