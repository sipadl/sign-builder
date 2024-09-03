<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'judul' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="content container p-5">
        <p>{{ $content ?? ''}}</p>
        @php
            $data = DB::table('impact_analisis')->find(1);
            $master_data_gh = DB::table('master_data_group_head')->get();
        @endphp
        <div class="" id="pdf">
                <div class="row">
                    <div class="col-2">
                        <img src="{{ url('logo_yokke_2.png') }}" width="100" height="100" alt="logo mti">
                    </div>
                    <div class="col-9 align-self-center">
                        <div class="h2 text-center">CHANGE IMPACT ANALYSIS</div>
                    </div>
                </div>
                <hr>
                <div class="row p-2">
                    <div class="col-4">
                        <div class="form-group row text-left">
                            <label for="" class="col-form-label col-6">
                                Redmine No.
                            </label>
                            <div class="col-6">
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
                    <div class="col-8">
                        <div class="form-group row text-right">
                            <label for="" class="col-form-label col-4">
                                Title
                            </label>
                            <div class="col-8">
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
                    <div class="col-12 mt-2">
                        <div class="form-group row">
                            <label for="" class="col-form-label col-4">Changes Area</label>
                            <div class="col-8">
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
                    <div class="col-12 mt-2">
                        <div class="form-group row">
                            <label for="" class="col-form-label col-4">Define Scope</label>
                            <div class="col-8">
                                <div class="card mt-1 mb-1">
                                    <label for="message" class="mx-2">Current Flow :</label>
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
                    <div class="col-12 mt-2">
                        <div class="form-group row">
                            <label for="" class="col-form-label col-4">Testing Requirement</label>
                            <div class="col-8">
                                <div class="card mt-1 mb-1">
                                    <label for="message" class="mx-2">Please Note :</label>
                                    <textarea
                                        name="testing_requirement"
                                        readonly
                                        class="form-control border-0"
                                        id="message"
                                        rows="5">{{$data->testing_requirement}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="form-group row">
                            <label for="" class="col-form-label col-4">UAT ENV. Data Needs</label>
                            <div class="col-8">
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
                    <div class="col-12 mt-2">
                        <div class="form-group row">
                            <label for="" class="col-form-label col-4">Data Testing</label>
                            <div class="col-8">
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
                    <div class="col-12 mt-2">
                        <div class="form-group row">
                            <label for="" class="col-form-label col-4">Setup Parameter</label>
                            <div class="col-8">
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
                    <div class="col-12 mt-2">
                        <div class="form-group row">
                            <label for="" class="col-form-label col-4">Changes Of Existing Structure File</label>
                            <div class="col-8">
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
                    <div class="col-12 mt-2">
                        <div class="form-group row">
                            <label for="" class="col-form-label col-4">Changes Of Database</label>
                            <div class="col-8">
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
                    <div class="col-12 mt-2">
                        <div class="form-group row">
                            <label for="" class="col-form-label col-4">Recomended Action and Testing</label>
                            <div class="col-8">
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
                    <div class="col-12 mt-2">
                        <div class="form-group row">
                            <label for="" class="col-form-label col-4">Downtime Required</label>
                            <div class="col-8">
                                <input type="radio" id="yes" name="down_time" disabled value="Yes" readonly {{ $data->down_time == 'Yes' ? 'checked' : '' }}>
                                <label for="yes" class="col-form-label">Yes</label>
                                <input type="radio" name="down_time" id="no" value="No" disabled readonly {{ $data->down_time == 'No' ? 'checked' : '' }}>
                                <label for="no" class="col-form-label">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="p-2">
                        <div class="row p-2">
                            <div class="col-4 text-center border">
                                <h6 class="py-2">Group / Departement</h6>
                            </div>
                            <div class="col-4 text-center border">
                                <h6 class="py-2">Reviewer Notes</h6>
                            </div>
                            <div class="col-4 text-center border">
                                <h6 class="py-2">Signature</h6>
                            </div>
                            @foreach($master_data_gh as $gh )
                            @php
                                $data_map = str_replace('&', ' ', $gh->divisi);
                                $data_map = explode(" ", $gh->divisi);
                                $data_map = strtolower($data_map[count($data_map) - 2 ].'_'.$data_map[count($data_map) - 1 ]);

                                $sign = DB::table('signature')->where('redmine_no', $data->redmine_no)->where('group_head', $gh->id)->first();
                            @endphp
                            @if($gh->tipe == 1)
                            <div class="col-4 text-left border">
                                <h6>{{$gh->divisi}}
                            </div>
                            <div class="col-4 text-center border">
                                <div class="form-group row">
                                    @if(isset($sign))
                                    <div class="col-12">
                                        <div class="text-center">
                                            <input type="radio" id="yes" name="impacted-{{$gh->id}}" disabled value="Yes" readonly {{ $sign->impact == 'Yes' ? 'checked' : '' }}>
                                            <label for="impacted" class="col-form-label">Yes</label>
                                            <input type="radio" id="no" name="impacted-{{$gh->id}}" disabled value="Yes" readonly {{ $sign->impact == 'No' ? 'checked' : '' }}>
                                            <label for="impacted" class="col-form-label">No</label>
                                        </div>
                                        <div class="card text-start my-2">
                                            <label for="message" class="mx-2">Please Note :</label>
                                            <textarea name="notes" id="notes" rows="5" class="form-control border-0" readonly>{{$sign->notes ?? ''}}</textarea>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-12">
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
                                    @endif
                                </div>
                            </div>
                            <div class="col-4 text-center border align-content-end">
                                <div class="">
                                    @if(isset($sign))
                                    <div class="text-center">
                                        <input type="hidden" name="kode" id="kode-{{$gh->id}}" value="{{$gh->kode}}">
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
                                @endif
                            </div>
                            </div>
                            @elseif($gh->tipe == 2 )
                            <div class="col-4 text-left border">
                                {{$gh->divisi}}
                            </div>
                            <div class="col-4 text-center border">
                                <div class="form-group row">
                                    @if(isset($sign))
                                    <div class="col-12">
                                        <div class="text-center">
                                            <input type="radio" id="impacted-{{$gh->id}}-yes" name="impacted-{{$gh->id}}" value="Yes" {{ $sign->impact == 'Yes' ? 'checked' : '' }}>
                                            <label for="impacted-{{$gh->id}}-yes" class="col-form-label">Yes</label>
                                            <input type="radio" id="impacted-{{$gh->id}}-no" name="impacted-{{$gh->id}}" value="No" {{ $sign->impact == 'No' ? 'checked' : '' }}>
                                            <label for="impacted-{{$gh->id}}-no" class="col-form-label">No</label>
                                        </div>
                                        <div class="card text-start my-2">
                                            <label for="message" class="mx-2">Please Note :</label>
                                            <textarea name="notes" id="notes" rows="5" class="form-control border-0" readonly>{{$sign->notes ?? ''}}</textarea>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-12">
                                        <div class="text-center">
                                            <input type="radio" id="impacted-{{$gh->id}}-yes" name="impacted-{{$gh->id}}" value="Yes" >
                                            <label for="impacted-{{$gh->id}}-yes" class="col-form-label">Yes</label>
                                            <input type="radio" id="impacted-{{$gh->id}}-no" name="impacted-{{$gh->id}}" value="No" checked >
                                            <label for="impacted-{{$gh->id}}-no" class="col-form-label">No</label>
                                        </div>
                                        <div class="card text-start my-2">
                                            <label for="message" class="mx-2">Please Note :</label>
                                            <textarea name="notes" id="notes-{{$gh->id}}" rows="5" class="form-control border-0"></textarea>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4 text-center border align-content-end">
                                <div class="">
                                    @if(isset($sign))
                                    <div class="text-center">
                                        <input type="hidden" name="kode" id="kode-{{$gh->id}}" value="{{$gh->kode}}">
                                        <input type="hidden" name="sign" id="sign-{{$gh->id}}">
                                        <img src="{{$sign->signature}}" width="120" height="120" alt="">
                                    <div class="text-center">
                                        {{$gh->name}}
                                    </div>
                                    <div class="text-left">
                                        <hr class="m-0 p-0">
                                        <span>Date : {{$sign->created_at}}</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                </div>
                <div class="p-2">
                    <div class="p-2">
                        <div class="row d-flex text-center">
                            <div class="col-6 border p-2">
                                <div class="p mt-2">
                                    Changes Requestor
                                </div>
                                <div class="d-flex justify-content-around">
                                    @foreach(json_decode($data->request_by) as $key => $requestor)
                                    @php
                                        $sign = DB::table('signature')->where('kode', Str::lower(str_replace(' ','',$requestor)))
                                        ->where('redmine_no', $data->redmine_no)->first();
                                    @endphp
                                    <div class="btn-requestor-{{$key}}">
                                        @if($sign)
                                        <img src="{{$sign->signature}}" width="120" height="120" alt="">
                                        @else
                                        <div class="sign" style="min-height:7rem"></div>
                                        @endif
                                        <p>{{ $requestor }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <hr class="m-0 p-0">
                                <div class="text-center">
                                    <span>Date: {{$data->created_at}}</span>
                                </div>
                            </div>
                            <div class="col-6 border p-2">
                                <div class="p mt-2">
                                    Change Approval
                                </div>
                                @php
                                    $signGH = DB::table('signature')->where('kode', Str::lower(str_replace(' ','', $data->group_head)))
                                    ->where('redmine_no', $data->redmine_no)->first();
                                @endphp
                                <div class="btn-gh-{{$data->group_head}}">
                                    @if(!$signGH)
                                        @if(Auth::user()->group_id == 3);
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
                                    <p>{{$data->group_head}}</p>
                                </div>
                                <hr class="m-0 p-0">
                                <div class="text-center">
                                    <span>Date: {{ $signGH->created_at ?? ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>
