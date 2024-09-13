<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImpactAnalisis;
use App\Models\Signature;
use Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function shared_sign ($redmine, $index, $requestor) {
        $data = ImpactAnalisis::where('redmine_no', $redmine)->first();
        return view('user.sign', compact('redmine', 'index','data', 'requestor'));
    }

    public function simpanSign(Request $request, $id)
    {   
        // dd($id);
        // dd($request->user);
        $group_head = ImpactAnalisis::where('redmine_no', $id)->first();
        $data = $request->except('_token');
        $data['kode'] = base64_decode($request->kode);
        $data['redmine_no'] = $id;
        $data['group_head'] = $group_head->group_head;
        // $this->Logging($request->user, 2, $id);
        $submit = Signature::create($data);
        // dd($submit);
    }
}
