<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Session;

class CrudController extends Controller
{
    public function showdata(){
        $showData = Crud::simplePaginate(5);
        return view('show_data', compact('showData'));
    }

    public function adddata(){
        return view('add_data');
    }

    public function storedata(Request $request){
        $rules=[
            'name'=> 'required|max:10',
            'email'=> 'required|email',
        ];

        $cm = [
            'name.required'=>'Enter your name',
            'name.max'=>'Your name must not contain more than 10 characters',
            'email.required'=>'Enter Your email',
            'email.email'=>'Email must be a valid Email',
        ];
        $this->validate($request,$rules,$cm);

        $crud = new Crud();
        $crud->name = $request->name;          //first name is database field name 2nd is form input name
        $crud->email = $request->email;
        $crud->save();
        Session::flash('msg','Data sucessfully added');

        return redirect()->back();
    }
    
    public function editData($id=null){
        $editData = Crud::find($id);
         return view('edit_data',compact('editData'));
    }

    public function updatedata(Request $request,$id){
        $rules=[
            'name'=> 'required|max:10',
            'email'=> 'required|email',
        ];

        $cm = [
            'name.required'=>'Enter your name',
            'name.max'=>'Your name must not contain more than 10 characters',
            'email.required'=>'Enter Your email',
            'email.email'=>'Email must be a valid Email',
        ];
        $this->validate($request,$rules,$cm);

        $crud =  Crud::find($id);
        $crud->name = $request->name;          //first name is database field name 2nd is form input name
        $crud->email = $request->email;
        $crud->save();
        Session::flash('msg','Data sucessfully updated');

        return redirect('/');
    }


    public function deleteData($id=null){
          $deleteData=Crud::find($id);
          $deleteData-> delete();
          Session::flash('msg','Deleted sucessfully');

          return redirect('/');
    }

}
