<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\Employe;
use App\Models\groupe;
use App\Models\demande;
use App\Models\demandesemployes;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;

class StandardController extends Controller
{
    public function deletedmd($Id)
    {
        $data = DB::table('demandesemployes')
                    ->where('demande_id', '=', $Id)
                    ->get();
        
        $data2 = DB::table('demandesemployes')
                    ->where('demande_id', '=', $Id)
                    ->delete();   
        foreach($data as $value)
        {   $dmd = demande::find($value->demande_id);
            $data = Employe::find(Auth::user()->Id);
            if($dmd->State != 'refused')
            {
                $data->AvailableDays = $data->AvailableDays + $dmd->RequestDays;
                $data->save();
            }
            $dmd->delete();
        }
        
        return redirect()->back();
    }
    public function postuledmd()
    {
         return view("standard.nvdemande");
    }
    public function insertdmd(Request $request)
    {
        $grp = DB::table('employes')
                    ->select('*')
                    ->where('Id', '=', )
                    ->get();
        $maxx=Auth::user()->AvailableDays;
        
        $rules=[
            'RequestDays' => ['required','lte:'.$maxx],
            'start_at' => ['required'],
        ];
        $error_messages=[
         
            'RequestDays.lte'=>'jours disponibles : '.$maxx.'jours',
           
        ];

        $validator=  validator($request->all(), $rules, $error_messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $data = Employe::find(Auth::user()->Id);
        $data->AvailableDays = $data->AvailableDays - $request->RequestDays;
        $data->save();
        $nvid=demande::max('Id')+1;
        DB::insert('insert into demandes (Id,Type,RequestDays,start_at) values (?,?, ?, ?)', [$nvid,$request->Type,$request->RequestDays,$request->start_at]);
        
        DB::insert('insert into demandesemployes (employe_id,demande_id) values (?, ?)', [Auth::user()->Id,$nvid]);
                return redirect()->back();
    }
       
}
