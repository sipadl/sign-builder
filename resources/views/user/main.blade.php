@extends('./layouts/base')

@section('title', $title ?? 'Formia')

@section('main')
<style>
    svg {
        display: none;
    }

    .accordion-button {
        background-color: #f8f9fa;
        color: #333;
    }

    .accordion-button:hover {
        background-color: #e2e6ea;
    }

    .accordion-item {
        border: none;
    }

    .accordion-body {
        background-color: #f8f9fa;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .alert {
        position: relative;
        padding: 1rem;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    .btn-close {
        background: none;
        border: none;
        font-size: 1.2rem;
    }

    .list-group-item {
        padding: 0.75rem 1.25rem;
        border: 1px solid #e3e6f0;
    }

    .spesial-case {
        margin-top: 1rem;
    }
</style>
<div class="pt-3">
    <div class="row justify-content-between py-2">
        <div class="col-md-8 col-xs-12">
            <div class="card">
            <div class="h2 card-header mx-0" id="title">{{ $title }}</div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs mt-3" id="navId">
                    <li class="nav-item">
                        <a href="{{ route('main') }}" class="nav-link {{ request()->routeIs('main') ? 'active' : '' }}">
                            List Impact Analysis
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('wait') }}" class="nav-link {{ request()->routeIs('wait') ? 'active' : '' }}">
                            Waiting for Sign
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('signed') }}" class="nav-link {{ request()->routeIs('signed') ? 'active' : '' }}">
                            Sign in By You
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('complete') }}" class="nav-link {{ request()->routeIs('complete') ? 'active' : '' }}">
                            Complete Sign
                        </a>
                    </li>
                </ul>

                <div class="col-md-12 col-sm-12 my-3 p-2">
                    <small class="my-2">Pencarian</small>
                    <form action="{{ route('cari') }}" method="post">
                        @csrf
                        <div class="d-flex">
                            <input type="text" name="keyword" placeholder="Cari redmine by case / number" class="form-control">
                            <button class="btn btn-primary btn-sm mx-1" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="list-group mt-2 p-2">
                    @if(count($data) > 0)
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
                        <div class="accordion accordion-flush" id="impactAnalysisAccordion">
                            @foreach($data as $index => $dd)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                        {{ 'Redmine No. #'.$dd->redmine_no.' | Case: '.$dd->title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#impactAnalysisAccordion">
                                    <div class="accordion-body">
                                        <div class="card p-3">
                                            <div class="h5">Menunggu Sign dari:</div>
                                            <ol>
                                                @foreach ($map as $mm)
                                                <li><small>{{ $mm->name }}</small></li>
                                                @endforeach
                                            </ol>
                                        </div>
                                        <div class="d-flex justify-content-end mt-2">
                                            <a href="{{ route('review', [$dd->id]) }}" class="btn btn-primary text-end">Review</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center mt-4">
                        <div class="h5" style="opacity: 40%;">Data Kosong</div>
                    </div>
                    @endif

                    <div class="mt-4 spesial-case">
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
            </div>
        </div>

        @if(Auth::user()->id_group == 99 || Auth::user()->id_group == 98)
        <div class="col-md-4 col-xs-12">
        <div class="">
            <div class="text-end mb-2">
                <a href="{{ route('add') }}" class="btn btn-primary">Tambahkan Baru</a>
            </div>
                <div class="card">
                    <div class="card-header">Last Activity</div>
                    <ul class="list-group">
                        @foreach($logging as $log)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <small>{{ $log->messages }}</small>
                        </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-center align-items-center">
                            <a href="#">See More</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="row">
        @if(session('msg'))
        <div class="col-md-12" id="alert-baru">
            <div class="alert alert-success d-flex justify-content-between align-items-center" id="alert_be">
                <div>{{ session('msg') }}</div>
                <button type="button" class="btn-close" onclick="closealert()" data-bs-dismiss="alert" aria-label="Close">
                    &times;
                </button>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="col-md-12" id="alert-baru">
            <div class="alert alert-danger d-flex justify-content-between align-items-center" id="alert_be">
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close" onclick="closealert()" data-bs-dismiss="alert" aria-label="Close">
                    &times;
                </button>
            </div>
        </div>
        @endif




    </div>
</div>

<script>
    function closealert() {
        document.getElementById('alert-baru').style.display = 'none';
    }
</script>
@endsection
