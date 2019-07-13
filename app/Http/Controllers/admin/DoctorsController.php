<?php

namespace App\Http\Controllers\admin;

use App\Doctors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use DB;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Doctors::orderBy("id" , "DESC")->get();
        return view('admin/doctors/index' , compact('all'));
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
          'name' => 'required|min:5',
          'email' => 'required|unique:doctors',
          'password' => 'required|min:5',
          'department' => 'required',
          'address' => 'required',
          'gender' => 'required',
          'mobile' => 'required|max:11',
          'status' => 'required',
          'phone' => 'max:11',
        ]);

        if(request('image') == ""){
            $name = "df_image.png";
        }else{
            $file = request('image');
            $name = time() . '.' .$file->getClientOriginalExtension();
            $path = public_path('admin/images/doctors');
            $file->move($path , $name);
        }


        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')), 
            'phone' => request('phone'), 
            'mobile' => request('mobile'), 
            'department' => request('department'), 
            'gender' => request('gender'), 
            'image' => $name, 
            'address' => request('address'), 
            'status' => request('status')
        ];

        Doctors::create($data);

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
        $data = Doctors::where('id' , $id)->get();

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
        $data = Doctors::where('id' , $id)->get();

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
        $find = Doctors::findorFail($id);

        $this->validate($request , [
            'name' => 'required|min:5',
            'email' => 'required',
            'department' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'mobile' => 'required|max:11',
            'status' => 'required',
            'phone' => 'max:11',
          ]);
  
          if(request('image') == ""){
              $name = "df_image.png";
          }else{
              $file = request('image');
              $name = time() . '.' .$file->getClientOriginalExtension();
              $path = public_path('admin/images/doctors');
              $file->move($path , $name);
          }
  
  
          $data = [
              'name' => request('name'),
              'email' => request('email'),
              'phone' => request('phone'), 
              'mobile' => request('mobile'), 
              'department' => request('department'), 
              'gender' => request('gender'), 
              'image' => $name, 
              'address' => request('address'), 
              'status' => request('status')
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
        $find = Doctors::findOrFail($id)->delete();
        Session::flash('success' , trans('app.Completed Delete Successfully'));
    }
}

