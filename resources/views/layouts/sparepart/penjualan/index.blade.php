@extends('master')

@section('title', 'Penjualan Data Sparepart')

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary" style="padding-top:.7rem">Penjualan Data Sparepart</h6>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('sparepart.penjualan.laporan')}}" target="blank" class="btn btn-primary"><i class="fa fa-print"></i> Laporan Penjualan</a>
                    <a href="{{ route('sparepart.penjualan.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Penjualan Sparepart</a>
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
                        <th scope="col">Jenis Part</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga Jual(Total)</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($dataPenjualan as $penjualan)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$penjualan->nama}}</td>
                            <td>{{$penjualan->jenis}}</a></td>
                            <td>{{$penjualan->jumlah}}</td>
                            <td>{{$penjualan->harga_total}}</td>
                            <td class="text-center">
                                <form action="{{ route('sparepart.penjualan.destroy', $penjualan->id)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data Sparepart Masih Kosong
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