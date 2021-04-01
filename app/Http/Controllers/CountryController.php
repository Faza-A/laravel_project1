<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller
{
    public function __construct(){
        $this->Country = new Country();

    }
    public function index()
    {
        $data = [
            'countries' => $this->Country->allData(),
        ];

        return view('country', $data);
    }

    public function add(){
        return view('countryadd');
    }
    public function insert(){
        Request()->validate([
            'name' => 'required',
            'alpha2_code' => 'required',
            'alpha3_code' => 'required',
            'calling_code' => 'required',
            'demonym' => 'required',
            'flag' => 'required',
        ]);
        $data=[
            'name' => Request()->name,
            'alpha2_code' => Request()-> alpha2_code,
            'alpha3_code' => Request()-> alpha3_code,
            'calling_code' => Request()-> calling_code,
            'demonym' => Request()-> demonym,
            'flag' => Request()-> flag,
        ];
        $this->Country->addData($id, $data);
        return redirect()->route('country')->with('pesan','Success');
    }

    public function edit($id){

        if(!$this->Country->detailData($id)){
            abort(404);
        }

        $data = [
            'countries' => $this->Country->detailData($id),
        ];
        return view('countryedit', $data);
    }

    public function update($id){
        Request()->validate([
            'name' => 'required',
            'alpha2_code' => 'required',
            'alpha3_code' => 'required',
            'calling_code' => 'required',
            'demonym' => 'required',
            'flag' => 'required',
        ]);
        $data=[
            'name' => Request()->name,
            'alpha2_code' => Request()-> alpha2_code,
            'alpha3_code' => Request()-> alpha3_code,
            'calling_code' => Request()-> calling_code,
            'demonym' => Request()-> demonym,
            'flag' => Request()-> flag,
        ];
        $this->Country->editData($id, $data);
        return redirect()->route('country')->with('pesan','Update Success');
    }
    public function destroy($id){
        
        $this->Country->destroyData($id);
        return redirect()->route('country')->with('pesan','Delete data Success');
    }
}
