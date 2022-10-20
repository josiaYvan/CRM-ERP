<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Tache;
use App\Models\Personnel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $personnel = Personnel::all();
        $conge = Conge::where('validité',1)->get();
        $tache = Tache::all();
        $tache_done = Tache::where('status', 1)->get();
        return view('dashboard', compact('conge', 'personnel', 'tache', 'tache_done'));
    }
}
