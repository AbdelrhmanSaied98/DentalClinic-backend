<?php

namespace App\Http\Controllers;

use App\Models\Clinic_schedule;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ClinicScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schedule = Clinic_schedule::all();
        return $schedule;
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
    public function store(Request $request)
    {
        //
        try
        {
            
            $request->validate([
                'date' => 'required|date_format:Y-m-d',
                'time' => 'required',
            ]);
            $schedule = new Clinic_schedule;
            $schedule->date = $request->date;
            $schedule->time = $request->time;
            $schedule->save();
            return $schedule;
            
        }catch(ValidationException $ex)
        {
            //throw
            return $ex->errors();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinic_schedule  $clinic_schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic_schedule $clinic_schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinic_schedule  $clinic_schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic_schedule $clinic_schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clinic_schedule  $clinic_schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinic_schedule $clinic_schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinic_schedule  $clinic_schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic_schedule $clinic_schedule)
    {
        //
    }
}
