<?php

namespace App\Http\Controllers\admin;

use App\PatientDocuments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use DB;

class PatientDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = PatientDocuments::orderBy("created_at" , "DESC")->get();
        return view('admin/patient_documents/index' , compact('all'));
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
            'date' => 'required',
          ]);

        if(request('files') != ""){
            foreach(request('files') as $image){
                $name = $image->getClientOriginalName();
                $path = public_path('admin/images/patient_documents');
                $image->move($path , $name);

                $date[] = $name;
            }
        }
        else{
            $name = "df_image.png";
        }

        $data = [
            'patient' => request('patient'),
            'doctor' => request('doctor'),
            'date' => request('date'), 
            'document_title' => request('document_title'), 
            'files' => json_encode($date), 
        ];

        PatientDocuments::create($data);

        Session::put('success' , trans('app.Completed Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branche  $branche
     * @return \Illuminate\Http\Response
     */
    public function show($date,$patient,$doctor)
    {   
        $data = PatientDocuments::where('date' , $date)
                                ->Where('patient' , $patient)
                                ->Where('doctor' , $doctor)
                                ->first();
        
        $data_each = PatientDocuments::where('date' , $date)
                                ->Where('patient' , $patient)
                                ->Where('doctor' , $doctor)
                                ->get();

        return view('admin/patient_documents/patient_show' , compact('data' , 'data_each'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branche  $branche
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = PatientDocuments::where('id' , $id)->get();

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
        $find = PatientDocuments::findorFail($id);

        $this->validate($request , [
            'name' => 'required|min:5',
            'birth_date' => 'required',
            'blood_group' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'mobile' => 'required|max:11',
            'phone' => 'max:11',
            'status' => 'required',
          ]);
  
          if(request('image') == ""){
              $name = "df_image.png";
          }else{
              $file = request('image');
              $name = time() . '.' .$file->getClientOriginalExtension();
              $path = public_path('admin/images/patient_documents');
              $file->move($path , $name);
          }
  
  
          $data = [
              'name' => request('name'),
              'email' => request('email'),
              'phone' => request('phone'), 
              'mobile' => request('mobile'), 
              'blood_group' => request('blood_group'), 
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
        $find = PatientDocuments::findOrFail($id)->delete();
        Session::flash('success' , trans('app.Completed Delete Successfully'));
    }
}

