<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\groupe;
use App\Models\demande;
use App\Models\demandesemployes;
use App\Models\Event;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function employes()
    {
         
         $data = DB::table('employes')
                    ->join('groupes', 'groupe_id', '=', 'groupes.Id')
                    ->select('employes.*', 'Name')
                    ->get();
        $emps = ['standard','directeur','manager'];
        $grps = groupe::all();
        return view("admin.employes",compact('data','emps','grps'));
    }
    public function demandes()
    {
        $data = DB::table('demandesemployes')
                    ->join('demandes', 'demande_id', '=', 'demandes.Id')
                    ->join('employes', 'employe_id', '=', 'employes.Id')
                    ->join('groupes', 'groupe_id', '=', 'groupes.Id')
                    ->select('FullNameEmp','Login','AvailableDays','demandes.Id','Name','demandes.*')
                    ->get();
        
        $grps = groupe::all();
        return view("admin.adminhome",compact('data','grps'));
    }
    public function deletemp($Id)
    {
        $data = DB::table('demandesemployes')
                    ->where('employe_id', '=', $Id)
                    ->get();
        
        $data2 = DB::table('demandesemployes')
                    ->where('employe_id', '=', $Id)
                    ->delete();
        ;
        
        foreach($data as $value)
        {
            $dmd = demande::find($value->demande_id);  
            $dmd->delete();
        }
        $rqs = Employe::find($Id);
        $rqs->delete();
        return redirect()->back();
    }
    public function editemp($Id)
    {
        $data = DB::table('employes')
                    ->join('groupes', 'groupe_id', '=', 'groupes.Id')
                    ->select('employes.*', 'Name')
                    ->where('employes.Id', '=', $Id)
                    ->get();

        $grps = groupe::all();
        $emps = ['standard','directeur','manager'];
         return view("admin.editemp",compact('data','grps','emps'));
    }
    public function profile($Id)
    {
        $data = DB::table('employes')
                    ->join('groupes', 'groupe_id', '=', 'groupes.Id')
                    ->select('employes.*', 'Name')
                    ->where('employes.Id', '=', $Id)
                    ->get();

        $grps = groupe::all();
        $emps = ['standard','directeur','manager'];
         return view("admin.editeprofile",compact('data','grps','emps'));
    }
    public function updatemp(Request $request,$Id)
    {
        $data = Employe::find($Id);
        $grp = DB::table('groupes')
                    ->select('Id')
                    ->where('Name', '=', $request->Name)
                    ->get();
        // $type = DB::table('employes')
        //             ->select('Type')
        //             ->where('Type', '=', $request->Type)
        //             ->get();
        // $request->validate([
        //     'FullNameEmp' => ['required', 'string', 'max:255'],
        //     // 'Login' => ['required', 'string', 'email', 'max:255', 'unique:employes'],
        //     'Password' => ['string', 'min:8','same:password-confirmation'], 
        // ]);
        
        $rules=[
            'FullNameEmp' => ['required', 'string', 'max:255'],
            'Login' => ['required', 'string', 'email', 'max:255', Rule::unique('employes')->ignore($request->Id)],
            'Password' => ['nullable','string', 'min:8','same:password-confirmation'],
        ];
        $error_messages=[
            'Password.same'=>'->password are not the same password must match same value',
            'Password.min'=>'->password length must be greater than 8 characters',
            'Password.string'=>'->The password must be a string',
        ];

        $validator=  validator($request->all(), $rules, $error_messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

                $data->FullNameEmp = $request->FullNameEmp;
                $data->Login = $request->Login;
                if(!is_null($request->Password))
                {
                    $data->Password = Hash::make($request->Password);
                

                }
                $data->groupe_Id  = $grp[0]->Id;
                $data->Type = $request->Type;
                $data->save();
                return redirect()->back();
}
    public function validm($Id)
    {
        $dmd = DB::table('demandesemployes')
                    ->select('demandesemployes.*')
                    ->where('demande_Id', '=', $Id)
                    ->get();
        $emp = Employe::find($dmd[0]->employe_id);
        $data = demande::find($Id);
        $s=$data->start_at;
        $e=date('d-m-Y',strtotime($s)+$data->RequestDays*3600*24);
        $e = date('Y-m-d H:i:s', strtotime($e));
        DB::insert('insert into events (id,title,start,end) values (?, ?, ?, ?)', [$Id,'Congés de : '.$emp->FullNameEmp,$s,$e]);
        $data = demande::find($Id);
        $data->State = 'validated';
        $data->save();
        return redirect()->back();
    }
    public function refusedm($Id)
    {   
        $dmd = DB::table('demandesemployes')
                    ->select('demandesemployes.*')
                    ->where('demande_Id', '=', $Id)
                    ->get();
        $data = demande::find($Id);
        $emp = Employe::find($dmd[0]->employe_id);
        $emp->AvailableDays = $emp->AvailableDays + $data->RequestDays;
        $emp->save();
        $data->State = 'refused';
        $data->save();
        return redirect()->back();
    }
 
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function insert(Request $request)
    {
        $grp = DB::table('groupes')
                    ->select('Id')
                    ->where('Name', '=', $request->Name)
                    ->get();
        $rules=[
            'FullNameEmp' => ['required', 'string', 'max:255'],
            'Login' => ['required', 'string', 'email', 'max:255','unique:employes'],
            'Password' => ['required','string', 'min:8','same:password-confirmation'],
            'AvailableDays' => ['required'],
        ];
        $error_messages=[
            'Password.same'=>'->password are not the same password must match same value',
            'Password.min'=>'->password length must be greater than 8 characters',
            'Password.string'=>'->The password must be a string',
        ];

        $validator=  validator($request->all(), $rules, $error_messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        DB::insert('insert into employes (FullNameEmp,Login,Password,groupe_Id,Type,AvailableDays) values (?, ?, ?, ?, ?, ?)', [$request->FullNameEmp,$request->Login,Hash::make($request->Password),$grp[0]->Id,$request->Type,$request->AvailableDays]);
                return redirect()->back();
    }
    public function addemp()
    {
        $grps = groupe::all();
        $emps = ['standard','directeur','manager'];
         return view("admin.addemp",compact('grps','emps'));
    }
    public function admcalendar(REQUEST $request)
    {
        if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
            
            return response()->json($data);
    	}
        return view("admcalendar");
    }


 }
