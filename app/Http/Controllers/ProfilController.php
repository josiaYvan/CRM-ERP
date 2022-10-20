<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("auth.show_profil");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfilRequest $request)
    {

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
        $user = User::find($id);
        return view("auth.update_profil", compact("user"));
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
        $user = User::find($id);
        if ($request->hasFile('image')) {
            $fileext = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileext, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $store = $filename . '_' . time() . '.' . $ext;
            $request->file('image')->storeAs('public/image_profil', $store);
            if ($request->image != 'noimage.jpg') {
                Storage::delete('public/image_profil/' . $request->image);
            }

            $user->update([
                'name' =>$request->name,
                'first_name' =>$request->first_name,
                'email' =>$request->email,
                'telephone' =>$request->telephone,
                'biography' =>$request->biography,
                'image' => isset($request->image) ?  $store : 'noimage.jpg',
            ]);
            return redirect()->route("profils.index");
        }else {
            $user->update([
                'name' =>$request->name,
                'first_name' =>$request->first_name,
                'email' =>$request->email,
                'telephone' =>$request->telephone,
                'biography' =>$request->biography,
            ]);
        return redirect()->route("profils.index");
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
