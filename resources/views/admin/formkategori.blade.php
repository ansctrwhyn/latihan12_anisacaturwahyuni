<h3>Form Tambah produk</h3>
<div class="form">
    <form action="" method="POST" enctype="multipart/form-data" class="mt-5">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="nama" value="" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori Produk</label>
            <input type="text" class="form-control" name="kategori" value="" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Produk</label>
            <input type="number" class="form-control" name="harga" value="" required>
        </div>
    </form>
</div>