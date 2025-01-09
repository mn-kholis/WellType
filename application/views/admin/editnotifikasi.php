<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" Game="width=device-width, initial-scale=1">
    <title>WellType</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  </head>
  <body>
<div class="container mt-5">
	<h5 class="mt-5">Edit Notifikasi</h5>

	<form method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label>Jenis Notifikasi</label>
			<input type="text" name="jenis_notifikasi" class="form-control" value="<?php echo set_value("jenis_notifikasi", $notifikasi->jenis_notifikasi) ?>">
				<?php echo form_error("jenis_notifikasi") ?>
			</span>
		</div>
		<div class="mb-3">
			<label>Notifikasi</label>
			<textarea class="form-control" id="editorku" name="isi_notifikasi"><?php echo set_value("isi_notifikasi", $notifikasi->isi_notifikasi) ?></textarea>
			<span class="small text-danger">
				<?php echo form_error("isi_notifikasi") ?>
			</span>
		</div>
		<div class="mb-3">
			<label>Frekuensi</label>
			<input type="text" name="frekuensi" class="form-control" value="<?php echo set_value("frekuensi", $notifikasi->frekuensi) ?>">
				<?php echo form_error("frekuensi") ?>
			</span>
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>

<div class="bg-light text-center">
	<div class="">Copyright &copy; 2024. Amikom</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
<script>new DataTable("#tabelku")</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if ($this->session->flashdata('pesan_sukses')): ?>
<script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success");</script>
<?php endif ?>

<?php if ($this->session->flashdata('pesan_gagal')): ?>
<script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error");</script>
<?php endif ?>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>CKEDITOR.replace("editorku")</script>

</body>
</html>