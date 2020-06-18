<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Prestamo;
use App\Models\Pago;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientsImport;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients =Client::all();
        return view('clients.index', [
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'names'  => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Client::create([
            'name'    => $request->input('names'),
            'phone'   => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('clients.edit', [
            'client'=> $client
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        foreach($client->prestamos as $prestamo)
        {
            foreach($prestamo->pagos as $pago)
            {
                $pago->delete();
            }
            $prestamo->delete();
        }
        $client->delete();
        
        return $client;
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ClientsImport, $file);

        return back()->with('message', 'Importancion de clientes completada');
    }
}
