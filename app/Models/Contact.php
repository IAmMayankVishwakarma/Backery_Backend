<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $id = 'id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'message' => 'string',
    ];

    public function Contacts(){
    return $this->hasMany(Reservation::class);
     }
     


}
