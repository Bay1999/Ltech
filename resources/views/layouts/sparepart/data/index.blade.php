@extends('master')

@section('title', 'Data Sparepart')

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary" style="padding-top:.7rem">Data Sparepart</h6>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('sparepart.data.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Sparepart</a>
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
                        <th scope="col">Stok</th>
                        <th scope="col">Harga Beli(terakhir)</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($sparepart as $part)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><a href="{{ route('sparepart.data.edit', $part->id)}}">{{$part->nama}}</a></td>
                            <td>{{$part->jenis}}</a></td>
                            <td>{{$part->stok}}</td>
                            @if ($part->harga_beli == '0')
                            <td>Belum beli barang</td>
                            @else
                            <td>Rp {{number_format($part->harga_beli,0,',','.')}}</td>
                            @endif
                            <td style="padding:.5rem;">
                                <form action="{{ route('sparepart.data.update_harga', $part->id)}}" method="post" class="form-inline">
                                    @csrf
                                    <input type="number" class="form-control" name="harga" value="{{$part->harga_jual != null ? $part->harga_jual:''}}">
                                    <button type="submit" class="btn btn-primary ml-1"><i class="fa fa-save"></i></button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('sparepart.data.destroy', $part->id)}}" method="post">
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