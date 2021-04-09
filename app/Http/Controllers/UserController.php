<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'users' => $this->User->allData(),
        ];
        
        return view('user', $data);
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
        $validation = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users|email',
            'phone_number' => 'required',
            'gender' => 'required|',
            'country_id' => 'required',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);
        
        if($validation->fails()){
            return response()->json($validation->errors(), 202);
        }

        $data=[
            'first_name' => Request()-> first_name,
            'last_name' => Request()-> last_name,
            'email' => Request()-> email,
            'phone_number' => Request()-> phone_number,
            'gender' => Request()-> gender,
            'country_id' => Request()-> country_id,
            'password' => Request()-> password,
            'created_at' => now(),
            'updated_at'=> now(),
        ];

        $data['password'] = bcrypt($data['password']);
        
        // return $data;

        $result = $this->User->addData($data);

        $resArr = [];
        $resArr['token']=$result->createToken('api-application')->accessToken;
        $resArr['email']=$result->email;

        return response()->json($resArr, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data =[
            'users' => $this->User->detailData($id),
        ];
        
        return view('useredit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->User->detailData($id);

        $data=[
            'first_name' => $request-> first_name,
            'last_name' => $request-> last_name,
            'email' => $request-> email,
            'phone_number' => $request-> phone_number,
            'gender' => $request-> gender,
            'country_id' => $request-> country_id,
            'password' => $request-> password,
            'updated_at'=> now(),

        ];
        $result = $this->User->editData($id, $data);

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->User->destroyData($id);
    }

    public function login(Request $request){
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            $user = Auth::User();
            $resArr=[];
            $resArr['token']=$user->createToken('api-application')->accessToken;
            $resArr['email']=$user->email;
            return response()->json($resArr, 200);
        }else{
            return response()->json(['error'=>'Unauthorized Access'], 203);
        }
    }
}
