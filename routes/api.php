<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicScheduleController;
use App\Http\Controllers\DoctorAssessmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\ServeController;
use App\Http\Controllers\VisitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/clinicSchedule", [ClinicScheduleController::class, "index"]);
Route::post("/clinicSchedule", [ClinicScheduleController::class, "store"]);

Route::get("/appointment/{name}", [AppointmentController::class, "index"]);
Route::post("/appointment/{name}", [AppointmentController::class, "store"]);

Route::post("/patient", [PatientController::class, "store"]);


Route::post("/appointment/{appointment_id}/visit", [VisitController::class, "store"])->whereNumber('appointment_id');

Route::get("/appointment/{appointment_id}/visit/getReceipt", [VisitController::class, "index"])->whereNumber('appointment_id');;


Route::post("/procedure", [ProcedureController::class, "store"]);
Route::get("/procedure", [ProcedureController::class, "index"]);

Route::post("/appointment/{appointment_id}/visit/addProcedure", [ServeController::class, "store"])->whereNumber('appointment_id');;

Route::post("/appointment/{appointment_id}/visit/doctorAssessment", [DoctorAssessmentController::class, "store"])->whereNumber('appointment_id');;
Route::get("/appointment/{appointment_id}/visit/doctorAssessment", [DoctorAssessmentController::class, "index"])->whereNumber('appointment_id');;










