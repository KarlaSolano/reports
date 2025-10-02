<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function expenses() {
        return $this->hasMany(Expense::class);
    }
    
    public function users() {
        return $this->hasMany(User::class);
    }
}
