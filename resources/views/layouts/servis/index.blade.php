@extends('master')

@section('title', 'Data Servis')

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="padding-top:.7rem">Data Servis Masuk</h6>
                </div>
                <div class="col-md-5">
                    <form action="{{ route('servis.masuk')}}" method="get">
                    <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan barang/customer/invoice">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route('servis.cetak.all', 'servis=masuk')}}" target="blank" class="btn btn-primary"><i class="fa fa-print"></i> Printout Servis</a>
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
                        <th scope="col">Status</th>
                        {{-- <th scope="col">QrCode</th> --}}
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($servisMasuk as $servis)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><a href="">{{$servis->nama_barang}}</a></td>
                            <td>{{$servis->nama_customer}}</td>
                            <td>{{date('d M Y',strtotime($servis->tgl_masuk))}}</td>
                            @if ($servis->status == 'proses')
                            <td><span class="badge badge-pill badge-danger">Belum Selesai</span></td>
                            @else
                            <td ><span class="badge badge-pill badge-success">Selesai</span></td>
                            @endif
                            {{-- <td><img src="{{ asset($servis->qrcode)}}" alt="foto" style="width: 5rem;height: 5rem;object-fit: cover"></td> --}}
                            <td class="text-center d-flex justify-content-center">
                                
                                <a href="{{ route('servis.masuk.cetak', $servis->id)}}" target="blank" class="mx-1 btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                    
                                @if ($servis->status == 'proses')
                                <a href="{{ route('servis.masuk.selesai', $servis->id)}}" class="mx-1 btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                @else
                                <a href="{{ route('servis.masuk.ambil', $servis->id)}}" class="mx-1 btn btn-success btn-sm"><i class="fa fa-dolly"></i></a>
                                @endif

                                <form action="" method="post">
                                    @csrf
                                        {{method_field('DELETE')}}
                                    <button type="submit" class="mx-1 btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
