<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Personnel;
use Illuminate\Http\Request;
use App\Http\Requests\TacheStoreRequest;

class TachesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taches = Tache::paginate(10);
        return view('taches.index', compact('taches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnel = Personnel::all();
        return view('taches.create', compact('personnel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TacheStoreRequest $request)
    {
        $data['titre'] = $request->titre;
        $data['date_debut'] = $request->date_debut;
        $data['date_fin'] = $request->date_fin;
        $data['description'] = $request->description;
        $data['personnel_id'] = $request->personnel;
        Tache::create($data);
        session()->flash('success', 'Insertion réussi');
        return redirect()->route('taches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tache = Tache::find($id);
        return view('taches.show', compact('tache'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tache = Tache::find($id);
        $personnel = Personnel::all();
        return view('taches.edit', compact('tache', 'personnel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TacheStoreRequest $request, $id)
    {
        $tache = Tache::find($id);
        $data['titre'] = $request->titre;
        $data['date_debut'] = $request->date_debut;
        $data['date_fin'] = $request->date_fin;
        $data['description'] = $request->description;
        $data['personnel_id'] = $request->personnel;
        $tache->update($data);
        session()->flash('success', 'Modification réussi');
        return redirect()->route('taches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tache::find($id)->delete();
        session()->flash('success', 'Suppression réussi');
        return redirect()->route('taches.index');
    }

    public function done($id){
        Tache::find($id)->update([
            "status" => 1
        ]);
        session()->flash('success', 'Tache terminé');
        return redirect()->route('taches.index');
    }
}
