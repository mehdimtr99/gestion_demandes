<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\groupe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function redirects()
    {
        $data = DB::table('demandesemployes')
                    ->join('demandes', 'demande_id', '=', 'demandes.Id')
                    ->join('employes', 'employe_id', '=', 'employes.Id')
                    ->join('groupes', 'groupe_id', '=', 'groupes.Id')
                    ->select('FullNameEmp','Login','AvailableDays','employes.Id','Name','demandes.*')
                    ->get();
        $grps = groupe::all();

        $data1 = DB::table('demandesemployes')
                    ->join('demandes', 'demande_id', '=', 'demandes.Id')
                    ->join('employes', 'employe_id', '=', 'employes.Id')
                    ->join('groupes', 'groupe_id', '=', 'groupes.Id')
                    ->select('FullNameEmp','Login','AvailableDays','employes.Id','Name','demandes.*')
                    ->where('groupe_id','=',Auth::user()->groupe_Id)
                    ->get();
        $data2 = DB::table('demandesemployes')
                    ->join('demandes', 'demande_id', '=', 'demandes.Id')
                    ->join('employes', 'employe_id', '=', 'employes.Id')
                    ->join('groupes', 'groupe_id', '=', 'groupes.Id')
                    ->select('FullNameEmp','Login','AvailableDays','employes.Id','Name','demandes.*')
                    ->where('employe_id','=',Auth::user()->Id)
                    ->get();
        
        
        $usertype = Auth::user()->Type;
        if($usertype == 'directeur')
        {
            return view("admin.adminhome",compact('data','grps'));
        }
        elseif($usertype == 'manager')
        {
            return view('manager.managerhome',compact('data1','grps'));    
        }
        else
        {
            return view('standard.standardhome',compact('data2','grps')); 
        }
    }
}
