@extends('master')

@section('title', 'Edit Data Sparepart')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Sparepart</h6>    
        </div>
        <div class="card-body">
            <form class="needs-validation" action="{{ route('sparepart.data.update', $sparepart->id)}}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Nama Barang</label>
                        <input type="text" class="form-control" name="nama" value="{{$sparepart->nama}}" required>
                        <div class="invalid-feedback">
                            Nama barang masih kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Jenis Part</label>
                        <input type="text" class="form-control" name="jenis" value="{{$sparepart->jenis}}" required>
                        <div class="invalid-feedback">
                            Jenis part masih kosong.
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