<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>') ?>
	<!-- <?= $this->session->flashdata('msg'); ?> -->
	<!-- Filter Kategori -->
	<div class="row mb-3">
		<div class="col-md-3">
			<div class="form-group">
				<label for="kategori">Kategori:</label>
				<select class="form-control" id="kategori" name="kategori" onchange="location = this.value;">
					<option value="/pengaduan-masyarakat/Admin/TanggapanController/tanggapan_proses?jp=semua">Semua</option>
					<?php foreach ($kategori as $kategori) : ?>
						<option value="<?php echo '/pengaduan-masyarakat/Admin/TanggapanController/tanggapan_proses?jp=' . $kategori->jenis_pengaduan; ?>" <?php echo $data_filter == $kategori->jenis_pengaduan ? 'selected' : '' ?>><?php echo $kategori->jenis_pengaduan; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>

	<?php if (!empty($data_pengaduan)) : ?>

		<div class="row no-gutters">
			<?php foreach ($data_pengaduan as $dp) : ?>
				<div class="col-md-4">
					<div class="card shadow mb-4" style="width: 18rem;">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary"><?= $dp['nama'] ?></h6>
						</div>
						<img height="150" src="<?= base_url() ?>assets/uploads/<?= $dp['foto'] ?>" class="card-img-top">
						<div class="card-body">
							<span class="text-dark">Laporan :</span>
							<p><?= $dp['isi_laporan'] ?></p>
							<span class="text-dark">Telp :</span>
							<p><?= $dp['telp'] ?></p>
							<span class="text-dark">Tgl Pengaduan :</span>
							<p><?= $dp['tgl_pengaduan'] ?></p>
							<span class="text-dark">Kategori:</span>
							<p><?= $dp['jenis_pengaduan'] ?></p>
						</div>
						<div class="text-center mb-2">
							<div class="">

								<?= form_open('Admin/TanggapanController/tanggapan_pengaduan_selesai'); ?>
								<input type="hidden" name="id" value="<?= $dp['id_pengaduan'] ?>">
								<button class="btn btn-success" name="selesai">Selesai</button>
								<?= form_close(); ?>

							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	<?php else : ?>
		<div class="text-center">Belum Ada Pengaduan</div>
	<?php endif; ?>


</div>