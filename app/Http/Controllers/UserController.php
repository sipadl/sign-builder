<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataChanges;
use App\Models\MasterDataGroup;
use App\Models\ImpactAnalisis;
use App\Models\ReviewResult;
use App\Models\Signature;
use Auth;

class UserController extends Controller
{
   public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'List Impact Analysis';
        $data = ImpactAnalisis::orderBy('created_at', 'desc')->simplePaginate(20);
        return view('user.main', compact('data','title'));
    }

    public function waitingforsign()
    {
        $title = 'List Impact Analysis - Menunggu Sign';
        $data = ImpactAnalisis::orderBy('created_at', 'desc')->with('Signature')->paginate(20);
        return view('user.main', compact('data','title'));
    }

    public function alreadysign()
    {
        $title = 'List Impact Analysis - Sudah di Sign';
        $data = ImpactAnalisis::orderBy('created_at', 'desc')->with('Sign')->simplePaginate(20);
        return view('user.main', compact('data','title'));
    }

    public function complete() {
        $title = 'List Impact Analysis - Completed Sign';
        $data = ImpactAnalisis::orderBy('created_at', 'desc')->simplePaginate(20);
        return view('user.main', compact('data'));
    }

    public function add() {
        $master_data_changes = MasterDataChanges::where('status', 1)->get();
        $master_data_gh = MasterDataGroup::get();
        return view('user.add', compact('master_data_changes', 'master_data_gh'));
    }


    public function post(Request $request) {
        // dd($request->all());
        $data = $request->except('_token');
        $data['request_by'] = json_encode($request['request_by']);
        $data['changes_area'] = json_encode($request['changes_area']);
        ImpactAnalisis::create($data);
        return redirect()->route('main')->with(['msg' => 'Berhasil Menambahkan Migration Plan Baru']);
    }

    public function review($id)
    {

        $master_data_changes = MasterDataChanges::where('status', 1)->get();
        $master_data_gh = MasterDataGroup::get();
        $data = ImpactAnalisis::find($id);
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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
