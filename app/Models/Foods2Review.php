<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods2Review extends Model
{
    use HasFactory;

    protected $table = 'foods2reviews'; // Specify the table name if it's not plural

    protected $fillable = ['review_id', 'food_id'];

    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
}
