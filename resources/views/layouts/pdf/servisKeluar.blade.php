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
    <div style="width:21cm;height:14cm;border:1px solid #000000">
        <div style="padding-top:15px;padding-left:15px;padding-right:15px">
            <div class="d-flex mb-4">
                <div class="mr-3">
                    <img src="{{asset($servis->qrcode)}}" alt="foto" style="width: 4rem;height: 4rem;">
                </div>
                <div>
                    {{-- <p style="font-size: 10px;margin-bottom:5px">Tgl {{$servis->tgl_masuk}}</p> --}}
                    <b style="font-size: 14px">L-TECH COMPUTINDO</b>
                    <p style="font-size: 12px; margin:0px">Servis Laptop PC, Printer & CCTV</p>
                    <p style="font-size: 12px; margin:0px">Jl. Kombespol M. Duryat No. 80 Jetis Lamongan Telp/WA. 08124249979</p>
                    {{-- <p style="font-size: 10px; margin-bottom:5px">Kepada : <b style="font-size: 12px">{{$servis->nama_customer}}</b></p> --}}
                </div>
                <div class="ml-auto">
                    <b>Nota Servis</b>
                </div>
            </div>
            
            <div>
                <p style="font-size: 12px; margin:0px">Nama : {{$servis->nama_customer}}</p>
                <p style="font-size: 12px; margin:0px">Telp : {{$servis->telp}}</p>
                <p style="font-size: 12px; margin:0px">Servis : {{$servis->tgl_masuk}}</p>
            </div>

            <div class="table-responsive mt-3" style="font-size: 12px">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Part yang diganti</th>
                        <th scope="col">Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr style="height: 8rem">
                            <td>{{$servis->nama_barang}}</td>
                            <td>{{$servis->part_diganti}}</td>
                            <td>Rp {{number_format($servis->biaya,0,',','.')}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-right">Total</td>
                            <td>Rp {{number_format($servis->biaya,0,',','.')}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @php
                $dateNow = Carbon\Carbon::now()->format('d M Y')
            @endphp
            <div class="float-right mr-2">
                <p style="font-size: 12px">Lamongan, {{$dateNow}}</p>
                <p style="font-size: 12px" class="mt-5">...............................................</p>
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
