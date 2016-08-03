<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
	protected $dates = ['dob'];

	protected $fillable = [
        'fullName', 'imageName', 'city', 'country', 'website', 'dob',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

}
