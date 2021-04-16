<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Yajra\DataTables\DataTables;
use App\Http\Resources\CountryResource;
use App\Http\Requests\CountryRequest;

class CountryAPIController extends Controller
{
    public function __construct(){
        $this->Country = new Country();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = [
        //     'countries' => $this->Country->allData(),
        // ];

        // return $data;
        $data = $this->Country->allData();
        return CountryResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $validated = $request->validated();

        $data=[
            'name' => Request()->name,
            'alpha2_code' => Request()-> alpha2_code,
            'alpha3_code' => Request()-> alpha3_code,
            'calling_code' => Request()-> calling_code,
            'demonym' => Request()-> demonym,
            'flag' => Request()-> flag,
        ];

        $result = $this->Country->addData($data);

        return response()->json($result, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->Country->detailData($id);
        return new CountryResource($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        $data = $this->Country->detailData($id);
        $data=[
            'name' => Request()->name,
            'alpha2_code' => Request()-> alpha2_code,
            'alpha3_code' => Request()-> alpha3_code,
            'calling_code' => Request()-> calling_code,
            'demonym' => Request()-> demonym,
            'flag' => Request()-> flag,
        ];
        $validated = $request->validated();

        $result = $this->Country->editData($id, $data);
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
        //
    }
}
