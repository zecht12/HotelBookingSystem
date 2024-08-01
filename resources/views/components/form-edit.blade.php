@props(['action','header'=>true,'upload'=>false])
<form action="{{ $action }}" method="POST" class="card card-primary"<?= $upload ? 'enctype="multipart/form-data"' : '' ?>>
    @if ($header)
        <div class="card-header">
            <i class="fas fa-edit"></i> Edit
        </div>
    @endif
    @method('PUT')
    @csrf
    <div class="card-body">
        <?= $slot ?>
    </div>
    <div class="card-footer text-right d-flex justify-content-center">
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-database"></i> Update
        </button>
    </div>
</form>