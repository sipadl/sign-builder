@extends('./layouts/base')
@section('title', $title ?? 'Formia' )
@section('main')
<div class="">
    <div class="h2 mt-2 mb-1">Form Impact Analysis</div>
    <div class="card">
        {{-- <img src="" alt="logo mti"> --}}
        <div class="d-flex justify-content-around mt-4">
            <div class="h2">CHANGE IMPACT ANALYSIS</div>
        </div>
        <form action="{{route('post')}}" method="post" enctype="multipart/form-data">
            @csrf
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
                                id="redmine_no"
                                class="form-control"
                                placeholder="1234"
                                required="required"
                                oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')">
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
                                class="form-control"
                                placeholder="For Testing"
                                required="required">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Changes Area</label>
                        <div class="col-md-10 col-xs-12">
                            <select name="changes_area[]" class="form-control select2" placeholder="Pilih 1" multiple="multiple">
                                @foreach($master_data_changes as $changes_area)
                                <option value="{{ $changes_area->id }}">{{ $changes_area->name }}</option>
                                @endforeach
                            </select>
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
                                    class="form-control border-0"
                                    id="message"
                                    rows="5"></textarea>
                            </div>
                            <div class="card mt-1 mb-1">
                                <label for="message" class="mx-2">To Be Flow :</label>
                                <textarea
                                    name="scope_changes"
                                    class="form-control border-0"
                                    id="message"
                                    rows="5"></textarea>
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
                                <textarea required
                                    name="testing_requirement"
                                    class="form-control border-0"
                                    id="message"
                                    rows="5"></textarea>
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
                                <textarea required
                                    name="uat_env_data"
                                    class="form-control border-0"
                                    id="message"
                                    rows="5"></textarea>
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
                                <textarea required
                                    name="data_testing"
                                    class="form-control border-0"
                                    id="message"
                                    rows="5"></textarea>
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
                                <textarea required
                                    name="setup_parameter"
                                    class="form-control border-0"
                                    id="message"
                                    rows="5"></textarea>
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
                                <textarea required
                                    name="changes_of_exsiting_structure_file"
                                    class="form-control border-0"
                                    id="message"
                                    rows="5"></textarea>
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
                                <textarea required
                                    name="changes_of_database"
                                    class="form-control border-0"
                                    id="message"
                                    rows="5"></textarea>
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
                                <textarea required
                                    name="recomended_action"
                                    class="form-control border-0"
                                    id="message"
                                    rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Downtime Required</label>
                        <div class="col-md-10">
                            <input type="radio" id="yes" name="down_time" value="Yes">
                            <label for="yes" class="col-form-label">Yes</label>
                            <input type="radio" name="down_time" id="no" value="No">
                            <label for="no" class="col-form-label">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Down TIme Message</label>
                        <div class="col-md-10">
                            <input type="text" id="yes" class="form-control mt-1" required name="down_time_message" placeholder="e.g 15 min for deployment">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Requestor By</label>
                            @if(!in_array(Auth::user()->id_group, ['98',99]))
                            <input type="hidden" name="request_by" value="{{Auth::user()->id}}">
                            <input type="text" class="form-control" name="name_group" value={{Auth::user()->name}} @readonly(true)>
                            @else
                            <select class="form-control mt-1 select2" required name="request_by">
                                <option value=''>Pilih Requestor</option>
                                @foreach($user as $us)
                                    @if($us->id_group == 0)
                                <option value="{{$us->id}}">{{$us->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <div class="col text-end mt-2">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="addRequestor()">Tambah Requestor</a>
                </div> --}}
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Group Head</label>
                        <div class="col-md-10">
                            @if(!in_array(Auth::user()->id_group, ['98',99]))
                            @php
                                $gh = DB::table('users')->where('id', Auth::user()->parent_group)->first();
                            @endphp
                            <input type="hidden" name="group_head" value="{{$gh->id}}">
                            <input type="text" class="form-control" name="group_head_name" value={{$gh->name ?? ''}} @readonly(true)>
                            @else
                            <select  class="form-control mt-1 select3" required name="group_head">
                                <option value=''>Pilih Group Head</option>
                                @foreach($user as $us)
                                    @if(in_array($us->id_group, [3,1]))
                                    <option value="{{$us->id}}">{{$us->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Project Manager</label>
                        <div class="col-md-10">
                            @if(Auth::user()->id_group == 4)
                            <input type="hidden" name="group_head" value="{{Auth::user()->id}}">
                            <input type="text" class="form-control" name="project_manager" value={{Auth::user()->name ?? ''}} @readonly(true)>
                            @else
                            <select id="yes" class="form-control mt-1 select4" required name="project_manager">
                                <option value=''>Pilih Project Manager</option>
                                @foreach($user as $us)
                                    @if($us->id_group == 4)
                                    <option value="{{$us->id}}">{{$us->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end my-4 p-2">
                <button type="submit" class="btn btn-primary btn-lg mx-1">Simpan</button>
                <a href="{{ route('main') }}" class="btn btn-danger btn-lg mx-1">Kembali</a>
            </div>
        </form>
        </div>
</div>
@endsection
