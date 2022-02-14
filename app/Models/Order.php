<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table="order";
    protected $guarded = [];

    public function ebook(){
        return $this->belongsTo(Ebook::class);
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }

}
