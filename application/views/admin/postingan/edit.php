<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<div class="container col-sm">
	<a href="<?= base_url('postingan') ?>" class="btn btn-secondary btn-sm mb-2"><i class="fas fa-fw fa-arrow-left"></i>Back</a>

	<div class="card col-sm-8">
		<div class="card-body">
			<form action="<?= base_url('postingan/update') ?>" method="post">
				<div class="form-group ">
					<label for="">Nama Postingan</label>
					<input type="hidden" name="id" value="<?= $postingan['id']; ?>">
					<input type="text" name="nama_postingan" class="form-control " value="<?= $postingan['nama'] ?>">

				</div>
				<div class="form-group">
					<label for="">Kategori Postingan</label>
					<select name="id_kategori" class="form-control ">
						<?php foreach ($kategori as $data) : ?>
							<option value="<?= $data['id'] ?>" <?= ($data['id'] == $postingan['id_kategori']) ? 'selected' : '' ?>><?= $data['nama_kategori'] ?></option>
						<?php endforeach; ?>
					</select>

				</div>
				<div class="form-group">
					<label for="">Isi Postingan</label>
					<textarea type="text" name="isi_postingan" class="form-control " id="isi_postingan"><?= $postingan['isi_postingan']; ?></textarea>

				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
</div>
</div>
</div>

<script>
	ClassicEditor
		.create(document.querySelector('#isi_postingan'))
		.then(editor => {
			console.log(editor);
		})
		.catch(error => {
			console.error(error);
		});
</script>
