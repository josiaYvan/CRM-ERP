<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Rules\Uppercase;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clients = Client::orderBy('id')->paginate(4);

        return view('clients.index', compact('clients'));
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
            'nom' =>  ['required', new Uppercase],
            'description' =>  'required|min:5'
        ]);


        $nom =  $request->nom;
        $description =  $request->description;


        Client::create([
            'nom' => $nom,
            'description' => $description,
        ]);

        session()->flash("success", "Client Enregistré.");

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

        $client = Client::find($id);


        return view('clients.edit', compact('client'));
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

        $request->validate([
            'nom' =>  ['required', new Uppercase],
            'description' =>  'required|min:5'
        ]);


        $nom =  $request->nom;
        $description =  $request->description;

        $client->update(['nom' => $nom, 'description' => $description]);

        session()->flash("success", "Client modifié.");

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
        session()->flash("success", "Client supprimé.");
        Client::find($id)->delete();
        return redirect()->route('clients.index');
    }
}
