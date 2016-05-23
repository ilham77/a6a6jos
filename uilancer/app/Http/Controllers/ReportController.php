<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Report;
use App\User;

class ReportController extends Controller
{

    public function report(Request $request){
        $report = new Report();
        $user = User::find($request->user);
        $pelapor = Auth::user();
        $report->judul=$request->judul;
        $report->keluhan = $request->keluhan;
        $report->reported_id = $user->id;
        $report->reported_name = $user->name;
        if($pelapor->role="mahasiswa" or $pelapor->role="admin"){
        $report->asal_instansi = $pelapor->faculty;
        }else{
        $report->asal_instansi = $pelapor->asal_instansi;
        }
        $report->pelapor = $pelapor->name;
        $report->save();
        return redirect('/profile/'.$user->id);
}

}