<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataChanges;

class UserController extends Controller
{

    public function index()
    {
        return view('user.main');
    }

    public function add() {
        $master_data_changes = MasterDataChanges::where('status', 1)->get();
        return view('user.add', compact('master_data_changes') );
    }
}
