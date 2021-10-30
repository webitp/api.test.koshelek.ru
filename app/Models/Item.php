<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'target_id'];

    protected $hidden = ['target_id'];

    public function items()
    {
        return $this->hasMany(Item::class, 'id', 'target_id');
    }
}
