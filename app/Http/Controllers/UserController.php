<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataChanges;
use App\Models\MasterDataGroup;
use App\Models\ImpactAnalisis;
use App\Models\ReviewResult;
use App\Models\Signature;
use App\Models\Logging;
use App\Models\MasterCategory;
use Barryvdh\DomPDF\Facade\Pdf; // Import the facade
use App\Models\ReasonExport;
use Auth;
use App\Models\User;
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
        $data = ImpactAnalisis::orderBy('created_at', 'desc')->paginate(10);
        $logging = Logging::where('id_user', Auth::user()->id)->orderBy('created_at','desc')->limit(10)->get();
        return view('user.main', compact('data','title','logging'));
    }

    public function waitingforsign()
    {
        $title = 'List Impact Analysis - Menunggu Sign';
        $user = Auth::user();
           $data = ImpactAnalisis::select('impact_analisis.*')
           ->selectSub(function ($query) use ($user) {
               $query->from('signature')
                     ->selectRaw('CASE WHEN COUNT(id) = 13 THEN "complete" ELSE "incomplete" END')
                     ->whereColumn('signature.redmine_no', 'impact_analisis.redmine_no')
                     ->where('signature.kode',  $user->id);
           }, 'status_signature')
           ->having('status_signature', '=', 'incomplete')
           ->paginate(20);

        // }

        $logging = Logging::where('id_user', Auth::user()->id)->orderBy('created_at','desc')->limit(10)->get();
        return view('user.main', compact('data','title','logging'));
    }

    public function alreadysign()
    {
        $user = Auth::user();
        $title = 'List Impact Analysis - Sudah di Sign';
        // $data = [];
        // if($user->kode == 'administrator') {
        //     $data = ImpactAnalisis::orderBy('created_at', 'desc')->paginate(20);
        // } else {
            $data = ImpactAnalisis::select('impact_analisis.*')
           ->selectSub(function ($query) use ($user) {
               $query->from('signature')
                     ->selectRaw('CASE WHEN COUNT(id) = 13 THEN "complete" ELSE "incomplete" END')
                     ->whereColumn('signature.redmine_no', 'impact_analisis.redmine_no')
                     ->where('signature.kode',  $user->id);
           }, 'status_signature')
           ->paginate(20);
        // }
        $logging = Logging::where('id_user', Auth::user()->id)->orderBy('created_at','desc')->limit(10)->get();
        return view('user.main', compact('data','title','logging'));
    }

    public function complete() {
        $user = Auth::user();

        $title = 'List Impact Analysis - Completed Sign';
        $data = ImpactAnalisis::select('impact_analisis.*')
        ->selectSub(function ($query) use ($user) {
            $query->from('signature')
                  ->selectRaw('CASE WHEN COUNT(id) = 13 THEN "complete" ELSE "incomplete" END')
                  ->whereColumn('signature.redmine_no', 'impact_analisis.redmine_no')
                  ->where('signature.kode',  $user->id);
        }, 'status_signature')
        ->having('status_signature', '=', 'complete')
        ->paginate(20);

        $logging = Logging::where('id_user', Auth::user()->id)->orderBy('created_at','desc')->limit(10)->get();

        return view('user.main', compact('data','title','logging'));
    }

    public function add() {
        $title = 'Tambah Impact Analysis';

        $master_data_changes = MasterDataChanges::where('status', 1)->get();
        $master_data_category = MasterCategory::where('status', 1)->get();
        $master_data_gh = MasterDataGroup::get();
        $user = User::get();
        return view('user.add', compact('master_data_changes', 'master_data_gh','title','user','master_data_category'));
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
        $title = 'Impact Analysis #'.$data->redmine_no;
        $signature = ReviewResult::where('redmine_no', $data->redmine_id)->first();
        return view('user.review', compact('data','master_data_changes', 'master_data_gh', 'signature','title'));
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

    public function changePassword(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('password.change')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Cek password lama
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->route('password.change')
                             ->withErrors(['current_password' => 'Password lama tidak sesuai'])
                             ->withInput();
        }

        // Update password baru
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('password.change')->with('status', 'Password berhasil diubah');
    }

    public function submitReason(Request $request, $id)
    {
        $data = ReasonExport::create([
            'redmine_no' => $id,
            'reason' => $request->reason
        ]);

        $data = ImpactAnalisis::where('redmine_no', $id)->first();
        $pdf = $this->exportPdf($data);
        return $pdf->download('p.pdf');

    }


    public function exportPdf($data)
    {
        // Data to be passed to the view
        dd($data);
        $data = [
            'title' => 'Redmine No. ***',
            'heading' => 'Hello, World!',
            'data' => $data
        ];

        // Load the view and pass the data
        $pdf = Pdf::loadView('export.pdf', $data);

        return $pdf;
    }

    public function showChangePasswordForm()
    {
        return view('user.setting.password');
    }

    public function createUser()
    {
        $group_head = User::whereIn('id_group', ['3', '2','1'])->get();
        return view('user.setting.create', compact('group_head'));
    }

    public function postCreateUser(Request $request)
    {
        // dd($request->all());
        User::create($request->except('_token'));
        return redirect()->route('manage.user')->with('msg', 'Pengguna berhasil ditambahkan');
    }

    public function managementUser()
    {
        $users = User::get();
        return view('user.setting.management', compact('users'));
    }

    public function updateUser($id)
    {
        $user = User::find($id);
        $group_head = User::whereIn('id_group', ['3', '2','1'])->get();
        return view('user.setting.update', compact('user','group_head'));
    }

    public function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('manage.user')->with('msg', 'Pengguna berhasil menghapus pengguna');

    }

    public function postUpdateUser($id, Request $request)
    {
        DB::table('users')->where('id', $id)->update($request->except('_token'));
        return redirect()->route('manage.user')->with('msg', 'Pengguna berhasil diubah');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('user.setting.profile', compact('user'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
