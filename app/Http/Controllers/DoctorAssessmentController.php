<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor_assessment;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DoctorAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($appointment_id)
    {
        $appointment = Appointment::find($appointment_id);
        return $appointment->visit->doctor_assessments;
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
    public function store(Request $request,$appointment_id)
    {
        try
        {
            $request->validate([
                'diagnosis' => 'required',
                'prescription' => 'required',
                'lab' => 'required'
            ]);
            $appointment = Appointment::find($appointment_id);
            $doctor_assessment = new Doctor_assessment;
            $doctor_assessment->diagnosis = $request->diagnosis;
            $doctor_assessment->prescription = $request->prescription;
            $doctor_assessment->lab = $request->lab;
            $doctor_assessment->visit_id = $appointment->visit->id;
            $doctor_assessment->save();
            return $doctor_assessment;
            
        }catch(ValidationException $ex)
        {
            //throw
            return $ex->errors();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor_assessment  $doctor_assessment
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor_assessment $doctor_assessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor_assessment  $doctor_assessment
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor_assessment $doctor_assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor_assessment  $doctor_assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor_assessment $doctor_assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor_assessment  $doctor_assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor_assessment $doctor_assessment)
    {
        //
    }
}
