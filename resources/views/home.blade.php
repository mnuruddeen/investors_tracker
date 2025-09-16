@extends('layouts.app')

@section('content')
    <header class="mb-3">
      <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
      </a>
    </header>
    <div id="lga_label" data="{{ json_encode(array_keys($chart_data)) }}"></div>
    <div id="investment_value" data="{{ json_encode(array_values($chart_data)) }}"></div>
    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldBuy"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Investment Count</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($investments->count()) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldWallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Investment Value</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($investments->sum('investment_value'),2) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldWork"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total Job Created</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($investments->sum('job_created')) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @if(auth()->user()->is_admin)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Total Investment Value Per LGA</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body py-4 px-5">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h6 class="font-bold">{{ auth()->user()->name }}</h6>
                                    <h6 class="text-muted mb-0">{{ (auth()->user()->is_admin)?"Admin":"Investor" }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(auth()->user()->is_admin)
                    <div class="card">
                        <div class="card-header">
                            <h4>Investment</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-visitors-profile"></div>
                        </div>
                    </div>
                    @endif
                </div>

        </section>
    </div>



</body>

</html>

@endsection

@push('script')

@endpush
