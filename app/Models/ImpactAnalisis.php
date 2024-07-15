<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class ImpactAnalisis extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'impact_analisis';

    public function Signature() {
        return $this->hasMany(Signature::class, 'redmine_no', 'redmine_no')
        ->where('group_head', '!=', Auth::user()->id);
    }

}
