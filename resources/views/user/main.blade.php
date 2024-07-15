@extends('./layouts/base')
@section('title', $title ?? 'Formia' )
@section('main')
<div class="pt-3">
    <div class="d-flex justify-content-between py-2">
        <div class="h2" id="title">title sementara ( handle pake js )</div>
        <div class="">
            <a href="{{ route('add') }}" class="btn btn-primary w-100"> tambahkan Impact Analysis</a>
        </div>
    </div>
        <div class="row">
        <div class="col-md-8 col-xs-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="navId">
            <li class="nav-item">
                <a href="#tab1Id" class="nav-link active">List Impact Analysis</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sign</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('wait')}}">Waiting for Sign</a>
                    <a class="dropdown-item" href="{{route('signed')}}">Sign in By You</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{route('complete')}}" class="nav-link">Complete Sign</a>
            </li>
        </ul>
        <div class="list-group mt-2">
            @if(isset($data->items))
            @foreach($data as $dd)
            <a href="{{route('review', [$dd->id])}}" class="list-group-item list-group-item-action">{{ $dd->redmine_no.' - '.$dd->title}}</a>
            @endforeach
            @else
            <div class="text-center mt-4">

                <div class="h5" style="opacity: 40%;">
                    Data Kosong
                </div>
            </div>
            @endif
        </div>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
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
