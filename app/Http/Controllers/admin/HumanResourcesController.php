<?php

namespace App\Http\Controllers\admin;

use App\HumanResources;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use DB;

class HumanResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = HumanResources::orderBy("id" , "DESC")->get();
        return view('admin/human_resources/index' , compact('all'));
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
          'job' => 'required',
          'birth_date' => 'required',
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
            $path = public_path('admin/images/human_resources');
            $file->move($path , $name);
        }


        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')), 
            'phone' => request('phone'), 
            'mobile' => request('mobile'), 
            'job' => request('job'), 
            'birth_date' => request('birth_date'), 
            'gender' => request('gender'), 
            'image' => $name, 
            'address' => request('address'), 
            'status' => request('status')
        ];

        HumanResources::create($data);

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
        $data = HumanResources::where('id' , $id)->get();

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
        $data = HumanResources::where('id' , $id)->get();

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
        $find = HumanResources::findorFail($id);

        $this->validate($request , [
            'name' => 'required|min:5',
            'job' => 'required',
            'birth_date' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'mobile' => 'required|max:11',
            'status' => 'required',
            'phone' => 'max:11',
          ]);
  
          if(request('image') == ""){
              $name = request("df_image");
          }else{
              $file = request('image');
              $name = time() . '.' .$file->getClientOriginalExtension();
              $path = public_path('admin/images/human_resources');
              $file->move($path , $name);
          }
  
  
          $data = [
              'name' => request('name'),
              'email' => request('email'),
              'password' => Hash::make(request('password')), 
              'phone' => request('phone'), 
              'mobile' => request('mobile'), 
              'job' => request('job'), 
              'birth_date' => request('birth_date'), 
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
        $find = HumanResources::findOrFail($id)->delete();
        Session::flash('success' , trans('app.Completed Delete Successfully'));
    }
}
