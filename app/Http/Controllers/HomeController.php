<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
        return view('home');
    }
   
    public function AddClinicPage()
    {

        return view('app.add-clinic');
    }

    public function AddClinic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'name' => "required|string",            
            'phone' => "required|numeric",

        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }
      
        $clinic= new \App\Clinic();
        $clinic->name=$request['name'];
        $clinic->phone=$request['phone'];
        $clinic->save();
            
        $message ='Added is done !';
        return back()->with(['message' => $message,'new'=>false]);

    }
    
     public function AddDoctorPage()
    {
        $clinics=\App\Clinic::pluck('name','id')->all();
        return view('app.add-doctor',['clinics'=>$clinics]);
    }

    public function AddDoctor(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'clinic_id' => 'required|string',
            'password' => 'required|string|min:6|confirmed',     
        ]);
       
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        \App\User::create([
            'name' => $request['name'],
            'type' => 'doctor',
            'clinic_id'=>$request['clinic_id'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
       
        $message ='Added is done !';
        return back()->with(['message' => $message,'new'=>false]);  
      }

      public function AddClerk(Request $request)
      {
  
          $validator = Validator::make($request->all(), [
              'name' => 'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|confirmed',     
          ]);
         
          if ($validator->fails()) {
              return redirect()->back()->withErrors($validator)->withInput();
          }
         
          \App\User::create([
              'name' => $request['name'],
              'type' => 'clerk',
              'clinic_id'=>0,
              'email' => $request['email'],
              'password' => Hash::make($request['password']),
          ]);
         
          $message ='Added is done !';
          return back()->with(['message' => $message,'new'=>false]);  
        }

    public function AddClerkPage()
    {
            return view('app.add-clerk');
    }

    public function AddPatientPage()
    {
        $clinics=\App\Clinic::pluck('name','id')->all();
        
        return view('app.patient',['clinics'=>$clinics,'new'=>false]);
    } 

    public function AddAppointmentPage()
    {
        $appointments=\App\Appointment::get();
        $clinics=\App\Clinic::pluck('name','id')->all();

        return view('app.appointment',['clinics'=>$clinics,'appointments'=>$appointments]);
    }

    public function ShowAppointment($id)
    {

        $appointment=\App\Appointment::findOrFail($id);
        $patient=\App\Patient::findOrFail($appointment['patient_id']);
        $clinics=\App\Clinic::pluck('name','id')->all();

        return view('app.showappointment',['clinics'=>$clinics,'appointment'=>$appointment,'patient'=>$patient]);


    }

    public function EditAppointment(Request $request,$id){

        $validator = Validator::make($request->all(), [
            
            'status' => "required|string",            
            'doctor_comment' => "",

        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $appointmet=  \App\Appointment::findOrFail($id);
        $appointmet->status=$request['status'];
        $appointmet->doctor_comment=$request['doctor_comment'];
        $appointmet->save();
            
        $message ='edit is done !';
        return back()->with(['message' => $message,'new'=>false]);
    }
    
    public function SearchAppointment(Request $request){

        $from = date($request['from']);
        $to = date($request['to']);
        $appointments=\App\Appointment::where('clinic_id',$request['clinic_id'])->whereBetween('date', [$from, $to])->get();
        $clinics=\App\Clinic::pluck('name','id')->all();

        return view('app.appointment',['clinics'=>$clinics,'appointments'=>$appointments]);
   
    }
    public function Search(Request $request)
    {

        $na_id=$request['na_id'];
        $patient=  \App\Patient::where('national_id',$na_id)->first();
        if($patient)
        {
        $clinics=\App\Clinic::pluck('name','id')->all();
        return view('app.patient',['clinics'=>$clinics,'new'=>true,'patient'=>$patient]);
        }
        else{
            abort(404);
        }
    } 


    public function AddPatient(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'national_id' => "required|string|unique:patients,national_id",
                'name' => "required|string",
                'phone' => "required|numeric",
                'gender' => "required|string",
                'clinic_id' => "required|string",
                'status' => "required|string",
                'date' => "required|string",
                'start' => "required|string",
                'end' => "required|string",
                'cost' => "required|numeric",
                'comment' => "required|string",
                'doctor_comment' => "",

            ]);
            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();
            }
                
        $patient= new \App\Patient();
        $patient->national_id=$request['national_id'];
        $patient->name=$request['name'];
        $patient->gender=$request['gender'];
        $patient->phone=$request['phone'];
        $patient->save();

        $appointmet= new \App\Appointment();
        
        $appointmet->patient_id=$patient['id'];
        $appointmet->clinic_id=$request['clinic_id'];
        $appointmet->status=$request['status'];
        $appointmet->date=$request['date'];
        $appointmet->start=$request['start'];
        $appointmet->end=$request['end'];
        $appointmet->cost=$request['cost'];
        $appointmet->clerk_comment=$request['comment'];
            $appointmet->save();
            $message ='add is done !';
            return back()->with(['message' => $message,'new'=>false]);
    } 
    public function AddToPatient(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'id' => "required|string",
            'clinic_id' => "required|string",
            'status' => "required|string",
            'date' => "required|string",
            'start' => "required|string",
            'end' => "required|string",
            'cost' => "required|numeric",
            'comment' => "required|string",
            'doctor_comment' => "",

        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }
        $appointmet= new \App\Appointment();
        
        $appointmet->patient_id=$request['id'];
        $appointmet->clinic_id=$request['clinic_id'];
        $appointmet->status=$request['status'];
        $appointmet->date=$request['date'];
        $appointmet->start=$request['start'];
        $appointmet->end=$request['end'];
        $appointmet->cost=$request['cost'];
        $appointmet->clerk_comment=$request['comment'];
            $appointmet->save();
            $message ='add is done !';
            return back()->with(['message' => $message,'new'=>false]);
    }



}
