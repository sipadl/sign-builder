<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDataGroup extends Model
{
    use HasFactory;
    protected $fillable =  ['id'];
    protected $table = 'master_data_group_head';
}
