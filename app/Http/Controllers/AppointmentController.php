<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $patient = Patient::where('full_name',$name)->first();
        if(!$patient)
        {
            return response(['Message'=>'Not Registered'], 401);
        }
        $Appointments = collect($patient->appointments)->map(function($oneAppointment)
        {
            $isVisited = $oneAppointment->visit ? true : false;
            return
            [
                'id' => $oneAppointment->id,
                'date' => $oneAppointment->clinic_schedule->date,
                'time' => $oneAppointment->clinic_schedule->time,
                'isVisited' => $isVisited
            ];
        });
        return $Appointments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$name)
    {
        //
        try
        {
            $request->validate([
                'clinic_schedule_id' => 'required'
            ]);
            $patient = Patient::where('full_name',$name)->first();
            if(!$patient)
            {
                return response(['Message'=>'Not Registered'], 401);
            }
            $appointment = new Appointment;
            $appointment->clinic_schedule_id = $request->clinic_schedule_id;
            $appointment->patient_id = $patient->id;
            $appointment->save();
            return $appointment;
            
        }catch(ValidationException $ex)
        {
            //throw
            return $ex->errors();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
