@extends('master')

@section('title', 'Data Teknisi')

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary" style="padding-top:.7rem">Data Teknisi</h6>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('teknisi.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Teknisi</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Job</th>
                        <th scope="col">Foto</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataTeknisi as $teknisi)
                        <tr>
                            <th style="padding-top: 2.5rem;" scope="row">{{$loop->iteration}}</th>
                            <td style="padding-top: 2.5rem;"><a href="{{ route('teknisi.edit', $teknisi->id)}}">{{$teknisi->nama}}</a></td>
                            <td style="padding-top: 2.5rem;">{{$teknisi->telp}}</td>
                            <td style="padding-top: 2.5rem;">{{$teknisi->job}}</td>
                            <td><img src="{{$teknisi->foto}}" alt="foto" style="width: 5rem;height: 5rem;border-radius: 20%;object-fit: cover"></td>
                            <td style="padding-top: 2rem;" class="text-center">
                                <form action="{{ route('teknisi.destroy', $teknisi->id)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
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