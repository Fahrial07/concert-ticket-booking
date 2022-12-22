@extends('layouts.land')

@section('title', $title)

@section('content')

<div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Booking Ticket Now</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('booking.index') }}">Booking</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">{{ $concer->concer_name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container px-lg-5">

        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="mt-2">Beli Tiket {{ $concer->concer_name }} Sekarang Juga !</h2>
        </div>

        <div class="text-center">
            <img src="{{ $concer->poster == null ? 'https://smartauladi.sch.id/wp-content/uploads/no-image.jpg' : Storage::url($concers->poster) }}" class="rounded" alt="{{ $concer->slug }}" width="50%">
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mt-5">
                    <div class="card-header bg-primary">
                        <h5 class="fw-bold text-white">Lengkapi Biodata</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <input type="hidden" name="concer" class="form-control" value="{{ $concer->id }}" readonly>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Nama Lengkap:</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Alamat Email:</label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone">No Telephone / Whatsapp:</label>
                                        <input type="number" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="gender">Jenis Kelamin:</label>
                                      <select name="gender" id="gender" class="form-control">
                                        <option selected disabled>-- Pilih Jenis Kelamin --</option>
                                        <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                                        <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label for="pob">Tempat Lahir:</label>
                                                        <input type="text" name="pob" class="form-control" value="{{ old('pob') }}" id="pob">
                                                    </div>
                                                </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-3">
                                                            <label for="dob">Tanggal Lahir:</label>
                                                            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" id="dob">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="address">Alamat Lengkap:</label>
                                        <textarea name="address" id="address" cols="30" rows="6" class="form-control">{{ old('address') }}</textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success btn-sm rounded fw-bold" type="submit">Order Now</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
