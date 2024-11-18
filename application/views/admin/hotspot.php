<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.css">
<style type="text/css" media="screen">
	#panorama {
        width: 100%;
        height: 600px;
        position: relative;
    }
	#add-hotspot {
	    position: absolute;
	    top: 10px;
	    right: 10px;
	    z-index: 1000;
	    padding: 10px;
	    background: white;
	    border: 1px solid #ccc;
	    cursor: pointer;
	}
	#marker {
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    width: 30px;
	    height: 30px;
	    background-size : contain !important;
	    background: url(<?= base_url().'assets/tour/assets/'; ?>marker.png);
	    border-radius: 50%;
	    transform: translate(-50%, -50%);
	    z-index: 1001;
	    pointer-events: none; /* Prevent marker from interfering with clicks */
	}
</style>
<div class="col-md-4">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-primary">
				<strong>Tambah Data Hotspot</strong>
			</div>
			<form action="<?= site_url('simpan_hotspot') ?>" id="frm_simpan" method="post" accept-charset="utf-8">
				<div class="card-body">
					<div class="form-group row align-items-center">
						<label for="gudang" class="col-sm-3 col-form-label">Title</label>
						<div class="col-sm-9">
							<input type="text" required class="form-control" name="title" id="title">
						</div>
					</div>
					<div class="form-group row align-items-center">
						<label for="gudang" class="col-sm-3 col-form-label">From</label>
						<div class="col-sm-9">
							<select name="in" id="in" onchange="switchScene($(this).val())" class="sl2 form-control" required>
								<option value="">Pilih</option>
								<?php foreach ($scene as $s){ ?>
									<option value="<?= encrypt_url($s->id_scane) ?>"><?= $s->title ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row align-items-center">
						<label for="gudang" class="col-sm-3 col-form-label">Yaw</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" required readonly="" id="yaw" name="yaw">
						</div>
					</div>
					<div class="form-group row align-items-center">
						<label for="gudang" class="col-sm-3 col-form-label">Pitch</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" required readonly="" id="pitch" name="pitch">
						</div>
					</div>
					<div class="form-group row align-items-center">
						<label for="gudang" class="col-sm-3 col-form-label">To</label>
						<div class="col-sm-9">
							<select name="to" class="sl2 form-control" required>
								<option value="">Pilih</option>
								<?php foreach ($scene as $s){ ?>
									<option value="<?= encrypt_url($s->id_scane) ?>"><?= $s->title ?></option>
								<?php } ?>
							</select>
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
				<strong>Hotspot</strong>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped dt" style="width: 100%;">
					<thead>
						<tr>
							<th><center>From</center></th>
							<th><center>To</center></th>
							<th><center>Title</center></th>
							<th ><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
						<?php if ($hotspot != null){ ?>
							<?php foreach ($hotspot as $h){ ?>
								<tr>
									<td><?= $h->title_in ?></td>
									<td><?= $h->title_to ?></td>
									<td><?= $h->title ?></td>
									<td>
										<center>
											<a href="<?= site_url('hapus_hotspot/'.encrypt_url($h->id_hotspot)) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
			<div id="marker"></div> <!-- Marker element -->
    		<!-- <button id="add-hotspot">Add Hotspot</button> -->
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js"></script>

<script>
	var viewer = pannellum.viewer('panorama',<?= $config ?>);
	document.getElementById('panorama').addEventListener('mousedown', get_loc);
	$("#in").val(viewer.getConfig().scene).change();

	function get_loc() {
        var pitch = viewer.getPitch();
        var yaw = viewer.getYaw();
        $('#yaw').val(yaw.toFixed(2));
        $('#pitch').val(pitch.toFixed(2));
       
    }

    function switchScene(sceneId) {
    	if (sceneId != '')
    	{
        	viewer.loadScene(sceneId);
    	}
    }

	viewer.on('scenechange', function (){
		$("#in").val(viewer.getConfig().scene).change();
		console.log(viewer.getConfig().title)
	});
    
	
</script>