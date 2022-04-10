<?php

namespace App\Http\Controllers;
use App\Models\CreateAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateAppointmentController extends Controller
{
    public function store(Request $request) //For creating appointment
    {

        $request->validate([
            'name'=>'required|max:191',
            'age'=>'required|max:100',
            'doctorName'=>'required|max:191',
            'hospitalName'=>'required|max:191',
        ]);

        $data = CreateAppointment::where([
            ['datetime', '=', $request->datetime],
            ['hospitalName', '=', $request->hospitalName]
        ])->get();

        $patientId = CreateAppointment::where([
            ['optional1', '=', $request->optional1],
            
        ])->get();
        if(count($patientId) > 0) {
            return response()->json(['message'=>'Already a doctor Id'],200);
        }

        

        if(count($data) > 0) {
            return response()->json(['message'=>'Appointment already exsit'],200);
        }

        $appointment = new CreateAppointment;
        $appointment->name = $request->name;
        $appointment->age = $request->age;
        $appointment->gender = $request->gender;
        $appointment->phone = $request->phone;
        $appointment->datetime = $request->datetime;
        $appointment->doctorName = $request->doctorName;
        $appointment->hospitalName = $request->hospitalName;
        $appointment->describeProblem = $request->describeProblem;
        $appointment->optional1 = $request->optional1;
        $appointment->optional2 = $request->optional2;
        $appointment->user_id = Auth::user()->id;

        $appointment->save();
        return response()->json(['message'=>'Appointment created Successfully'],200);



    }
    public function index() //Getting all the list of appointments made
    {

        $userId = Auth::user()->id;
        

        $appointment = CreateAppointment::whereUserId($userId)->get();
        return response()->json(['appointments'=>$appointment], 200);
    }

    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'name'=>'required|max:191',
        //     'age'=>'required|max:100',
        //     'doctorName'=>'required|max:191',
        //     'hospitalName'=>'required|max:191',
        // ]);


        $appointment = CreateAppointment::find($id);
        //if product is found
        if($appointment){
        $appointment->name = $request->name;
        $appointment->age = $request->age;
        $appointment->gender = $request->gender;
        $appointment->phone = $request->phone;
        $appointment->datetime = $request->datetime;
        $appointment->doctorName = $request->doctorName;
        $appointment->hospitalName = $request->hospitalName;
        $appointment->describeProblem = $request->describeProblem;
        $appointment->optional1 = $request->optional1;
        $appointment->optional2 = $request->optional2;
        $appointment->update();
        return response()->json(['message'=>'Appointment updated Successfully'],200);
        }
        else
        {
            return response()->json(['message'=>'No Product Found'],404);

        }

    }

    public function delete($id)
    {
        $appointment = CreateAppointment::find($id);
        if($appointment)
        {
            $appointment->delete();
            return response()->json(['message'=> 'Appointment Deleted Successfully'],200);

        }
        else
        {
            return response()->json(['message'=> 'No Such Appointments Found'], 404);
        }
    }
}
