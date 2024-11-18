<div class="col-md-4">
	<div class="card">
		<div class="card-header bg-primary">
			<strong>Tambah Data Galery</strong>
		</div>
		<form action="<?= site_url('simpan_galery') ?>" id="frm_simpan" method="post" accept-charset="utf-8">
			<div class="card-body">
				<div class="form-group row align-items-center">
					<label for="Title" class="col-sm-3 col-form-label">Title</label>
					<div class="col-sm-9">
						<input type="text" required class="form-control" name="title" id="title">
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label for="Foto" class="col-sm-3 col-form-label">Foto</label>
					<div class="col-sm-9">
						<input type="file" name="foto_new" required value="" placeholder="">
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>
<div class="col-md-8">
	<div class="card">
		<div class="card-header bg-primary">
			<strong>Data Galery</strong>
		</div>
		<div class="card-body">
			<div class="container mt-1">
		        <div class="row">
		        	<?php if ($galery != null){ ?>
		        		<?php foreach ($galery as $g){ ?>
				            <div class="col-12 col-md-6 col-lg-4 mb-4">
				                <div class="card">
				                    <img src="<?= base_url() ?>assets/tour/assets/<?= $g->foto ?>" class="card-img-top" alt="Pemandangan Alam">
				                    <div class="card-body">
				                    	<center>
				                        	<h5 class="card-title"><?= $g->title ?></h5>
				                    	</center>
				                    </div>
				                    <div class="card-footer" style="">
				                    	<a href="<?= site_url('hapus_galery/'.encrypt_url($g->id_foto)) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
				                    	<button type="button" class="btn btn-success" data-fancybox data-src="<?= base_url() ?>assets/tour/assets/<?= $g->foto ?>"><i class="fa fa-image"></i> Lihat</button>
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
		</div>
	</div>
</div>
<script>
	function insertAfterHome(referenceNode, newNode) {
	  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
	}
	document.querySelectorAll("input[name='foto_new']").forEach((inputEl) => {
		inputEl.setAttribute("onchange","compressImage(this,'#"+inputEl.name+"')")
		inputEl.setAttribute("accept","image/*")
		var new_hidden = document.createElement('input');
		new_hidden.setAttribute('name',inputEl.name);
		new_hidden.setAttribute('id',inputEl.name);
		new_hidden.setAttribute('type','hidden');
		insertAfterHome(inputEl, new_hidden);
	});
</script>