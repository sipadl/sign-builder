@extends('./layouts/base') @section('main')
<div class="pt-3">
    <div class="d-flex justify-content-between py-2">
        <div class="h2" id="title">title sementara ( handle pake js )</div>
        <div class="">
            <a href="{{ route('add') }}" class="btn btn-primary w-100"> tambahkan migration plan</a>
        </div>
    </div>
        <div class="row">
        <div class="col-md-8 col-xs-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button
                        class="nav-link active"
                        id="nav-home-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-home"
                        type="button"
                        role="tab"
                        aria-controls="nav-home"
                        aria-selected="true">Home</button>
                    <button
                        class="nav-link"
                        id="waiting-for-sign"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-waiting-for-sign"
                        type="button"
                        role="tab"
                        aria-controls="nav-profile"
                        aria-selected="false">Waiting for Sign</button>
                    <button
                        class="nav-link"
                        id="sign-by-you"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-sign-by-you"
                        type="button"
                        role="tab"
                        aria-controls="nav-profile"
                        aria-selected="false">Sign by You</button>
                    {{-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
              <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>Disabled</button> --}}
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                {{-- main --}}
                <div
                    class="tab-pane fade show active"
                    id="nav-home"
                    role="tabpanel"
                    aria-labelledby="nav-home-tab"
                    tabindex="0">
                    <div class="list-group">
                        @foreach($data as $dd)
                        <a href="{{route('review', [$dd->id])}}" class="list-group-item list-group-item-action">{{ $dd->redmine_no.' - '.$dd->title}}</a>
                        @endforeach
                    </div>
                </div>
                {{-- waiting for sign --}}
                <div
                    class="tab-pane fade"
                    id="nav-waiting-for-sign"
                    role="tabpanel"
                    aria-labelledby="waiting-for-sign"
                    tabindex="0">
                    b
                </div>
                {{-- sign by you --}}
                <div
                    class="tab-pane fade"
                    id="nav-sign-by-you"
                    role="tabpanel"
                    aria-labelledby="sign-by-you"
                    tabindex="0">
                    c
                </div>
            </div>
        </div> {{-- end col 9 --}}
        <div class="col-md-4 col-xs-12">
            <div class="card">
                <div class="card-header">Last Activity</div>
                <ul class="list-group">
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center"
                    >
                        nama file
                        <span class="badge bg-secondary badge-pill">sign by : nama depan</span>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-center align-items-center">
                        <a href="#">
                            See More
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
