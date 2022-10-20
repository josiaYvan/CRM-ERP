<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonnelRequest;
use App\Models\Personnel;
use App\Models\Poste;
use App\Rules\Date;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $personnels = Personnel::all();
        return view('personnels.index', compact('personnels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postes = Poste::all();
        return view('personnels.create', compact('postes'));
    }

    /**
     * Store a newly created resource in storage.
     *a
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonnelRequest $request)
    {

        if ($request->hasFile('image')) {
            $fileext = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileext, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $store = $filename . '_' . time() . '.' . $ext;
            $request->file('image')->storeAs('public/image_profil', $store);
            if ($request->image != 'noimage.jpg') {
                Storage::delete('public/image_profil/' . $request->image);
            }
            Personnel::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'date_naissance' => $request->date,
            'poste_id' => $request->poste,
            'image' => isset($request->image) ?  $store : 'noimage.jpg'
        ]);


        session()->flash("success", "Personnel Enregistré.");

        return redirect()->route('personnels.index');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personnel = Personnel::find($id);
        $postes = Poste::all();
        return view('personnels.show', compact(['personnel', 'postes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postes = Poste::all();
        $personnel = Personnel::find($id);
        return view('personnels.update',  compact(['personnel', 'postes']));
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
        $request->validate([
            'nom' => ['required','string','min:3','max:255',new Uppercase],
            'prenom' => ['required','string','min:3','max:255',new Uppercase],
            'date' => ['required','date_format:Y-m-d', new Date],
            'email' => 'required|email',
            'telephone' => 'required|numeric|min:10',
            'poste' => 'required',
        ]);

        if ($request->hasFile('image'))
        {
            $fileext = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileext, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $store = $filename . '_' . time() . '.' . $ext;
            $request->file('image')->storeAs('public/image_profil', $store);


            if ($request->image != 'noimage.jpg')
            {
                Storage::delete('public/image_profil/' . $request->image);
            }

            Personnel::find($id)->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'image' => $store,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'date_naissance' => $request->date,
                'poste_id' => $request->poste
            ]);
        }
        else
        {
            Personnel::find($id)->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'date_naissance' => $request->date,
                'poste_id' => $request->poste
            ]);

        }
        session()->flash("success", "Modification enregistrée.");

        return redirect()->route('personnels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        session()->flash("success", "Personnel Supprimé.");
        Personnel::find($id)->delete();
        return redirect()->route('personnels.index');
    }
}
