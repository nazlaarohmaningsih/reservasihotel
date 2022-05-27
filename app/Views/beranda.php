<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<title>Pemesanan Hotel</title>

	<!-- Bootstrap core CSS -->
    <link href="/bootstrap461/css/bootstrap.min.css" rel="stylesheet">

	<style>
    .bd-placeholder-img {
    	font-size: 1.125rem;
    	text-anchor: middle;
    	-webkit-user-select: none;
    	-moz-user-select: none;
    	-ms-user-select: none;
    	user-select: none;
    }

    @media (min-width: 768px) {
    	.bd-placeholder-img-lg {
      	font-size: 3.5rem;
    	}
    }
    
    html {
	  font-size: 14px;
    }
    
    @media (min-width: 768px) {
    html {
   	 font-size: 16px;
    }
    }

    .container {
    max-width: 960px;
    }

    .pricing-header {
    max-width: 700px;
    }

    .card-deck .card {
    min-width: 220px;
    }

	</style>
  </head>

  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-lg">
    <h5 class="my-0 mr-md-auto font-weight-normal text-white">Grand HotelLa</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-white" href="<?=site_url();?>">Beranda</a>
        <a class="p-2 text-white" href="<?=site_url('/fasilitashotel');?>">Fasilitas Hotel</a>
        <a class="p-2 text-white" href="<?=site_url('/fasilitaskamar');?>">Fasilitas Kamar</a>
    </nav>
    <form class="form-inline mt-2 mt-md-0" method="POST" action="<?=site_url('/hasil-cari');?>">
        <div class="input-group">
        <input type="text" name="txtKataKunci" class="form-control" placeholder="Nama" required>
        <div class="input-group-append">
        <button class="input-group-text" type="submit">Cari Invoice</button>
        </div>
        </div>  
    </form>
    </div>
    <?php if(!isset($JudulHalaman))  {?>   
        <img src="<?=base_url('/uploads/hotel.jpg');?>" style="width:100%; height: 500px;">     
     <?php }?>   
    
	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 "><?=isset($JudulHalaman) ? $JudulHalaman : 'Pilihan Kami Untukmu' ;?></h1>
 
	<p class="lead"><?=isset($introText) ? $introText : 'Beberapa akomodasi yang kamu pasti suka.';?></p>
  	</div>

    <div class="container"> 

        <?php
    if(isset($JudulHalaman)){
        
        $this->renderSection('konten');
    } else{

        echo '<div class="card-deck mb-3 text-center">';

        if(isset($listKamar)){
            foreach($listKamar as $row) { ?>
        
        <div class="card mb-4 shadow-sm">
        <div class="card-header bg-info">
            <h4 class="my-0 font-weight-normal"><?=ucwords($row['tipe_kamar']);?></h4>
        </div>
        <img src="<?=base_url('/uploads/'.$row['foto_kamar']);?>" class="card-img-top" style="height:250px">

        <div class="card-body">
            <h1 class="card-title pricing-card-title">Rp <?=number_format($row['harga_kamar'],0,',','.');?> <small class="text-muted">/ mlm</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
            <li><?=$row['jml_kamar'];?> Kamar Tersedia</li>
            <li><b>Fasilitas Kamar</b> <br/>    
                <?php
                        $fasilitas=listFasilitasKamar($row['id_kamar']);
                        if(isset($fasilitas)){
                            foreach($fasilitas as $rowFasilitas){
                                echo '<div class="badge badge-primary mr-1">
                                '.$rowFasilitas['nama_fasilitas_kamar'].'</div>';
                            }
                        }
                ?>
                <li>
            </ul>
            <a href="<?=site_url('/order/'.$row['id_kamar']);?>" class="btn btn-sm btn-block btn-outline-success">Order Kamar</a>
        </div>
        </div>
        
        <?php
        }
        
        echo '</div>';

        }
    }
        ?>   	 

    </div>

  </body>
</html>
