<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataChanges;
use App\Models\MasterDataGroup;
use App\Models\ImpactAnalisis;
use App\Models\ReviewResult;
use App\Models\Signature;
use App\Models\Logging;
use Auth;
use DB;
use Str;

class UserController extends Controller
{
   public function __construct() {
        $this->middleware('auth');

    }

    public function index()
    {
        $title = 'List Impact Analysis';
        $data = ImpactAnalisis::orderBy('created_at', 'desc')->simplePaginate(20);
        $logging = Logging::where('id_user', Auth::user()->id)->orderBy('created_at','desc')->limit(10)->get();
        return view('user.main', compact('data','title','logging'));
    }

    public function waitingforsign()
    {
        $title = 'List Impact Analysis - Menunggu Sign';
        $user = Auth::user();

        $data = [];
        if($user->kode == 'administrator') {
            $data = ImpactAnalisis::orderBy('created_at', 'desc')->paginate(20);
        } else {
            $data = DB::table('impact_analisis as ia')
            ->leftJoin('signature as s', 'ia.redmine_no', '<>', 's.redmine_no')
            ->where('s.group_head', $user->id)
            ->orderBy('ia.created_at', 'desc')
            ->paginate(20);
        }

        $logging = Logging::where('id_user', Auth::user()->id)->orderBy('created_at','desc')->limit(10)->get();
        return view('user.main', compact('data','title','logging'));
    }

    public function alreadysign()
    {
        $user = Auth::user();
        $title = 'List Impact Analysis - Sudah di Sign';
        $data = [];
        if($user->kode == 'administrator') {
            $data = ImpactAnalisis::orderBy('created_at', 'desc')->paginate(20);
        } else {
            $data = DB::table('impact_analisis as ia')
            ->leftJoin('signature as s', 'ia.redmine_no', '=', 's.redmine_no')
            ->where('s.group_head', $user->id)
            ->orderBy('ia.created_at', 'desc')
            ->paginate(20);
        }
        $logging = Logging::where('id_user', Auth::user()->id)->orderBy('created_at','desc')->limit(10)->get();
        return view('user.main', compact('data','title','logging'));
    }

    public function complete() {
        $user = Auth::user();

        $title = 'List Impact Analysis - Completed Sign';
        $subQuery = DB::table('impact_analisis as ia')
            ->leftJoin('signature as s', 's.redmine_no', '=', 'ia.redmine_no')
            ->leftJoin('users as u', 'u.kode', '=', 's.kode')
            ->select('ia.redmine_no', DB::raw('count(u.name) as total_sign'))
            ->where('u.id_group', '!=', 99)
            ->groupBy('ia.redmine_no');

        $mainQuery = DB::table(DB::raw("({$subQuery->toSql()}) as a"))
            ->mergeBindings($subQuery)
            ->join('impact_analisis as ai', 'ai.redmine_no', '=', 'a.redmine_no')
            ->select('ai.*', 'a.total_sign')
            ->where('a.total_sign', 13)
            ->orderBy('ai.created_at', 'desc');

        // Pagination
        $data = $mainQuery->paginate(20);
        $logging = Logging::where('id_user', Auth::user()->id)->orderBy('created_at','desc')->limit(10)->get();

        return view('user.main', compact('data','title','logging'));
    }

    public function add() {
        $master_data_changes = MasterDataChanges::where('status', 1)->get();
        $master_data_gh = MasterDataGroup::get();
        return view('user.add', compact('master_data_changes', 'master_data_gh'));
    }

    public function post(Request $request) {
        // dd($request->all());

        $is_exists = ImpactAnalisis::where('redmine_no', $request->redmine_no)->first();
        if($is_exists){
            return redirect()->route('main')->with(['error' => 'No Redmine sudah digunakan']);
        };
        $data = $request->except('_token');
        $data['request_by'] = json_encode($request['request_by']);
        $data['changes_area'] = json_encode($request['changes_area']);
        $this->Logging(Auth::user(), 4, $data['redmine_no']);
        $id = ImpactAnalisis::create($data);

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
        if($data['impact'] == null || ''){
            $data['impact'] = 'No';
        }
        $data['redmine_no'] = $id;
        $this->Logging(Auth::user(), 2, $id);
        $submit = Signature::create($data);
    }

    public function cari(Request $request)
    {
        $title = 'Pencarian';
        $keyword = $request->keyword;
        $data = ImpactAnalisis::where('redmine_no', $request->keyword)->orWhere('title','like', '%' .Str::lower($request->keyword). '%')->paginate(10);
        return view('user.cari', compact('data','title','keyword'));
    }

    public function setting()
    {
        return view('user.setting');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
