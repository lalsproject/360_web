<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.css">
<style type="text/css" media="screen">
	#panorama {
        width: 100%;
        height: 600px;
        position: relative;
    }
</style>
<div class="col-md-4">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-primary">
				<strong>Tambah Data Scene</strong>
			</div>
			<form action="<?= site_url('simpan_scane') ?>" id="frm_simpan" method="post" accept-charset="utf-8">
				<div class="card-body">
					<div class="form-group row align-items-center">
						<label for="gudang" class="col-sm-3 col-form-label">Title</label>
						<div class="col-sm-9">
							<input type="text" required class="form-control" name="title" id="title">
						</div>
					</div>
					<div class="form-group row align-items-center">
						<label for="gudang" class="col-sm-3 col-form-label">Foto</label>
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
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-primary">
				<strong>Scene</strong>
			</div>
			<div class="card-body">
				<table class="table table-bordered dt" style="width: 100%;">
					<thead>
						<tr>
							<th><center>Title</center></th>
							<th width="40%"><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
						<?php if ($scene != null){ ?>
							<?php foreach ($scene as $s){ ?>
								<tr>
									<td><?= $s->title ?></td>
									<td>
										<center>
											<button type="button" class="btn btn-success" onclick="view('<?= base_url().'assets/tour/assets/'.$s->panorama.'?'.date('YmdHis') ?>')"><i class="fa fa-eye"></i></button>
											<a href="<?= site_url('hapus_scene/'.encrypt_url($s->id_scane)) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
										</center>
									</td>
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="col-md-8">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-primary">
				Preview
			</div>
			<div class="card-body" id="panorama">
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js"></script>

<script>
	function view(arg)
	{
		$('#panorama').html('');
		pannellum.viewer('panorama', {
	        "type": "equirectangular",
	        "panorama": arg,
	        "autoLoad": true,
	        "showFullscreenCtrl" : false,
	         "autoRotate": -2,
	        "hotSpots": []
	    })
	}
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