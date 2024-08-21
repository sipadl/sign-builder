@extends('./layouts/base')
@section('title', $title ?? 'Formia' )
@section('main')
<div class="pt-3">
    <div class="d-flex justify-content-between py-2">
        <div class="h2" id="title">{{ $title }}</div>
    </div>
        <div class="row">
            @if(session('msg'))
            <div class="col-md-12" id="alert-baru">
                    <div class="alert alert-success d-flex justify-content-between" id="alert_be">
                        <div class="">
                            {{ session('msg') }}
                        </div>
                        <button type="button" class="btn-close" onclick="closealert()" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
            </div>
            @endif
            @if(session('error'))
            <div class="col-md-12" id="alert-baru">
                    <div class="alert alert-danger d-flex justify-content-between" id="alert_be">
                        <div class="">
                            {{ session('error') }}
                        </div>
                        <button type="button" class="btn-close" onclick="closealert()" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
            </div>
            @endif
        <div class="col-md-1 col-xs-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="navId">
            <li class="nav-item">
                <a href="{{ route('main') }}" class="nav-link active">List Impact Analysis</a>
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
        <div class="col-md-12 col-sm-12 my-3">
            <small class="my-2">Pencarian</small>
            <form action="{{route('cari')}}" method="post">
                @csrf
                <div class="d-flex">
                    <div class="w-100">
                        <input type="text" name="keyword" value="{{$keyword}}" placeholder="Cari redmine by case / number" id="" class="form-control">
                    </div>
                    <div class="">
                        <button class="btn btn-primary btm-sm mx-1" type="submit" >Cari</button>
                    </div>
                </div>
                <small>Menampilkan {{count($data) }} hasil pencarian dari "{{$keyword}}"</small>
            </form>
        </div>
        <div class="list-group mt-2">
            @if(count($data) > 0)
            {{-- @php
                dd(count($data));
            @endphp --}}
            @foreach($data as $dd)
            <a href="{{route('review', [$dd->id])}}" class="list-group-item list-group-item-action">
                {{ 'Redmine No. #'.$dd->redmine_no.' | Case : '.$dd->title}}
            </a>
            @endforeach
            @else
            <div class="text-center mt-4">
                <div class="h5" style="opacity: 40%;">
                    Data Kosong
                </div>
            </div>
            @endif
            <div class=" mt-4 spesial-case">
                {{ $data->links() }}
            </div>
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
    </div>
</div>
@endsection
