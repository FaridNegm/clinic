<?php

namespace App\Http\Controllers\admin;

use App\Times;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class TimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Times::orderBy("id" , "DESC")->get();
        return view('admin/times/index' , compact('all'));
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
          'from' => 'required',
          'to' => 'required',
          'day' => 'required',
          'matter' => 'required',
          'gender' => 'required',
        ]);

        $data = [
          'from' => request('from'),
          'to' => request('to'),
          'day' => request('day'),
          'matter' => request('matter'),
          'gender' => request('gender'),
        ];

        Times::create($data);

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
        $data = Times::where('id' , $id)->get();

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
        $data = Times::where('id' , $id)->get();

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
        $find = Times::findorFail($id);

        $this->validate($request , [
            'from' => 'required',
            'to' => 'required',
            'day' => 'required',
            'matter' => 'required',
            'gender' => 'required',
            'education_year' => 'required',
          ]);
  
          $data = [
            'from' => request('from'),
            'to' => request('to'),
            'day' => request('day'),
            'education_year' => request('education_year'),
            'matter' => request('matter'),
            'gender' => request('gender'),
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
        $find = Times::findOrFail($id)->delete();
        Session::flash('success' , trans('app.Completed Delete Successfully'));
    }
}
