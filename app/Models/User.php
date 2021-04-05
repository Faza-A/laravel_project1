<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function allData(){
        return User::get();
    }

    public function addData($data){
        User::insert($data);
    }

    public function detailData($id){
        return User::where('id', $id)->first();
    }

    public function editData($id, $data){
        User::where('id', $id)
            ->update($data);
    }
    
    public function destroyData($id){
        User::where('id', $id)
            ->delete();
    }
}
