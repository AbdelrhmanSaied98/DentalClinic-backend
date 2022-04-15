<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($appointment_id)
    {
        //
        $appointment = Appointment::find($appointment_id);
        return $appointment->visit->serves;
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
        //
        try
        {
            $request->validate([
                'type' =>   'required|in:"Examination", "Consultation"'
            ]);
            $serves = array();
            if($request->type == 'Examination')
            {
                $serves['Examination'] = 200;
            }else
            {
                $serves['Consultation'] = 100;
            }
            $appointment = Appointment::find($appointment_id);
            if($appointment->visit)
            {
                return response(['Message'=>'already visited'], 401);
            }
            $patient = $appointment->patient;
            $newVisit = new Visit;
            $newVisit->appointment_id = $appointment_id;
            $newVisit->type = $request->type;
            $newVisit->serves = $serves;
            $newVisit->patient_id = $patient->id;
            $newVisit->save();
            return $newVisit;
            
        }catch(ValidationException $ex)
        {
            return $ex->errors();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Visit::destroy($id);
    }
}
