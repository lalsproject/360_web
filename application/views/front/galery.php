<div class="col-md-12">
	<strong><h3>Data Galery</h3></strong>
	<div class="row">
	<?php if ($galery != null){ ?>
		<?php foreach ($galery as $g){ ?>
	        <div class="col-12 col-md-6 col-lg-4 mb-4">
	            <div class="card" style="border-radius: 20px;border: 1px solid rgba(0,0,0,.125);">
	                <a href="#" data-fancybox data-src="<?= base_url() ?>assets/tour/assets/<?= $g->foto ?>">
	                	<img src="<?= base_url() ?>assets/tour/assets/<?= $g->foto ?>" style="border-radius: 20px;" class="card-img-top" alt="Pemandangan Alam">
	                </a>
	                <div class="card-body">
	                	<center>
	                    	<h5 class="card-title"><?= $g->title ?></h5>
	                	</center>
	                </div>
	            </div>
	        </div>
		<?php } ?>
	<?php }else{ ?>
		<div class="col-12">
			<center>
				<h4>Belum Ada Data Galery</h4>
			</center>
		</div>
	<?php } ?>

	</div>
</div>