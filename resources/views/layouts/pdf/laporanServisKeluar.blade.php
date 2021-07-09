<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<body>
    <div>
        <div style="padding:3rem">
            <div class="d-flex mb-4">
                <div class="m-auto">
                    <h4>Laporan Servis Masuk Bulan Ini</h4>
                </div>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Nama Pengambil</th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Biaya</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $data)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$data->invoice}}</td>
                            <td>{{$data->nama_barang}}</td>
                            <td>{{$data->nama_pengambil}}</td>
                            <td>{{$data->tgl_keluar}}</td>
                            <td>{{$data->biaya}}</td>
                        </tr>
                        @empty
                        <td colspan="7" class="text-center alert alert-danger alert-dismissible fade show" role="alert">
                            Data Servis Masih Kosong
                            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> --}}
                        </td>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js')}}"></script>
</html>
