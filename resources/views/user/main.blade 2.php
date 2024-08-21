@extends('./layouts/base')
@section('title', $title ?? 'Formia' )
@section('main')
<div class="pt-3">
    <div class="d-flex justify-content-between py-2">
        <div class="h2" id="title">{{ $title }}</div>
        @if(Auth::user()->group_id == 99 || 98)
        <div class="">
            <a href="{{ route('add') }}" class="btn btn-primary w-100"> Tambahkan Baru</a>
        </div>
        @endif
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
        <div class="col-md-8 col-xs-12">
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
                        <input type="text" name="keyword" placeholder="Cari redmine by case / number" id="" class="form-control">
                    </div>
                    <div class="">
                        <button class="btn btn-primary btm-sm mx-1" type="submit" >Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="list-group mt-2">
            @if(count($data) > 0)
            {{-- @php
                dd(count($data));
            @endphp --}}
            {{-- @foreach($data as $dd)
            <a href="{{route('review', [$dd->id])}}" class="list-group-item list-group-item-action d-flex accordion">
                {{ 'Redmine No. #'.$dd->redmine_no.' | Case : '.$dd->title}}
            </a>
            @endforeach --}}
            <div class="accordion accordion-flush" id="impactAnalysisAccordion">
                @foreach($data as $index => $dd)
                    @php
                        $group_heads = DB::select('select * from master_data_group_head');
                        $signatures = DB::select('select * from signature where redmine_no = ?', [$dd->redmine_no]);

                        $map = [];
                        foreach ($group_heads as $gh) {
                            $hasSign = false;
                            foreach ($signatures as $sign) {
                                if ($sign->kode == $gh->kode) {
                                    $hasSign = true;
                                    break;
                                }
                            }
                            if (!$hasSign) {
                                $map[] = $gh;
                            }
                        }
                    @endphp
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$index}}">
                        <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#collapse{{$index}}" aria-expanded="false" aria-controls="collapse{{$index}}">
                            {{ 'Redmine No. #'.$dd->redmine_no.' | Case: '.$dd->title }}
                        </button>
                    </h2>
                    <div id="collapse{{$index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$index}}" data-parent="#impactAnalysisAccordion">
                        <div class="accordion-body">
                            <div class="card p-3">

                                <div class="h5">Menunggu Sign dari:</div>
                                <ol>
                                    @foreach ($map as $mm)
                                    <li><small>{{$mm->name}}</small></li>
                                @endforeach
                            </ol>
                        </div>
                            <div class="d-flex justify-content-end mt-2">
                                <a href="{{route('review', [$dd->id])}}" class="btn btn-primary text-end">Review</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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
        <div class="col-md-4 col-xs-12">
            <div class="card">
                <div class="card-header">Last Activity</div>
                <ul class="list-group">
                    @foreach($logging as $log)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <small>
                            {{ $log->messages }}
                        </small>
                    </li>
                    @endforeach
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
