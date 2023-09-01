<div class="col-lg-12 col-md-12 col-sm-12">
	<a href="<?= base_url('kategori') ?>" class="btn btn-secondary btn-sm mb-2"><i class="fas fa-fw fa-arrow-left"></i>Back</a>

	<form action="<?= base_url('kategori/simpan_ubah') ?>" method="post">
		<div class="form-group">
			<label for="nama_kategori">Nama Kategori</label>
			<input type="hidden" name="id" value="<?= $kategori['id'] ?>">
			<input type="text" class="form-control col-sm-6" name="nama_kategori" value="<?= $kategori['nama_kategori']; ?>">
		</div>
		<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
	</form>
</div>
</div>
</div>
