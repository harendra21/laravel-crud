<?php

namespace App\Http\Controllers;

use App\crud;
use Illuminate\Http\Request;

class CrudController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $rules = [
            'fName' => 'required|min:2|max:255',
            'lName' => 'required|min:2|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|min:10',
        ];

        $customMessages = [
            'fName.required' => 'First Name is empty',
            'fName.min' => 'First Name is too short',
            'fName.max' => 'First Name is too long',
            'lName.required' => 'Last Name is empty',
            'lName.min' => 'Last Name is too short',
            'lName.max' => 'Last Name is too long',
            'email.required' => 'Email is empty',
            'email.email' => 'Email is not valid',
            'phone.required' => 'Phone is empty',
            'address.required' => 'Address is empty',
            'address.min' => 'Address is not valid'

        ];

        $validator = $this->validate($request, $rules, $customMessages);

        if (!is_array($validator) && $validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else{
            $crud = new crud();
            $resp = $crud->add($_POST);
            if ($resp) {
                \Session::flash('form_error', array('success','Action Success'));
                return redirect()->back();
            }else{
                \Session::flash('form_error', array('error','Something went wrong. Please try again'));
                return redirect()->back()->withInput();
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(crud $crud){
        $crud = new crud();
        $users = $crud->getAll();
        
        return view('show',['users'=>$users])->with('no', 1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit($userId)
    {
        $crud = new crud();
        $user = $crud->getUser($userId);
        return view('add',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crud $crud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud = new crud();
        $resp = $crud->deleteUser($id);

        if ($resp) {
            \Session::flash('form_error', array('success','Action Success'));
            return redirect()->back();
        }else{
            \Session::flash('form_error', array('error','Something went wrong. Please try again'));
            return redirect()->back()->withInput();
        }
    }
}
