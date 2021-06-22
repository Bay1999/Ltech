@extends('master')

@section('title', 'Data Servis')

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary" style="padding-top:.7rem">Data Servis Masuk</h6>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('servis.masuk.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Servis</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Nama Customer</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">QrCode</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($servisMasuk as $servis)
                        <tr>
                            <th style="padding-top: 2.5rem;" scope="row">{{$loop->iteration}}</th>
                            <td style="padding-top: 2.5rem;"><a href="">{{$servis->nama_barang}}</a></td>
                            <td style="padding-top: 2.5rem;">{{$servis->nama_customer}}</td>
                            <td style="padding-top: 2.5rem;">{{date('d M Y',strtotime($servis->tgl_masuk))}}</td>
                            <td><img src="{{ asset($servis->qrcode)}}" alt="foto" style="width: 5rem;height: 5rem;object-fit: cover"></td>
                            <td style="padding-top: 1.2rem;" class="text-center">
                                <form action="" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <a href="{{ route('servis.masuk.cetak', $servis->id)}}" target="blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                    <a href="" class="btn btn-success btn-sm"><i class="fa fa-dolly"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data Teknisi Masih Kosong
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection