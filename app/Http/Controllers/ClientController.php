<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\CreateClientRequest;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\cr;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('created_at', 'desc')->paginate(7);
        return view('client.clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        $input = $request->validated();
        $c = new Client($input);
        $c->save();
        if ($input['companies']) {
            $c->companies()->attach( array_unique(explode(', ', $input['companies'])) );
        }
        return redirect(route('client.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($client)
    {
        $c = Client::findOrFail($client);
        return view('client.edit',compact('c'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $cr)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($client)
    {
        $c = Client::findOrFail($client);
        $c->delete();
        return redirect(route('client.index'));
    }
}
