<?=$this->extend('admin/dashboard');?>
<!-- area putih halaman dashboard-->
<?=$this->section('konten');?>

<h2><?=$JudulHalaman;?></h2>
<?=$introText;?>

<p>
   <a href="<?=site_url('/tambah-fasilitas-kamar');?>" class="btn btn-success font-weight-bold">Tambah Fasilitas</a>
</p>
<?=session()->getFlashData('info');?>

<div class="row">
	<?php
if(isset($listFasilitas)){
	foreach($listFasilitas as $row){ ?>
 
<div class="col-md-3">
	<div class="card" style="min-height:400px">
	<img src="<?=base_url('/uploads/'.$row['foto_fasilitas_kamar']);?>" class="card-img-top" style="height:170px">
	<div class="card-body">
    	<h5 class="card-title"><?=$row['nama_fasilitas_kamar'];?></h5>
    	<p class="card-text small" style="min-height:70px"><?=$row['deskripsi_fasilitas_kamar'];?>.</p>
    	<a href="<?=site_url('/edit-fasilitas-kamar/'.$row['id_fasilitas_kamar']);?>" class="btn btn-primary btn-block btn-sm">Edit</a>
    	<a href="<?=site_url('/hapus-fasilitas-kamar/'.$row['id_fasilitas_kamar']);?>" class="btn btn-danger btn-block btn-sm">Hapus</a>
	</div>
	</div>
</div>
 
 
 
<?php
	}
}
?>

<?=$this->endSection();?>
