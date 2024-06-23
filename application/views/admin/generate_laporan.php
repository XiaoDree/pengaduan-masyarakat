<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row mb-3">
		<div class="col-md-3">
			<div class="form-group">
				<label for="kategori">Kategori:</label>
				<select class="form-control" id="kategori" name="kategori" onchange="location = this.value;">
					<option value="/pengaduan-masyarakat/Admin/LaporanController?jp=semua">Semua</option>
					<?php foreach ($kategori as $kategori) : ?>
						<option value="<?php echo '/pengaduan-masyarakat/Admin/LaporanController?jp=' . $kategori->jenis_pengaduan; ?>" <?php echo $data_filter == $kategori->jenis_pengaduan ? 'selected' : '' ?>><?php echo $kategori->jenis_pengaduan; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>

	<?php if ($laporan) : ?>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">Kategori</th>
					<th scope="col">Laporan</th>
					<th scope="col">Tgl Pengaduan</th>
					<th scope="col">Status</th>
					<th scope="col">Tanggapan</th>
					<th scope="col">Tgl Tanggapan</th>
				</tr>
			</thead>
			<tbody>

				<?php $no = 1; ?>
				<?php foreach ($laporan as $l) : ?>
					<tr>
						<td scope="row"><?= $no++; ?></td>
						<td><?= $l['nama'] ?></td>
						<td><?= $l['jenis_pengaduan'] ?></td>
						<td><?= $l['isi_laporan'] ?></td>
						<td><?= $l['tgl_pengaduan'] ?></td>
						<td>
							<?php
							if ($l['status'] == '0') :
								echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
							elseif ($l['status'] == 'proses') :
								echo '<span class="badge badge-primary">Sedang di proses</span>';
							elseif ($l['status'] == 'selesai') :
								echo '<span class="badge badge-success">Selesai di kerjakan</span>';
							elseif ($l['status'] == 'tolak') :
								echo '<span class="badge badge-danger">Pengaduan ditolak</span>';
							else :
								echo '-';
							endif;
							?>
						</td>

						</td>
						<td><?= $l['tanggapan'] == null ? '-' : $l['tanggapan']; ?></td>
						<td><?= $l['tgl_tanggapan'] == null ? '-' : $l['tgl_tanggapan']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<a target="_blank" href="<?= base_url('Admin/LaporanController/generate_laporan') ?>" class="btn btn-primary mt-2">Preview or Download</a>

	<?php else : ?>
		<p class="text-center">Belum ada data</p>
	<?php endif; ?>
</div>
<!-- /.container-fluid -->