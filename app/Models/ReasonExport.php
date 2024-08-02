<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonExport extends Model
{
    use HasFactory;
    protected $fillable = ['redmine_no', 'reason'];
}
