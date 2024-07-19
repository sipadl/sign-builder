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
        $requestor = base64_decode($requestor);
        $requestor = Str::lower(str_replace(' ', '', $requestor));
        // $this->Logging(Auth::user(), 2, $id);
        return view('user.sign', compact('redmine', 'index','data', 'requestor'));
    }

    public function simpanSign(Request $request, $id)
    {
        // dd($request);

        $group_head = ImpactAnalisis::where('redmine_no', $id)->first();
        $data = $request->except('_token');
        $data['redmine_no'] = $id;
        $data['group_head'] = $group_head->group_head;
        $submit = Signature::create($data);
    }
}
