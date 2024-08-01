@props(['action','upload'=>false])
<form action="{{ $action }}" method="post" class="card card-primary "<?= $upload ? 'enctype="multipart/form-data"' : '' ?>>
    @csrf
    <div class="card-header">
        <i class="fas fa-plus-circle"></i> Tambah
    </div>
    <div class="card-body">
        <?= $slot ?>
    </div>
    <div class="card-footer text-right d-flex justify-content-center">
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-database"></i> simpan
        </button>
    </div>
</form>