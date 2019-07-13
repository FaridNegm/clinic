<?php

namespace App\Http\Controllers\admin;

use App\DoctorAppointments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use DB;

class DoctorAppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = DoctorAppointments::orderBy("id" , "DESC")->get();
        return view('admin/doctor_appointments/index' , compact('all'));
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
          'name' => 'required',
        ]);

        $data = [
            'name' => request('name'),
            'sat' => request('sat'),
            'sat_from' => request('sat_from') == null ? "---" : request('sat_from') ,
            'sat_to' => request('sat_to') == null ? "---" : request('sat_to') ,
            'sun' => request('sun'),
            'sun_from' => request('sun_from') == null ? "---" : request('sun_from') ,
            'sun_to' => request('sun_to') == null ? "---" : request('sun_to') ,
            'mon' => request('mon'),
            'mon_from' => request('mon_from') == null ? "---" : request('mon_from') ,
            'mon_to' => request('mon_to') == null ? "---" : request('mon_to') ,
            'tue' => request('tue'),
            'tue_from' => request('tue_from') == null ? "---" : request('tue_from') ,
            'tue_to' => request('tue_to') == null ? "---" : request('tue_to') ,
            'wen' => request('wen'),
            'wen_from' => request('wen_from') == null ? "---" : request('wen_from') ,
            'wen_to' => request('wen_to') == null ? "---" : request('wen_to') ,
            'thu' => request('thu'),
            'thu_from' => request('thu_from') == null ? "---" : request('thu_from') ,
            'thu_to' => request('thu_to') == null ? "---" : request('thu_to') ,
            'fri' => request('fri'),
            'fri_from' => request('fri_from') == null ? "---" : request('fri_from') ,
            'fri_to' => request('fri_to') == null ? "---" : request('fri_to') ,
            
        ];

        DoctorAppointments::create($data);

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
        $data = DoctorAppointments::where('id' , $id)->get();

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
        $data = DoctorAppointments::where('id' , $id)->get();

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
        $find = DoctorAppointments::findorFail($id);

        $this->validate($request , [
            'name' => 'required',
          ]);
  
          $data = [
              'name' => request('name'),
              'sat' => request('sat'),
              'sat_from' => request('sat_from'),
              'sat_to' => request('sat_to'),
              'sun' => request('sun'),
              'sun_from' => request('sun_from'),
              'sun_to' => request('sun_to'),
              'mon' => request('mon'),
              'mon_from' => request('mon_from'),
              'mon_to' => request('mon_to'),
              'tue' => request('tue'),
              'tue_from' => request('tue_from'),
              'tue_to' => request('tue_to'),
              'wen' => request('wen'),
              'wen_from' => request('wen_from'),
              'wen_to' => request('wen_to'),
              'thu' => request('thu'),
              'thu_from' => request('thu_from'),
              'thu_to' => request('thu_to'),
              'fri' => request('fri'),
              'fri_from' => request('fri_from'),
              'fri_to' => request('fri_to'),
              
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
        $find = DoctorAppointments::findOrFail($id)->delete();
        Session::flash('success' , trans('app.Completed Delete Successfully'));
    }
}