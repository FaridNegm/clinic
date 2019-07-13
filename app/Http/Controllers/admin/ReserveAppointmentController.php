<?php

namespace App\Http\Controllers\admin;

use App\ReserveAppointment;
use App\DoctorAppointments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class ReserveAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = ReserveAppointment::orderBy("id" , "DESC")->get();
        return view('admin/reserve_appointment/index' , compact('all'));
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
        $this->validate($request , [
          'patient' => 'required',
          'doctor' => 'required',
          'date' => 'required',
          'appointment_status' => 'required',
        ]);

        $data = [
            'patient' => request('patient'),
            'doctor' => request('doctor'),
            'date' => request('date'),
            'appointment_status' => request('appointment_status'),
            'notes' => request('notes')
        ];

        ReserveAppointment::create($data);

        Session::put('success' , trans('app.Completed Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branche  $branche
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $data = ReserveAppointment::where('id' , $id)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branche  $branche
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = ReserveAppointment::where('id' , $id)->get();

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branche  $branche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $find = ReserveAppointment::findorFail($id);

        $this->validate($request , [
            'patient' => 'required',
            'doctor' => 'required',
            'date' => 'required',
            'appointment_status' => 'required',
          ]);
  
          $data = [
              'patient' => request('patient'),
              'doctor' => request('doctor'),
              'date' => request('date'),
              'appointment_status' => request('appointment_status'),
              'notes' => request('notes')
          ];
          
          $find->update($data);

        Session::put('success' , trans('app.Completed Update Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branche  $branche
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = ReserveAppointment::findOrFail($id)->delete();
        Session::flash('success' , trans('app.Completed Delete Successfully'));
    }

    public function get_doctor_appointments($id)
    {   
        $data = DoctorAppointments::where('name' , $id)->get();

        return response()->json($data);
    }
}
