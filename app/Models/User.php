<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Country;
use app\Http\Resources\CountryResource;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'gender',
        'country_id',
    ];

    public function allData(){
        return User::all();
    }

    public function addData($data){
        return User::create($data);
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

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
