<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'star', 'user_id'];

    public function user()
{
    return $this->belongsTo(User::class);
}

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'foods2reviews');
    }
    
}
