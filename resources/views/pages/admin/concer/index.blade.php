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
            <div class="card-body">
                <div class="btn-group mb-3">
                    <button class="btn btn-success btn-sm fw-bold rounded" type="button" data-bs-toggle="modal" data-bs-target="#add">+ Tambah Data</button>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                       <div class="table-responsive overflow-auto">
                            <table id="concer" class="table table-striped" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Konser</th>
                                        <th>Poster</th>
                                        <th>Harga</th>
                                        <th>Tempat</th>
                                        <th>Waktu Konser</th>
                                        <th>Kuota</th>
                                        <th>Terjual</th>
                                        <th>Register</th>
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
                                            <td>{{ $c->concer_name }}</td>
                                            <td>
                                                @if($c->poster == null || $c->poster == "")
                                                    <span class="badge bg-primary">No Poster</span>
                                                @else
                                                    <img src="{{ Storage::url($c->poster) }}" class="img-thumbnail roudned" alt="{{ $c->slug }}" width="50%">
                                                @endif
                                            </td>
                                            <td>Rp. {{ number_format($c->price, 0) }}</td>
                                            <td>{{ $c->concer_place }}</td>
                                            <td>{{ Carbon\Carbon::parse($c->concer_time)->format('d, M Y') }}</td>
                                            <td>{{ $c->quota}}</td>
                                            <td>{{ $c->sold }}</td>
                                            <td>
                                                {{ Carbon\Carbon::parse($c->open_date)->format('d, M Y') }}

                                                <span class="text-danger fw-bold">TO</span>

                                                {{ Carbon\Carbon::parse($c->close_date)->format('d, M Y') }}
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-warning btn-sm fw-bold rounded" type="button" type="button" data-bs-toggle="modal" data-bs-target="#edit{{ $c->id }}">Edit</button>


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
                                                                            <h5>Apakah anda yakin akan menghapus data ini ? ?</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        onclick="event.preventDefault; document.getElementById('del').submit();">Hapus</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <form action="{{ route('admin.concer.destroy', $c->id) }}" id="del" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    &nbsp;
                                                    <button class="btn btn-danger btn-sm fw-bold rounded" type="button" type="button" data-bs-toggle="modal" data-bs-target="#delete{{ $c->id }}">Delete</button>
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
                                                                        <form action="{{ route('admin.concer.update', $c->id) }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PUT')

                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Nama Konser:</label>
                                                                                        <input type="text" name="concer_name" class="form-control"
                                                                                            value="{{ $c->concer_name }}">
                                                                                        @error('concer_name')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Poster:</label>
                                                                                        @if ($c->poster == null || $c->poster == "")
                                                                                            <span class="badge bg-primary">No Poster</span>
                                                                                        @else

                                                                                        <br>
                                                                                            <img src="{{ Storage::url($c->poster) }}" class="img-thumbnail roudned" alt="{{ $c->slug }}" width="50%">
                                                                                        @endif
                                                                                        <input type="file" name="poster" class="form-control"
                                                                                            value="{{ old('poster') }}">
                                                                                        @error('poster')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Harga:</label>
                                                                                        <input type="number" name="price" class="form-control"
                                                                                            value="{{ $c->price }}">
                                                                                        @error('price')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Tempat Konser:</label>
                                                                                        <textarea name="concer_place" id="" class="form-control" cols="30"
                                                                                            rows="3">{{ $c->concer_place }}</textarea>
                                                                                        @error('concer_place')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Waktu Konser:</label>
                                                                                        <input type="date" name="concer_time" class="form-control"
                                                                                            value="{{ $c->concer_time }}">
                                                                                        @error('concer_time')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Kuota Penonton:</label>
                                                                                        <input type="number" name="quota" class="form-control"
                                                                                            value="{{ $c->quota }}">
                                                                                        @error('quota')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Pembukaan Pendafaran:</label>
                                                                                        <input type="date" name="open_date" class="form-control"
                                                                                            value="{{ $c->open_date }}">
                                                                                        @error('open_date')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="">Penutupan Pendafaran:</label>
                                                                                        <input type="date" name="close_date" class="form-control"
                                                                                            value="{{ $c->close_date }}">
                                                                                        @error('close_date')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-success btn-sm fw-bold">Simpan</button>
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
                                </tbody>
                            </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title fw-bold" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.concer.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="">Nama Konser:</label>
                                        <input type="text" name="concer_name" class="form-control" value="{{ old('concer_name') }}">
                                        @error('concer_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Poster:</label>
                                        <input type="file" name="poster" class="form-control" value="{{ old('poster') }}">
                                        @error('poster')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Harga:</label>
                                        <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                                        @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Tempat Konser:</label>
                                      <textarea name="concer_place" id="" class="form-control" cols="30" rows="3">{{ old('concer_place') }}</textarea>
                                        @error('concer_place')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Waktu Konser:</label>
                                            <input type="date" name="concer_time" class="form-control" value="{{ old('concer_time') }}">
                                            @error('concer_time')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Kuota Penonton:</label>
                                            <input type="number" name="quota" class="form-control" value="{{ old('quota') }}">
                                            @error('quota')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Pembukaan Pendafaran:</label>
                                            <input type="date" name="open_date" class="form-control" value="{{ old('open_date') }}">
                                            @error('open_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Penutupan Pendafaran:</label>
                                            <input type="date" name="close_date" class="form-control" value="{{ old('close_date') }}">
                                            @error('close_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-sm fw-bold">Simpan</button>
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


@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
                $('#concer').DataTable();
            });
    </script>
@endpush
