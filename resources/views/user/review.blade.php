
@extends('./layouts/base')
@section('title', $title ?? 'Formia' )
@section('main')
<div class="">
    <div class="justify-content-between card mt-2">
        <div class="h2 mb-1 card-header">Form Impact Analysis</div>
        @php
        $count_gh = DB::table('master_data_group_head')->count();
        // dd($count_gh + $count_req);
        $hasil = ($count_gh + 3);
        $exists_sign = DB::table('signature')->where('redmine_no', $data->redmine_no)->count();

        $is_warning = DB::table('reason_exports')->where('redmine_no', $data->redmine_no)->get();
        @endphp

    </div>
    <div class="card" id="pdf">
            <div class="row mt-4 m-1 p-0">
                <div class="col-sm-6">
                    <div class="h2">CHANGE IMPACT ANALYSIS</div>
                </div>
                {{-- @if($hasil == $exists_sign) --}}
                <div class="col-sm-6 d-flex align-self-end align-content-end justify-content-end">
                    <button class="btn btn-sm btn-warning p-2" onclick="saveToPDF('{{ $data->redmine_no }}')">Export to PDF</button>
                    {{-- <a href="{{route('exportPdf', [$data->id])}}" class="btn btn-sm btn-dark" >Print</a> --}}

                </div>
                {{-- @else --}}
                {{-- @if($is_warning) --}}
                {{-- <div class="col-sm-6 d-flex align-self-end align-content-end justify-content-end">
                    <a href="{{route('exportPdf', [$data->id])}}" class="btn btn-sm btn-dark" >Print</a>
                    <button class="btn btn-sm btn-warning p-2" onclick="saveToPDF('{{ $data->redmine_no }}')">Export to PDF</button>
                </div> --}}
                {{-- @endif --}}
                {{-- @endif --}}
            </div>
            <hr class="mx-2">
            <div class="row p-2">
                <div class="col-md-4">
                    <div class="form-group row text-right">
                        <label for="" class="col-form-label col-md-6 col-xs-12">
                            Redmine No.
                        </label>
                        <div class="col-md-6 col-xs-12">
                            <input
                                type="text"
                                name="redmine_no"
                                id="redmine"
                                value="{{$data->redmine_no}}"
                                disabled
                                class="form-control"
                                placeholder="#1234"
                                required="required">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group row text-right">
                        <label for="" class="col-form-label col-md-2 col-xs-12">
                            Title
                        </label>
                        <div class="col-md-10 col-xs-12">
                            <input
                                type="text"
                                name="title"
                                id=""
                                value="{{$data->title}}"
                                disabled
                                class="form-control"
                                placeholder="For Testing Only"
                                required="required">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Changes Area</label>
                        <div class="col-md-10 col-xs-12">
                            <ul>
                                @php
                                    $changes = DB::table('master_data_changes')->whereIn('id', json_decode($data->changes_area))->get();
                                @endphp
                                @foreach ($changes as $item)
                                <li>{{$item->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Define Scope</label>
                        <div class="col-md-10">
                            <div class="card mt-1 mb-1">
                                <label for="message" class="mx-2">Existing Flow :</label>
                                <textarea
                                    name="scope_existing"
                                    value=""
                                    disabled
                                    class="form-control border-0"
                                    id="message"
                                    rows="5">{{$data->scope_existing}}</textarea>
                            </div>
                            <div class="card mt-1 mb-1">
                                <label for="message" class="mx-2">Existing Flow :</label>
                                <textarea
                                    name="scope_changes"
                                    value=""
                                    disabled
                                    class="form-control border-0"
                                    id="message"
                                    rows="5">{{$data->scope_changes}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Testing Requirement</label>
                        <div class="col-md-10">
                            <div class="card mt-1 mb-1">
                                <label for="message" class="mx-2">Please Note :</label>
                                <textarea
                                    name="testing_requirement"
                                    disabled
                                    class="form-control border-0"
                                    id="message"
                                    rows="5">{{$data->testing_requirement}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">UAT ENV. Data Needs</label>
                        <div class="col-md-10">
                            <div class="card mt-1 mb-1">
                                <label for="message" class="mx-2">Please Note :</label>
                                <textarea
                                    name="uat_env_data"
                                    class="form-control border-0"
                                    id="message"
                                    disabled
                                    rows="5">{{$data->uat_env_data}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Data Testing</label>
                        <div class="col-md-10">
                            <div class="card mt-1 mb-1">
                                <label for="message" class="mx-2">Please Note :</label>
                                <textarea
                                    name="data_testing"
                                    class="form-control border-0"
                                    id="message"
                                    disabled
                                    rows="5">{{$data->data_testing}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Setup Parameter</label>
                        <div class="col-md-10">
                            <div class="card mt-1 mb-1">
                                <label for="message" class="mx-2">Please Note :</label>
                                <textarea
                                    name="setup_parameter"
                                    class="form-control border-0"
                                    id="message"
                                    disabled
                                    rows="5">{{$data->setup_parameter}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Changes Of Existing Structure File</label>
                        <div class="col-md-10">
                            <div class="card mt-1 mb-1">
                                <label for="message" class="mx-2">Please Note :</label>
                                <textarea
                                    name="changes_of_exsiting_structure_file"
                                    disabled
                                    class="form-control border-0"
                                    id="message"
                                    rows="5">{{$data->changes_of_exsiting_structure_file}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Changes Of Database</label>
                        <div class="col-md-10">
                            <div class="card mt-1 mb-1">
                                <label for="message" class="mx-2">Please Note :</label>
                                <textarea
                                    name="changes_of_database"
                                    class="form-control border-0"
                                    id="message"
                                    disabled
                                    rows="5">{{$data->changes_of_database}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Recomended Action and Testing</label>
                        <div class="col-md-10">
                            <div class="card mt-1 mb-1">
                                <label for="message" class="mx-2">Please Note :</label>
                                <textarea
                                    name="recomended_action"
                                    class="form-control border-0"
                                    id="message"
                                    disabled
                                    rows="5">{{$data->recomended_action}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Downtime Required</label>
                        <div class="col-md-10">
                            <input type="radio" id="yes" name="down_time" disabled value="Yes" disabled {{ $data->down_time == 'Yes' ? 'checked' : '' }}>
                            <label for="yes" class="col-form-label">Yes</label>
                            <input type="radio" name="down_time" id="no" value="No" disabled disabled {{ $data->down_time == 'No' ? 'checked' : '' }}>
                            <label for="no" class="col-form-label">No</label>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Table Signature --}}
            {{-- @auth --}}

            <div class="p-2">
                {{-- <form id="form-sign" method="POST" enctype="multipart/form-data"> --}}
                    <div class="row p-2">
                        <div class="col-md-4 col-xs-12 text-center border">
                            <h5 class="py-2">Group / Departement</h5>
                        </div>
                        <div class="col-md-4 col-xs-12 text-center border">
                            <h5 class="py-2">Reviewer Notes</h5>
                        </div>
                        <div class="col-md-4 col-xs-12 text-center border">
                            <h5 class="py-2">Signature</h5>
                        </div>
                        @foreach($master_data_gh as $gh )
                        @php
                            $data_map = str_replace('&', ' ', $gh->divisi);
                            $data_map = explode(" ", $gh->divisi);
                            $data_map = strtolower($data_map[count($data_map) - 2 ].'_'.$data_map[count($data_map) - 1 ]);

                            $sign = DB::table('signature')->where('redmine_no', $data->redmine_no)->where('group_head', $gh->id)->first();
                        @endphp
                        @if($gh->tipe == 1)
                        <div class="col-md-4 col-xs-12 text-left border">
                            {{$gh->divisi}}
                        </div>
                        <div class="col-md-4 col-xs-12 text-center border">
                            <div class="form-group row">
                                @if(isset($sign))
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <input type="radio" id="yes" name="impacted-{{$gh->id}}" disabled value="Yes" readonly {{ $sign->impact == 'Yes' ? 'checked' : '' }}>
                                        <label for="impacted" class="col-form-label">Yes</label>
                                        <input type="radio" id="no" name="impacted-{{$gh->id}}" disabled value="Yes" readonly {{ $sign->impact == 'No' ? 'checked' : '' }}>
                                        <label for="impacted" class="col-form-label">No</label>
                                    </div>
                                    <div class="card text-start my-2">
                                        <label for="message" class="mx-2">Please Note :</label>
                                        <textarea name="notes" id="notes" rows="5" class="form-control border-0" disabled >{{$sign->notes ?? ''}}</textarea>
                                    </div>
                                </div>
                                @elseif(Auth::user()->id == $gh->id || Auth::user()->id_group == 99)

                                <div class="col-md-12">
                                    <div class="text-center">
                                        <input type="radio" id="impacted-{{$gh->id}}-yes" name="impacted-{{$gh->id}}" value="Yes">
                                        <label for="impacted-{{$gh->id}}-yes" class="col-form-label">Yes</label>
                                        <input type="radio" id="impacted-{{$gh->id}}-no" name="impacted-{{$gh->id}}" value="No">
                                        <label for="impacted-{{$gh->id}}-no" class="col-form-label">No</label>
                                    </div>
                                    <div class="card text-start my-2">
                                        <label for="message" class="mx-2">Please Note :</label>
                                        <textarea name="notes" id="notes-{{$gh->id}}" rows="5" class="form-control border-0"></textarea>
                                    </div>
                                </div>
                                @else

                                <div class="col-md-12">
                                    <div class="text-center">
                                        <input type="radio" id="impacted-{{$gh->id}}-yes" name="impacted-{{$gh->id}}" value="Yes" disabled >
                                        <label for="impacted-{{$gh->id}}-yes" class="col-form-label">Yes</label>
                                        <input type="radio" id="impacted-{{$gh->id}}-no" name="impacted-{{$gh->id}}" value="No" disabled >
                                        <label for="impacted-{{$gh->id}}-no" class="col-form-label">No</label>
                                    </div>
                                    <div class="card text-start my-2">
                                        <label for="message" class="mx-2">Please Note :</label>
                                        <textarea name="notes" id="notes-{{$gh->id}}" rows="5" class="form-control border-0" disabled ></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 text-center border align-content-end">
                            <div class="">
                                @if(isset($sign))
                                <!-- Button trigger modal -->
                                <div class="text-center">
                                    <input type="hidden" name="kode" id="kode-{{$gh->id}}" value="{{$gh->id}}">
                                    <input type="hidden" name="sign" id="sign-{{$gh->id}}">
                                    <img src="{{$sign->signature}}" width="120" height="120" alt="">
                                    {{-- <div class="signature-user-{{$gh->id}}"></div> --}}
                                    <!-- Button trigger modal -->
                                    {{-- <div class="btn-sign-{{$gh->id}}">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="setValue({{$gh->id}})" data-toggle="modal" data-target="#signatureModal">
                                            Sign
                                        </button>
                                    </div> --}}
                                <div class="text-center">
                                    {{$gh->name}}
                                </div>
                                <div class="text-start">
                                    <hr class="m-0 p-0">
                                    <span>Date : {{$sign->created_at}}</span>
                                </div>
                            </div>
                            @else
                            @php
                                $auth = Auth::user();
                            @endphp
                             <!-- Button trigger modal -->
                             <div class="text-center">
                                <input type="hidden" name="kode" id="kode-{{$gh->id}}" value="{{$gh->id}}">
                                <input type="hidden" name="sign" id="sign-{{$gh->id}}">
                                <div class="signature-user-{{$gh->id}}"></div>
                                <!-- Button trigger modal -->
                                @if($auth->id == $gh->id || in_array($auth->id_group, [99, 98]))
                                <div class="btn-sign-{{$gh->id}}">
                                    <button type="button" class="btn btn-primary btn-sm w-100" onclick="setValue({{$gh->id}})" data-toggle="modal" data-target="#signatureModal">
                                        Sign
                                    </button>
                                </div>
                                @endif
                            </button>
                            <div class="text-center">
                                {{$gh->name}}
                            </div>
                            <div class="text-start">
                                <hr class="m-0 p-0">
                                <span>Date :</span>
                            </div>
                        </div>
                            @endif
                        </div>
                        </div>
                        @elseif($gh->tipe == 2 )
                        <div class="col-md-4 col-xs-12 text-left border">
                            {{$gh->divisi}}
                        </div>
                        <div class="col-md-4 col-xs-12 text-center border">
                            <div class="form-group row">
                                @if(isset($sign) && Auth::user()->id == $gh->id )
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <input type="radio" id="impacted-{{$gh->id}}-yes" name="impacted-{{$gh->id}}" value="Yes">
                                        <label for="impacted-{{$gh->id}}-yes" class="col-form-label">Yes</label>
                                        <input type="radio" id="impacted-{{$gh->id}}-no" name="impacted-{{$gh->id}}" value="No">
                                        <label for="impacted-{{$gh->id}}-no" class="col-form-label">No</label>
                                    </div>
                                    <div class="card text-start my-2">
                                        <label for="message" class="mx-2">Please Note :</label>
                                        <textarea name="notes" id="notes" rows="5" class="form-control border-0" readonly>{{$sign->notes ?? ''}}</textarea>
                                    </div>
                                </div>
                                @elseif(Auth::user()->id == $gh->id || Auth::user()->group_id == 99)
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <input type="radio" id="impacted-{{$gh->id}}-yes" name="impacted-{{$gh->id}}" value="Yes">
                                        <label for="impacted-{{$gh->id}}-yes" class="col-form-label">Yes</label>
                                        <input type="radio" id="impacted-{{$gh->id}}-no" name="impacted-{{$gh->id}}" value="No">
                                        <label for="impacted-{{$gh->id}}-no" class="col-form-label">No</label>
                                    </div>
                                    <div class="card text-start my-2">
                                        <label for="message" class="mx-2">Please Note :</label>
                                        <textarea name="notes" id="notes-{{$gh->id}}" rows="5" class="form-control border-0"></textarea>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <input disabled type="radio" id="impacted-{{$gh->id}}-yes" name="impacted-{{$gh->id}}" value="Yes">
                                        <label for="impacted-{{$gh->id}}-yes" class="col-form-label">Yes</label>
                                        <input disabled type="radio" id="impacted-{{$gh->id}}-no" name="impacted-{{$gh->id}}" value="No">
                                        <label for="impacted-{{$gh->id}}-no" class="col-form-label">No</label>
                                    </div>
                                    <div class="card text-start my-2">
                                        <label for="message" class="mx-2">Please Note :</label>
                                        <textarea disabled name="notes" id="notes-{{$gh->id}}" rows="5" class="form-control border-0"></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 text-center border align-content-end">
                            <div class="">
                                @if(isset($sign))
                                <!-- Button trigger modal -->
                                <div class="text-center">
                                    <input type="hidden" name="kode" id="kode-{{$gh->id}}" value="{{$gh->id}}">
                                    <input type="hidden" name="sign" id="sign-{{$gh->id}}">
                                    <img src="{{$sign->signature}}" width="120" height="120" alt="">
                                <div class="text-center">
                                    {{$gh->name}}
                                </div>
                                <div class="text-start">
                                    <hr class="m-0 p-0">
                                    <span>Date : {{$sign->created_at}}</span>
                                </div>
                            </div>
                            @else
                             <!-- Button trigger modal -->
                             <div class="text-center">
                                <input type="hidden" name="kode" id="kode-{{$gh->id}}" value="{{$gh->kode}}">
                                <input type="hidden" name="sign" id="sign-{{$gh->id}}">
                                <div class="signature-user-{{$gh->id}}"></div>
                                <!-- Button trigger modal -->
                               
                                @if(Auth::user()->id == $gh->id || Auth::user()->id_group == 99)
                                <div class="btn-sign-{{$gh->id}}">
                                    <button type="button" class="btn btn-primary btn-sm w-100" onclick="setValue({{$gh->id}})" data-toggle="modal" data-target="#signatureModal">
                                        Sign
                                    </button>
                                </div>
                                @endif
                            <div class="text-center">
                                {{$gh->name}}
                            </div>
                            <div class="text-start">
                                <hr class="m-0 p-0">
                                <span>Date :</span>
                            </div>
                        </div>
                            @endif
                        </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
            </div>
            {{-- @endauth --}}
            <div class="p-2">
                <div class="p-2">
                    <div class="row d-flex text-center">
                        <div class="col-md-6 col-xs-6 border p-2">
                            <div class="p mt-2">
                                Changes Requestor
                            </div>
                            <div class="justify-content-around">

                                @php
                                    $sign = DB::table('signature')->where('kode', Str::lower(str_replace(' ','',$data->request_by)))
                                    ->where('redmine_no', $data->redmine_no)->first();
                                    $requestors = DB::table('users')->where('id', $data->request_by)->first();
                                @endphp
                                <div class="btn-requestor-{{$requestors->id}}">
                                    @if($sign)
                                    <img src="{{$sign->signature}}" width="120" height="120" alt="">
                                    @else
                                    @if(in_array(Auth::user()->id_group, [98, 99]) || Auth::user()->id == $data->request_by)
                                    <div class="sign" style="min-height:4rem"></div>
                                    <a href="{{route('requestor.sign', [$data->redmine_no, Auth::user()->id , base64_encode($data->request_by)] )}}" target="_blank" class="btn btn-primary btn-sm w-100">
                                        Sign
                                    </a>
                                    @else
                                    <div class="sign" style="min-height:7rem"></div>
                                    @endif
                                    @endif
                                    <p>{{ $requestors->name }}</p>
                                </div>
                            </div>
                            <hr class="m-0 p-0">
                            <div class="text-left">
                                <span>Date: {{$data->created_at}}</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6 border p-2">
                            <div class="p mt-2">
                                Change Approval
                            </div>
                            @php
                                $signGH = DB::table('signature')->where('kode', Str::lower(str_replace(' ','', $data->group_head)))
                                ->where('redmine_no', $data->redmine_no)->first();
                                $group_heads = DB::table('users')->where('id', $data->group_head)->first();
                            @endphp
                            <div class="btn-gh-{{$data->group_head}}">
                                @if(!$signGH)
                                    @if(in_array(Auth::user()->id_group,[99, 98]) || Auth::user()->id == $data->group_head)
                                    <div class="sign" style="min-height:4rem"></div>
                                    <a href="{{route('requestor.sign', [$data->redmine_no,'GH', base64_encode($data->group_head )] )}}" target="_blank" class="btn btn-primary btn-sm w-100">
                                        Sign
                                    </a>
                                    @else
                                    <div class="sign" style="min-height:7rem"></div>
                                    @endif
                                @else
                                <img src="{{$signGH->signature}}" width="120" height="120" alt="">
                                @endif
                                <p>{{ $group_heads->name }}</p>
                            </div>
                            <hr class="m-0 p-0">
                            <div class="text-left">
                                <span>Date: {{ $signGH->created_at ?? ''}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
