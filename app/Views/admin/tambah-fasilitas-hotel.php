<!-- memanggil isi file dashboard.php di folder view\admin -->
<?=$this->extend('admin/dashboard');?>
<!-- area putih halaman dashboard-->
<?=$this->section('konten');?>

<h2><?=$JudulHalaman;?></h2>
<?=$introText;?>

<form method="post" action="<?=site_url('tambah-fasilitas-hotel');?>"enctype="multipart/form-data">

<div class="form-group">
    <label class="font-weight-bold"> Nama Fasilitas </label>
    <input type="text" name="txtNamaFasilitas" class="form-control"/>
</div>

<div class="form-group">
    <label class="font-weight-bold"> Deskripsi Fasilitas </label>
    <textarea class="form-control" name="txtDeskrisiFasilitas" rows="5"></textarea>
</div>

<div class="form-group">
    <label class="font-weight-bold"> Foto Fasilitas </label>
    <input type="file" name="txtFotoFasilitas" class="form-control"/>
</div>

<div class="form-group">
	<a href="javascript:history.back()" class="btn btn-warning btn-sm font-weight-bold">Batal</a>

	<button type="submit" class="btn btn-primary btn-sm font-weight-bold">Simpan</button>
</div>

</form>

<?=$this->endSection();?>