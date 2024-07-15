@extends('./layouts/base') @section('main')
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
                                id=""
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
                            <select name="changes_area[]" class="form-control" id="" multiple="multiple">
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
                                <label for="message" class="mx-2">Existing Flow :</label>
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
                                <textarea
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
                                <textarea
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
                                <textarea
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
                                <textarea
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
                                <textarea
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
                                <textarea
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
                                <textarea
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
                        <div class="col-md-10 requester">
                            <input type="text" id="yes" class="form-control mt-1" required name="request_by[]">
                        </div>
                    </div>
                </div>
                <div class="col text-end mt-2">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="addRequestor()">Tambah Requestor</a>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Group Head</label>
                        <div class="col-md-10">
                            <input type="text" id="yes" class="form-control" required name="group_head">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-2">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-2 col-xs-12">Project Manager</label>
                        <div class="col-md-10">
                            <input type="text" id="yes" class="form-control" required name="project_manager">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end my-4 p-2">
                <button type="submit" class="btn btn-primary btn-lg mx-1">Simpan</button>
                <a href="route('main')" class="btn btn-danger btn-lg mx-1">Kembali</a>
            </div>
        </form>
        </div>
</div>
@endsection
