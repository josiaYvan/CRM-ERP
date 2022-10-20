<?php

namespace App\Http\Controllers;

use App\Mail\DeniedMail;
use App\Mail\ReplyMail;
use App\Mail\SendMail;
use App\Models\Conge;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 2 || Auth::user()->role == 3 ){
            $conges = Conge::all();

        }else {
            $conges = Conge::all()->where('collaborateur', Auth::user()->name);
        }
        return view('conges.index', compact("conges"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("conges.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = 'Demande de congé';

        $datetime1 = new DateTime($request->date_debut);
        $datetime2 = new DateTime($request->date_retour);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        if(Auth::user()->role == 0){
            $dest = "jhimguiyok@gmail.com";
        }else if(Auth::user()->role == 2){
            $dest = "lucgath11@gmail.com";
        }

        $request->validate([
            "motif" =>  ['required', "string", 'min:10'],
            "date_debut" =>  ['required','date_format:Y-m-d', 'after:now', 'before:date_retour'],
            "date_retour" =>  ['required', 'date_format:Y-m-d' ,'after:date_debut'] ,
        ]);

        if($this->isOnline()){

            $mail_data = [
                "nb_jour" => $days,
                "recipient" => $dest,
                "fromEmail" => Auth::user()->email,
                "fromName" => Auth::user()->name,
                "subject" => $subject,
                "motif" => $request->motif,
                "date_debut" => $request->date_debut,
                "date_retour" => $request->date_retour,
                "date" => now(),
                "maternite" => isset($request->maternite) ? "Oui" : "Non",
            ];

            Mail::to($dest)->send(new SendMail($mail_data))  ;

            Conge::create([
                "collaborateur" => Auth::user()->name,
                "destinataire" => $dest,
                "nb_jour" => $days,
                "motif" =>  $request->motif,
                "date_debut" =>  $request->date_debut,
                "date_retour" =>  $request->date_retour,
                "maternite" => isset($request->maternite) ? 1 : 0,
                "date" => now(),
            ]);

            return redirect()->back()->with('success', "Demande envoyé");

        }else {
            return redirect()->back()->with("danger", "Connectez-vous à internet!");
        }

    }

    public function isOnline($site = "https://youtube.com/"){
        if(@fopen($site, "r")){
            return true;
        }else{
            false;
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
        $conge = Conge::findOrFail($id);
        return view('conges.show', compact('conge'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = "Validation de la demande de congé";
        $conge = Conge::find($id);
        // mail vers le DG
        $dest = "lucgath11@gmail.com";
        if($this->isOnline()){
            $mail_data = [
                "recipient" => $dest,
                "subject" => $subject,
                "collaborateur" => $conge->collaborateur,
                "nb_jour" => $conge->nb_jour,
                "date" => now(),
            ];

        Mail::to($dest)->send(new ReplyMail($mail_data));
        }
        // retour de la demande du demandeur
        $dest2 = User::where('name', $conge->collaborateur)->get();
        foreach ($dest2 as $user) {
            if($this->isOnline()){
                $mail_data = [
                    "recipient" => $user->email,
                    "subject" => $subject,
                    "collaborateur" => $conge->collaborateur,
                    "nb_jour" => $conge->nb_jour,
                    "date" => now(),
                ];

                Mail::to($user->email)->send(new ReplyMail($mail_data));
            }

            $conge->update([
                'validité' => 1,
            ]);

            return redirect()->back()->with('success', "Validation effectuée.");

        }
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
        //
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

    public function denied($id) {
        $subject = "Retour de la demande de congé.";
        $conge = Conge::find($id);
        // retour de la demande du demandeur
        $dest2 = User::where('name', $conge->collaborateur)->get();
        foreach ($dest2 as $user) {
            if($this->isOnline()){
                $mail_data = [
                    "recipient" => $user->email,
                    "subject" => $subject,
                    "date" => now(),
                ];

                Mail::to($user->email)->send(new DeniedMail($mail_data));
            }

            $conge->update([
                'validité' => 2,
            ]);

            return redirect()->back()->with('success', "Validation effectuée.");

        }
    }
}
