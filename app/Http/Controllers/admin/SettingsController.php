<?php

namespace App\Http\Controllers\admin;

use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Settings::orderBy("id" , "DESC")->get();
        return view('admin/settings/index' , compact('all'));
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

        if(request('image') == ""){
            $name = "df_image.png";
        }else{
            $file = request('image');
            $name = time() . '.' .$file->getClientOriginalExtension();
            $path = public_path('admin/images/settings');
            $file->move($path , $name);
        }

        $data = [
          'name' => request('name'),
          'email' => request('email'),
          'mobile' => request('mobile'),
          'phone' => request('phone_num'),
          'address' => request('address'),
          'owner_name' => request('owner_name'),
          'theme' => request('theme') == "" ? "#00969d" : request('theme'),
          'slogen' => request('slogen'),
          'image' => $name,
        ];

        Settings::create($data);

        Session::put('success' , trans('app.Completed Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\'settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $data = Settings::where('id' , $id)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\'settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Settings::where('id' , $id)->get();

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\'settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {          
          $find = Settings::findOrFail($id);

          $this->validate($request , [
            'name' => 'required',
          ]);
  
          if(request('image') == ""){
              $name = request('df_image');
          }else{
              $file = request('image');
              $name = time() . '.' .$file->getClientOriginalExtension();
              $path = public_path('admin/images/settings');
              $file->move($path , $name);
          }
  
          $data = [
            'name' => request('name'),
            'email' => request('email'),
            'mobile' => request('mobile'),
            'phone' => request('phone_num'),
            'address' => request('address'),
            'owner_name' => request('owner_name'),
            'theme' => request('theme') == "" ? "#00969d" : request('theme'),
            'slogen' => request('slogen'),
            'image' => $name,
          ];
          
          $find->update($data);

        Session::put('success' , trans('app.Completed Update Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\'settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Settings::findOrFail($id)->delete();
        Session::flash('success' , trans('app.Completed Delete Successfully'));
    }
}
