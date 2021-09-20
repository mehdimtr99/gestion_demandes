<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employe;
use App\Models\Event;
use App\Models\demande;
use Illuminate\Support\Facades\Auth;



class ManagerController extends Controller
{
    public function empmanager()
    {
         
         $data = DB::table('employes')
                    ->select('employes.*')
                    ->where('groupe_id','=',Auth::user()->groupe_Id)
                    ->get();
        $emps = ['standard','directeur','manager'];
        return view("manager.employe",compact('data','emps'));
    }
    public function approuve($Id)
    {
        $data = demande::find($Id);
        $data->State = 'approved';
        $data->save();
        return redirect()->back();
    }
    public function cancelapprove($Id)
    {
        $data = demande::find($Id);
        $data->State = 'created';
        $data->save();
        return redirect()->back();
    }
    public function calendar(REQUEST $request)
    {
        if($request->ajax())
    	{
            $data = DB::table('demandesemployes')
                    ->join('demandes', 'demande_Id', '=', 'demandes.Id')
                    ->join('employes', 'employe_Id', '=', 'employes.Id')
                    ->join('events', 'events.id','=','demandes.Id')
                    ->where('groupe_Id','=',Auth::user()->groupe_Id)
                    ->whereDate('start', '>=', $request->start)
                    ->whereDate('end',   '<=', $request->end)
                    ->get(['events.id', 'title', 'start', 'end']);

    		// $data = Event::whereDate('start', '>=', $request->start)
            //            ->whereDate('end',   '<=', $request->end)
            //            ->where('Event.id','=',$data1->Id)
            //            ->get(['id', 'title', 'start', 'end']);
            
            return response()->json($data);
    	}
        return view("calendar");
    }
}
