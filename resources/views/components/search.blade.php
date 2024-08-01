<form action="?" method="get" class="form-inline ml-auto">
    <div class="input-group ml-auto">
        <input type="text" name="search" value="<?php request()->search ?>" class="form-control" placeholder="Cari.....">
        <div class="input-group-append">
            <button class="btn btn-light border" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>