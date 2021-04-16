<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Country extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable=[
        'name','alpha2_code', 'alpha3_code', 'calling_code', 'demonym','flag'
    ];

    public function allData(){
        return Country::get();

    }
    public function addData($data){
        Country::insert($data);
    }
    public function detailData($id){
        return Country::where('id', $id)->first();
    }
    public function editData($id, $data){
        Country::where('id', $id)
            ->update($data);
    }

    public function destroyData($id){
        Country::where('id', $id)
            ->delete();
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
