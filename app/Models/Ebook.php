<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    protected $table="ebook";
    protected $guarded = [];

    public function order(){
        return $this->hasMany(Order::class);
    }

}
