@extends('layouts.app')

@section('title', $title)

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Check In</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }});">Dashboard</a></li>
                    <li class="breadcrumb-item active">Check In</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="fw-bold">Masukkan TickedID</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.check_in.store') }}" class="row g-2s" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group col-9">
                                <input type="text" name="ticketId" class="form-control" value="{{ old('ticketId') }}" >
                            </div>
                            <div class="form-group col-3">
                                <button class="btn btn-success btn-md">Check In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('after-script')

@endpush
