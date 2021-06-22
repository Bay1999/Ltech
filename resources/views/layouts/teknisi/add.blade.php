@extends('master')

@section('title', 'Data Teknisi')

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Masukan Data Teknisi Baru</h6>    
        </div>
        <div class="card-body">
            <form class="needs-validation" action="{{ route('teknisi.store')}}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Nama</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="nama" name="nama" required>
                        <div class="invalid-feedback">
                            Nama masih kosong.
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
                        <label for="validationCustom03">Job</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="job" name="job" required>
                        <div class="invalid-feedback">
                            Job teknisi masih kosong.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom04">Alamat</label>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="Alamat" name="alamat" required>
                        <div class="invalid-feedback">
                            Alamat teknisi masih kosong.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Pilih foto teknisi...</label>
                            <div class="invalid-feedback">Foto teknisi masih kosong</div>
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