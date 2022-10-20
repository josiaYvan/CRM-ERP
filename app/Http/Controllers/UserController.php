<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Personnel;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnels = Personnel::all();
        return view('user.create', compact("personnels"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->name != null) {

            $personnel = Personnel::find($request->name);
            $request->merge([ 'email' => $personnel->email ]);

            $validate = Validator::make($request->all(), [
            'name' => ['required', 'integer'],
            'password' => ['required', 'min:8'],
            'email' => ['required', 'unique:users,email'],
            'role' => ['required', 'integer', 'max:1'],
        ]);

        $attributs = [
            'name' => 'nom',
            'password' => 'mot de passe',
            'role' => 'statut',
            'email' => 'email',
        ];

        $validate->setAttributeNames($attributs);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data['name'] = $personnel->nom;
        $data['email'] = $personnel->email;
        $data['role'] = $request->role;
        if($request->role == "1"){
            $data['status'] = 'Administrateur';
        }else{
            $data['status'] = 'Utilisateur';
        };
        $data['password'] = Hash::make($request->password);
        User::create($data);
        session()->flash("success","Utilisateur ajoouté.");
        return redirect()->route('users.index');
    }
    else {
        session()->flash("danger","Erreur, champs vides !");
        return redirect()->back();
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
        $user=User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {

        $data = User::findOrFail($id);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);
        $data->update();
        session()->flash("success","Modification réussi.");

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('success', 'Suppression réussi');
        return redirect()->route('users.index');
    }
}
