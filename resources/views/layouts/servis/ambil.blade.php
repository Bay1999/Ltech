@extends('master')

@section('title', 'Barang Servis Diambil')

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Masukan Data Teknisi Baru</h6>    
        </div>
        <div class="card-body">
            <form class="needs-validation" action="{{ route('servis.masuk.diambil')}}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Nama Pengambil</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="nama" name="nama_pengambil" required>
                        <div class="invalid-feedback">
                            Nama pengambil masih kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Biaya</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Biaya" name="biaya" required>
                        <div class="invalid-feedback">
                            Biaya masih kosong.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom04">Part Yang Diganti</label>
                        <textarea name="part_diganti" placeholder="Part yang di ganti" class="form-control" cols="3" required></textarea>
                        <div class="invalid-feedback">
                            Part yang diganti masih kosong.
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_servis" value="{{$id_servis}}" required>
                
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