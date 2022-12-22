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
                            <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h2 class="mt-2">Booking Now</h2>
                </div>
                <div class="row g-4 d-flex justify-content-center">

                    @forelse ($concers as $c)
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                            <div class="card shadow">
                                <img src="{{ $c->poster == null ? 'https://smartauladi.sch.id/wp-content/uploads/no-image.jpg' : Storage::url($c->poster) }}" class="card-img-top" alt="{{ $c->slug }}">
                                <div class="card-body">
                                    <h5 class="card-title text-center fw-bold mb-3">{{ $c->concer_name }}</h5>

                                    <div class="table-responsive">
                                        <table>
                                            <tbody>
                                                <tr class="text-dark">
                                                    <td>Harga</td>
                                                    <td>:</td>
                                                    <td class="fw-bold">Rp. {{ number_format($c->price, 0) }}</td>
                                                </tr>
                                                <tr class="text-dark">
                                                    <td>Tempat</td>
                                                    <td>:</td>
                                                    <td>{{ $c->concer_place }}</td>
                                                </tr>
                                                <tr class="text-dark">
                                                    <td>Waktu</td>
                                                    <td>:</td>
                                                    <td>{{ Carbon\Carbon::parse($c->concer_time)->format('d, M Y H:i:s') }}</td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>

                                  <div class="d-flex justify-content-between mt-2">
                                    <span class="badge bg-success">Kuota: {{ $c->quota }} Orang</span>
                                    <span class="badge bg-warning text-dark">Tersisa: {{ $c->quota - $c->sold }} Orang</span>
                                  </div>

                                    @if((date('Y-m-d') >= $c->open_date && date('Y-m-d') <= $c->close_date) && ($c->quota - $c->sold) > 0)
                                        <div class="d-flex justify-content-center mt-3">
                                            <a href="{{ route('booking.show', $c->slug) }}" class="btn btn-primary">Order Now</a>
                                        </div>
                                    {{--  @elseif($c->open_date < date('Y-m-d') || $c->close_date > date('Y-m-d'))  --}}
                                    @endif

                                </div>
                                <div class="card-footer text-center bg-info">
                                    <small class="text-dark text-center">Register on: {{ Carbon\Carbon::parse($c->open_date)->format('d, M Y') }} <span class="fw-bold text-danger">to</span> {{ Carbon\Carbon::parse($c->close_date)->format('d, M Y') }}</small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex justify-content-center">
                            <div class="alert alert-info text-center" role="alert">
                                <h5 class="fw-bold">Data Konser tidak di temukan !</h5>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>

@endsection
