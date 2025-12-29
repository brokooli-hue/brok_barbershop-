@extends('layouts.base')
@section('content')
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">Total Page Views</h6>
                    <h4 class="mb-3">4,42,236 <span class="badge bg-light-primary border border-primary"><i
                                class="ti ti-trending-up"></i> 59.3%</span></h4>
                    <p class="mb-0 text-muted text-sm">You made an extra <span class="text-primary">35,000</span> this year
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">Total Users</h6>
                    <h4 class="mb-3">78,250 <span class="badge bg-light-success border border-success"><i
                                class="ti ti-trending-up"></i> 70.5%</span></h4>
                    <p class="mb-0 text-muted text-sm">You made an extra <span class="text-success">8,900</span> this year
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">Total Order</h6>
                    <h4 class="mb-3">18,800 <span class="badge bg-light-warning border border-warning"><i
                                class="ti ti-trending-down"></i> 27.4%</span></h4>
                    <p class="mb-0 text-muted text-sm">You made an extra <span class="text-warning">1,943</span> this year
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">Total Sales</h6>
                    <h4 class="mb-3">$35,078 <span class="badge bg-light-danger border border-danger"><i
                                class="ti ti-trending-down"></i> 27.4%</span></h4>
                    <p class="mb-0 text-muted text-sm">You made an extra <span class="text-danger">$20,395</span> this year
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-8">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="mb-0">Unique Visitor</h5>
                <ul class="nav nav-pills justify-content-end mb-0" id="chart-tab-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="chart-tab-home-tab" data-bs-toggle="pill"
                            data-bs-target="#chart-tab-home" type="button" role="tab" aria-controls="chart-tab-home"
                            aria-selected="true">Month</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="chart-tab-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#chart-tab-profile" type="button" role="tab"
                            aria-controls="chart-tab-profile" aria-selected="false">Week</button>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="chart-tab-tabContent">
                        <div class="tab-pane" id="chart-tab-home" role="tabpanel" aria-labelledby="chart-tab-home-tab"
                            tabindex="0">
                            <div id="visitor-chart-1"></div>
                        </div>
                        <div class="tab-pane show active" id="chart-tab-profile" role="tabpanel"
                            aria-labelledby="chart-tab-profile-tab" tabindex="0">
                            <div id="visitor-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
