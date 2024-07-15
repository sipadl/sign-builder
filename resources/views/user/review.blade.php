@extends('./layouts/base') @section('main')
<div class="">
    <div class="d-flex justify-content-between">
        <div class="h2 mt-2 mb-1">Form Migration Plan</div>
        <div class="align-self-center">
            <button class="btn btn-sm btn-warning p-2" id="savetopdf" onclick="saveToPDF()">Export to PDF</button>
        </div>
    </div>
    <div class="card" id="pdf">
        <div class="d-flex justify-content-start">
            <div class="text-start">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo5uFqraSipfIfVuOte8zXh-gJTH1QzIeIIw&s" width="100" height="100" alt="logo mti">
            </div>
            <div class="d-flex justify-content-around">
                <div class="h2">CHANGE IMPACT ANALYSIS</div>
            </div>
        </div>
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
                                readonly
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
                                readonly
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
                                // dd(json_decode($data->changes_area));
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
                                    readonly
                                    class="form-control border-0"
                                    id="message"
                                    rows="5">{{$data->scope_existing}}</textarea>
                            </div>
                            <div class="card mt-1 mb-1">
                                <label for="message" class="mx-2">Existing Flow :</label>
                                <textarea
                                    name="scope_changes"
                                    value=""
                                    readonly
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
                                    value=
                                    readonly
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
                                    readonly
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
                                    readonly
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
                                    readonly
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
                                    readonly
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
                                    readonly
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
                                    readonly
                                    rows="5">{{$data->recomended_action}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Downtime Required</label>
                        <div class="col-md-10">
                            <input type="radio" id="yes" name="down_time" disabled value="Yes" readonly {{ $data->down_time == 'Yes' ? 'checked' : '' }}>
                            <label for="yes" class="col-form-label">Yes</label>
                            <input type="radio" name="down_time" id="no" value="No" disabled readonly {{ $data->down_time == 'No' ? 'checked' : '' }}>
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
                                        <input type="radio" id="yes" name="impacted" disabled value="Yes" readonly {{ $sign->impact == 'Yes' ? 'checked' : '' }}>
                                        <label for="impacted" class="col-form-label">Yes</label>
                                        <input type="radio" id="no" name="impacted" disabled value="Yes" readonly {{ $sign->impact == 'No' ? 'checked' : '' }}>
                                        <label for="impacted" class="col-form-label">No</label>
                                    </div>
                                    <div class="card text-start my-2">
                                        <label for="message" class="mx-2">Please Note :</label>
                                        <textarea name="notes" id="notes" rows="5" class="form-control border-0" readonly>{{$sign->notes ?? ''}}</textarea>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <input type="radio" id="impacted-{{$gh->id}}" name="impacted" value="Yes">
                                        <label for="impacted" class="col-form-label">Yes</label>
                                        <input type="radio" name="impacted" id="impacted-{{$gh->id}}" value="No">
                                        <label for="impacted" class="col-form-label">No</label>
                                    </div>
                                    <div class="card text-start my-2">
                                        <label for="message" class="mx-2">Please Note :</label>
                                        <textarea name="notes" id="notes-{{$gh->id}}" rows="5" class="form-control border-0"></textarea>
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
                                    <input type="hidden" name="kode" id="kode-{{$gh->id}}" value="{{$gh->kode}}">
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
                             <!-- Button trigger modal -->
                             <div class="text-center">
                                <input type="hidden" name="kode" id="kode-{{$gh->id}}" value="{{$gh->kode}}">
                                <input type="hidden" name="sign" id="sign-{{$gh->id}}">
                                <div class="signature-user-{{$gh->id}}"></div>
                                <!-- Button trigger modal -->
                                <div class="btn-sign-{{$gh->id}}">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="setValue({{$gh->id}})" data-toggle="modal" data-target="#signatureModal">
                                        Sign
                                    </button>
                                </div>
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
                                @if(isset($sign))
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <input type="radio" id="yes" name="impacted" disabled value="Yes" readonly {{ $sign->impact == 'Yes' ? 'checked' : '' }}>
                                        <label for="impacted" class="col-form-label">Yes</label>
                                        <input type="radio" id="no" name="impacted" disabled value="Yes" readonly {{ $sign->impact == 'No' ? 'checked' : '' }}>
                                        <label for="impacted" class="col-form-label">No</label>
                                    </div>
                                    <div class="card text-start my-2">
                                        <label for="message" class="mx-2">Please Note :</label>
                                        <textarea name="notes" id="notes" rows="5" class="form-control border-0" readonly>{{$sign->notes ?? ''}}</textarea>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <input type="radio" id="impacted-{{$gh->id}}" name="impacted" value="Yes">
                                        <label for="impacted" class="col-form-label">Yes</label>
                                        <input type="radio" name="impacted" id="impacted-{{$gh->id}}" value="No">
                                        <label for="impacted" class="col-form-label">No</label>
                                    </div>
                                    <div class="card text-start my-2">
                                        <label for="message" class="mx-2">Please Note :</label>
                                        <textarea name="notes" id="notes-{{$gh->id}}" rows="5" class="form-control border-0"></textarea>
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
                                    <input type="hidden" name="kode" id="kode-{{$gh->id}}" value="{{$gh->kode}}">
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
                             <!-- Button trigger modal -->
                             <div class="text-center">
                                <input type="hidden" name="kode" id="kode-{{$gh->id}}" value="{{$gh->kode}}">
                                <input type="hidden" name="sign" id="sign-{{$gh->id}}">
                                <div class="signature-user-{{$gh->id}}"></div>
                                <!-- Button trigger modal -->
                                <div class="btn-sign-{{$gh->id}}">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="setValue({{$gh->id}})" data-toggle="modal" data-target="#signatureModal">
                                        Sign
                                    </button>
                                </div>
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
                        @endif
                        @endforeach
                    </div>
                    {{-- <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                    </div>
                </form> --}}
            </div>
            {{-- @endauth --}}

            <div class="p-2">
                <div class="p-2">
                    <div class="row d-flex text-center">
                        <div class="col-md-6 col-xs-6 border p-2">
                            <div class="p mt-2">
                                Changes Requestor
                            </div>
                            <div class="sign" style="min-height:5rem"></div>
                            <div class="d-flex justify-content-around">
                                @foreach(json_decode($data->request_by) as $requestor)
                                <p>{{ json_decode($data->request_by)[0]}}</p>
                                @endforeach
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
                            <div class="sign" style="min-height:5rem"></div>
                            <p>{{$data->group_head}}</p>
                            <hr class="m-0 p-0">
                            <div class="text-left">
                                <span>Date:</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
