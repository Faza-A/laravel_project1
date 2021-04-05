<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct(){
        $this->User = new User;
    }

    public function json(){
        return DataTables::of(User::all())
        ->addColumn('action', function($data){
            $edit = '<a href="/users/edit/'.$data->id.'" class="btn btn-sm btn-warning">Edit</a>';
            $edit .='&nbsp;&nbsp; <a onClick="return confirm("Are you sure?")" href="/users/delete/'.$data->id.'" class="btn btn-sm btn-danger">Delete</a>';
            return $edit;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    
    public function index(){
        $data = [
            'users' => $this->User->allData(),
        ];

        return view('user', $data);
    }
    
    public function add(){
        return view('useradd');
    }
    public function insert(){
        Request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'country_id' => 'required',
            'password'=>'required',
        ]);

        $data=[
            'first_name' => Request()-> first_name,
            'last_name' => Request()-> last_name,
            'email' => Request()-> email,
            'phone_number' => Request()-> phone_number,
            'gender' => Request()-> gender,
            'country_id' => Request()-> country_id,
            'password' => Request()-> password,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $this->User->addData($data);
        return redirect()->route('users')->with('pesan','Success');
    }

    public function edit($id){

        if(!$this->User->detailData($id)){
            abort(404);
        }

        $data = [
            'users' => $this->User->detailData($id),
        ];
        return view('useredit', $data);
    }

    public function update($id){
        Request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'country_id' => 'required',
            'password'=>'required',
            'created_at'=>'required',
        ]);

        $data=[
            'first_name' => Request()-> first_name,
            'last_name' => Request()-> last_name,
            'email' => Request()-> email,
            'phone_number' => Request()-> phone_number,
            'gender' => Request()-> gender,
            'country_id' => Request()-> country_id,
            'password' => Request()-> password,
            'created_at' => Request()->created_at,
            'updated_at' => now(),
        ];
        $this->User->editData($id, $data);
        return redirect()->route('users')->with('pesan','Update Success');
    
    }

    public function destroy($id){
        
        $this->User->destroyData($id);
        return redirect()->route('users')->with('pesan','Delete data Success');
    }

}
