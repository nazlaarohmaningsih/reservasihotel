<?=$this->extend('beranda');?>
<?=$this->section('konten');?>

<div class="card-deck mb-3 text-center">
<?php
	if(isset($listFasilitas)){
    	foreach($listFasilitas as $row){
	?>

	<div class="card mb-4 shadow-sm">
  	<div class="card-header bg-info">
    	<h4 class="my-0 font-weight-normal"><?=$row['nama_fasilitas_kamar'];?></h4>
  	</div>
  	<img src="<?=base_url('/uploads/'.$row['foto_fasilitas_kamar']);?>" class="card-img-top" style="height:250px">
  	<div class="card-body">
    	<p><?=$row['deskripsi_fasilitas_kamar'];?></p>
   	 
  	</div>
	</div>
<?php
	}
}
?>  

</div>

<?=$this->endSection();?>
