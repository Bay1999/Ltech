<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table {
            margin: 0 auto;
        }

        /* Default Table Style */
        table {
            color: #333;
            background: white;
            border: 1px solid grey;
            font-size: 12pt;
            border-collapse: collapse;
        }
        table thead th,
        table tfoot th {
            color: #777;
            background: rgba(0,0,0,.1);
        }
        table caption {
            padding:.5em;
        }
        table th,
        table td {
            padding: .5em;
            border: 1px solid lightgrey;
        }
        /* Zebra Table Style */
        [data-table-theme*=zebra] tbody tr:nth-of-type(odd) {
            background: rgba(0,0,0,.05);
        }
        [data-table-theme*=zebra][data-table-theme*=dark] tbody tr:nth-of-type(odd) {
            background: rgba(255,255,255,.05);
        }
        /* Dark Style */
        [data-table-theme*=dark] {
            color: #ddd;
            background: #333;
            font-size: 12pt;
            border-collapse: collapse;  
        }
        [data-table-theme*=dark] thead th,
        [data-table-theme*=dark] tfoot th {
            color: #aaa;
            background: rgba(0255,255,255,.15);
        }
        [data-table-theme*=dark] caption {
            padding:.5em;
        }
        [data-table-theme*=dark] th,
        [data-table-theme*=dark] td {
            padding: .5em;
            border: 1px solid grey;
        }
    </style>

</head>
<body style="font-family: 'Times New Roman', Times, serif">
    <div style="width:21cm;height:14cm;border:1px solid #000000">
        <div style="padding-top:15px;padding-left:15px;padding-right:15px">
            <div>
                <div class="col">
                    <p style="font-size: 10px;margin-bottom:5px">Tgl {{$servis->tgl_masuk}}</p>
                    <b style="font-size: 12px">L-TECH COMPUTINDO</b>
                    <p style="font-size: 10px">Lamongan</p>
                    <p style="font-size: 10px; margin-bottom:5px">Kepada : <b style="font-size: 12px">{{$servis->nama_customer}}</b></p>
                </div>
                <div style="position: absolute; right:50rem; top:1.5rem">
                    <img src="{{$src}}" alt="foto" style="width: 5rem;height: 5rem;">
                </div>
            </div>
            <div class="row mt-2">
                <table style="width: 100%">
                    <thead>
                    <tr>
                        <th style="font-size: 12px;width:33%"><b>Nama Barang</b></th>
                        <th style="font-size: 12px;width:33%"><b>Keluhan</b></th>
                        <th style="font-size: 12px;width:33%"><b>Kelengkapan</b></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr style="text-align: center">
                            <td style="font-size: 12px">{{$servis->nama_barang}}</td>
                            <td style="font-size: 12px">{{$servis->keluhan}}</td>
                            <td style="font-size: 12px">{{$servis->kelengkapan}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
