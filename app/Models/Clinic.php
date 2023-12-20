<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}
public function rooms()
{
    return $this->hasMany(Room::class);
}
public function beds()
{
    return $this->hasMany(Bed::class);
}
    

}

