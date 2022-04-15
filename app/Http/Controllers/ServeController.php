<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Procedure;
use App\Models\Serve;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class ServeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'procedure_id' => 'required'
            ]);

            $appointment = Appointment::find($appointment_id);
            $visit = $appointment->visit;
            $data = array();
            foreach($request->procedure_id as $oneProcedure)
            {
                $newBill = $visit->serves;
                $procedure = Procedure::find($oneProcedure);
                $newBill[$procedure->name] = $procedure->price;
                $visit->serves = $newBill;
                $visit->save();
                $newServe = 
                [
                    'procedure_id' => $oneProcedure,
                    'visit_id' => $visit->id
                ];
                array_push($data,$newServe);
            }
            Serve::insert($data);

            return 
            [
                'respone' => 'done'
            ];
            
        }catch(ValidationException $ex)
        {
            return $ex->errors();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serve  $serve
     * @return \Illuminate\Http\Response
     */
    public function show(Serve $serve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serve  $serve
     * @return \Illuminate\Http\Response
     */
    public function edit(Serve $serve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serve  $serve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serve $serve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serve  $serve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serve $serve)
    {
        //
    }
}
