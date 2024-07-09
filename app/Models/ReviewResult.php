<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewResult extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'review_results';
}
