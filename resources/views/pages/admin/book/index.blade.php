@extends('layouts.app')

@section('title', $title)

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Jadwal Konser</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }});">Dashboard</a></li>
                        <li class="breadcrumb-item active">Jadwal Konser</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-reponsive overflow-auto">
                            <table id="order" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Konser</th>
                                        <th>Waktu Konser</th>
                                        <th>TicketID</th>
                                        <th>Status</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>No Telephon</th>
                                        <th>Jenis Kelamin</th>
                                        <th>TTL</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $n=1;
                                    @endphp
                                    @foreach ($concers as $c)
                                        <tr>
                                            <td>{{ $n }}.</td>
                                            <td>{{ $c->Concer->concer_name }}</td>
                                            <td>{{ $c->Concer->concer_time }}</td>
                                            <td><span class="fw-bold">{{ $c->ticketId }}</span></td>
                                            <td>
                                                @if($c->status == 1)
                                                    <span class="badge bg-success">Check In</span>
                                                @elseif($c->status == 0)
                                                    <span class="badge bg-danger">Waiting  to Check In</span>
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $c->email }}</td>
                                            <td>{{ $c->phone }}</td>
                                            <td>{{ $c->gender }}</td>
                                            <td>{{ $c->pod }}, {{ $c->dob }}</td>
                                            <td>{{ $c->address }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-warning btn-sm rounded fw-bold" data-bs-toggle="modal" data-bs-target="#edit{{ $c->id }}" type="button">Edit</button>


                                                    <div class="modal fade" id="delete{{ $c->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger">
                                                                    <h5 class="modal-title fw-bold" id="staticBackdropLabel">Konfirmasi Hapus</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-l">
                                                                            <h5>Apakah anda yakin akan menghapus data dengan tiket ID {{ $c->ticketId }} ?</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="event.preventDefault; document.getElementById('del').submit();">Hapus</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <form action="{{ route('admin.ticket_order.destroy', $c->id) }}" id="del" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>




                                                    &nbsp;
                                                    <button class="btn btn-danger btn-sm rounded fw-bold" data-bs-toggle="modal" data-bs-target="#delete{{ $c->id }}" type="button">Delete</button>
                                                </div>

                                                <div class="modal fade" id="edit{{ $c->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning">
                                                                <h5 class="modal-title fw-bold" id="staticBackdropLabel">Edit Data</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <form action="{{ route('admin.ticket_order.update', $c->id) }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PUT')

                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Nama:</label>
                                                                                        <input type="text" class="form-control" name="name" value="{{ $c->name }}">
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Email:</label>
                                                                                        <input type="text" class="form-control" name="email" value="{{ $c->email }}">
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">No Telp:</label>
                                                                                        <input type="text" class="form-control" name="phone" value="{{ $c->phone }}">
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Jenis Kelamin:</label>
                                                                                        <select name="gender" class="form-control" id="">
                                                                                            <option value="L" {{ $c->gender == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                                                                                            <option value="P" {{ $c->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Status:</label>
                                                                                        <select name="status" class="form-control" id="">
                                                                                            <option value="0" {{ $c->status == '0' ? 'selected' : '' }}>Waiting to Check In</option>
                                                                                            <option value="1" {{ $c->status == '1' ? 'selected' : '' }}>Check In</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Tempat Lahir:</label>
                                                                                        <input type="text" name="pob" class="form-control" value="{{ $c->pob }}">
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Tanggal Lahir:</label>
                                                                                        <input type="text" name="dob" class="form-control" value="{{ $c->dob }}">
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Alamat:</label>
                                                                                        <textarea name="address" id="" class="form-control" cols="30" rows="10">{{ $c->address }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="btn-group">
                                                                                <button class="btn btn-success btn-sm fw-bold" type="submit">Simpan</button>
                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @php
                                        $n++;
                                    @endphp
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
            $('#order').DataTable();
        });
    </script>
@endpush
