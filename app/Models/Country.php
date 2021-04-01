<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function allData(){
        return DB::table('countries')->get();

    }
    public function addData($data){
        DB::table('countries')->insert($data);
    }
    public function detailData($id){
        return DB::table('countries')->where('id', $id)->first();
    }
    public function editData($id, $data){
        DB::table('countries')
            ->where('id', $id)
            ->update($data);
    }

    public function destroyData($id){
        DB::table('countries')
            ->where('id', $id)
            ->delete();
    }
}
