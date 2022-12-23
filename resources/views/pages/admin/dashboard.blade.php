@extends('layouts.app')

@section('title', $title)

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }});">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex text-muted">
                        <div class="flex-shrink-0 me-3 align-self-center">

                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Data Konser</p>
                            <h5 class="mb-3">{{ $concer }}</h5>
                            <p class="text-truncate mb-0"><span class="text-success me-2"> 0.02% <i
                                        class="ri-arrow-right-up-line align-bottom ms-1"></i></span> From previous</p>
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3 align-self-center">

                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Booking Data</p>
                            <h5 class="mb-3">{{ $booking }}</h5>
                            <p class="text-truncate mb-0"><span class="text-success me-2"> 1.7% <i
                                        class="ri-arrow-right-up-line align-bottom ms-1"></i></span> From previous</p>
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex text-muted">
                        <div class="flex-shrink-0 me-3 align-self-center">

                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Check In</p>
                            <h5 class="mb-3">{{ $checkin }}</h5>
                            <p class="text-truncate mb-0"><span class="text-danger me-2"> 0.01% <i
                                        class="ri-arrow-right-down-line align-bottom ms-1"></i></span> From previous</p>
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex text-muted">
                        <div class="flex-shrink-0  me-3 align-self-center">
                            <div class="avatar-sm">

                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Waiting to Checkin</p>
                            <h5 class="mb-3">{{ $dcheckin }}</h5>
                            <p class="text-truncate mb-0"><span class="text-success me-2"> 0.01% <i
                                        class="ri-arrow-right-up-line align-bottom ms-1"></i></span> From previous</p>
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->


@endsection
