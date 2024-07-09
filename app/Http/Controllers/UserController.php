<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataChanges;
use App\Models\MasterDataGroup;
use App\Models\MigrationPlan;
use App\Models\ReviewResult;
use App\Models\Signature;

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
        $data = $request->except('_token');
        $data['changes_area'] = json_encode($request['changes_area']);
        // dd($request->all());
        $data['request_by'] = 'padel';
        $data['group_head'] = 'padel';
        MigrationPlan::create($data);
        return redirect()->route('main')->with(['msg' => 'Berhasil Menambahkan Migration Plan Baru']);
    }

    public function review($id)
    {

        $master_data_changes = MasterDataChanges::where('status', 1)->get();
        $master_data_gh = MasterDataGroup::get();
        $data = MigrationPlan::find($id);
        $signature = ReviewResult::where('redmine_no', $data->redmine_id)->first();
        return view('user.review', compact('data','master_data_changes', 'master_data_gh', 'signature'));
    }

    public function simpanSign(Request $request, $id)
    {
        // dd($request);
        $data = $request->except('_token');
        $data['redmine_no'] = $id;
        $submit = Signature::create($data);
    }
}
