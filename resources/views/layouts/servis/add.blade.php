@extends('master')

@section('title', 'Servis Masuk')

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Masukan Data Teknisi Baru</h6>    
        </div>
        <div class="card-body">
            <form class="needs-validation" action="{{ route('servis.masuk.store')}}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Nama Barang</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="nama" name="nama" required>
                        <div class="invalid-feedback">
                            Nama masih kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="validationCustom02" name="tgl_masuk" required>
                        <div class="invalid-feedback">
                            Tanggal masuk masih kosong.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">No. Telp</label>
                        <input type="number" class="form-control" id="validationCustom02" placeholder="08******" name="telp" required>
                        <div class="invalid-feedback">
                            No. telpon masih kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Nama Customer</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="Nama Customer" name="nm_customer" required>
                        <div class="invalid-feedback">
                            Job teknisi masih kosong.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Keluhan</label>
                        <textarea name="keluhan" placeholder="Keluhan" class="form-control" cols="3" required></textarea>
                        <div class="invalid-feedback">
                            Keluhan masih kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Kelengkapan</label>
                        <textarea name="kelengkapan" placeholder="kelengkapan" class="form-control" cols="3" required></textarea>
                        <div class="invalid-feedback">
                            Kelengkapan masih kosong.
                        </div>
                    </div>
                </div>
                
                <button class="btn btn-primary" type="submit">Kirim</button>
            </form>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
        }, false);
    });
    }, false);
})();
</script>    
@endsection