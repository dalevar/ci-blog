	<!-- Banner -->

	<!-- End Banner -->

	<!-- Postingan -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-8 col-sm-8">
				<?php foreach ($postingan as $data) : ?>
					<div class="card shadow-sm mt-5 ">
						<div class="card-body">
							<h4><?= $data['nama'] ?></h4>
							<p><?= word_limiter($data['isi_postingan'], 20, '....')  ?>
							</p>
							<br>
							<a href="<?= base_url('blog/baca/' . $data['slug']) ?>">Baca Selegnkapnya</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 mt-5">
				<ul class="list-group">
					<a href="" class="list-group-item list-group-item-action active">
						Kategori Postingan
					</a>
					<?php foreach ($kategori as $data) : ?>
						<a href="<?= base_url('blog/kategori?filter=' . $data['nama_kategori']) ?>" class="list-group-item list-group-item-action"><?= $data['nama_kategori'] ?></a>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- End Postingan -->

	<!-- footer -->
	<footer class="text-muted text-center mt-5 mb-2">
		&copy2023
	</footer>
	<!-- end footer -->