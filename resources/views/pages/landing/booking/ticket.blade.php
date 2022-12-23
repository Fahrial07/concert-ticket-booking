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
                        <li class="breadcrumb-item"><a class="text-white"
                                href="{{ route('booking.index') }}">Booking</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">{{ $ticket->ticketId }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container px-lg-5">

        <div class="row">
            <div class="col-lg-12">
                <div class="btn-group mb-2">
                    <a href="{{ route('print.ticket', $ticket->ticketId) }}" class="btn btn-success btn-sm rounded">Cetak Tiket Konser</a>
                </div>
                <div class="card shadow">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table" style="width:100%">
                                <tbody>
                                    <tr>
                                        <td>Nama Konser</td>
                                        <td>:</td>
                                        <td>{{ $ticket->Concer->concer_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Konser</td>
                                        <td>:</td>
                                        <td>{{ $ticket->Concer->concer_place }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Konser</td>
                                        <td>:</td>
                                        <td>{{ Carbon\Carbon::parse($ticket->Concer->concer_time)->format('d, M Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tiket ID</td>
                                        <td>:</td>
                                        <td>{{ $ticket->ticketId }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $ticket->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{ $ticket->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>No Telpon</td>
                                        <td>:</td>
                                        <td>{{ $ticket->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>{{ $ticket->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td>TTL</td>
                                        <td>:</td>
                                        <td>{{ $ticket->pob }}, {{ $ticket->dob }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ $ticket->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')


                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
