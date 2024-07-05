<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataChanges;
use App\Models\MasterDataGroup;
use App\Models\MigrationPlan;

class UserController extends Controller
{

    public function index()
    {
        $data = MigrationPlan::get();
        return view('user.main', compact('data'));
    }

    public function add() {
        $master_data_changes = MasterDataChanges::where('status', 1)->get();
        $master_data_gh = MasterDataGroup::get();
        return view('user.add', compact('master_data_changes', 'master_data_gh'));
    }

    public function post(Request $request) {
        // dd($request->all());
        MigrationPlan::create($request->except('_token'));
        return redirect()->route('main')->with(['msg' => 'Berhasil Menambahkan Migration Plan Baru']);
    }

    public function review($id)
    {

        $master_data_changes = MasterDataChanges::where('status', 1)->get();
        $master_data_gh = MasterDataGroup::get();
        $data = MigrationPlan::find($id);
        return view('user.review', compact('data','master_data_changes', 'master_data_gh'));
    }
}
