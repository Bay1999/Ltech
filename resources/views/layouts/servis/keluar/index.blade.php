@extends('master')

@section('title', 'Data Servis Keluar')

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary" style="padding-top:.7rem">Data Servis Keluar</h6>
                </div>
                
                <div class="col-md-6 text-right">
                    <a href="{{ route('servis.cetak.all', 'servis=keluar')}}" target="blank" class="btn btn-primary"><i class="fa fa-print"></i> Printout Servis</a>
                    {{-- <a href="{{ route('servis.masuk.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Servis</a> --}}
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
                        <th scope="col">Nama Pengambil</th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Biaya</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($servisKeluar as $servis)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><a href="">{{$servis->nama_barang}}</a></td>
                            <td>{{$servis->nama_pengambil}}</td>
                            <td>{{date('d M Y',strtotime($servis->tgl_keluar))}}</td>
                            <td>Rp {{number_format($servis->biaya,0,',','.')}}</td>
                            <td class="text-center"><a href="{{ route('servis.keluar.cetak', $servis->id)}}" target="blank" class="mx-1 btn btn-primary btn-sm"><i class="fa fa-print"></i></a></td>
                            
                        </tr>
                        @empty
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data Servis Keluar Masih Kosong
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