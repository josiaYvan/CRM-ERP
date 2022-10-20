<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;

class PostesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $postes =  Poste::orderBy('id')->paginate(7);




        return view('postes.index', compact('postes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postes.create');
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
            'nom' => 'required|unique:postes,nom',
            'description' => 'required|min:7|max:300'
        ]);
        $nom = $request->nom;
        $description = $request->description;
        Poste::create([
            'nom' => $nom,
            'description' => $description
        ]);
        session()->flash('success', 'Insertion réussi');
        return redirect()->route('postes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poste = Poste::find($id);
        return view('postes.show', compact('poste'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poste = Poste::find($id);
        return view('postes.edit', compact('poste'));
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
        $poste = Poste::find($id);
        $request->validate([
            'nom' => 'required|unique:postes,nom,'.$id,
            'description' => 'required|min:7|max:300'
        ]);
        $nom = $request->nom;
        $description = $request->description;
        $poste->update(['nom' => $nom,
            'description' => $description
    ]);
        session()->flash('success', 'Modification réussi');
        return redirect()->route('postes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Poste::find($id)->delete();
        session()->flash('success', 'Suppression réussi');
        return redirect()->route('postes.index');
    }
}
