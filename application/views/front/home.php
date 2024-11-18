<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.css">
<style type="text/css" media="screen">
    #panorama {
        width: 100%;
        height: 600px;
        position: relative;
        border-radius: 30px;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div id="panorama">
        </div>
    </div>
    <div class="col-md-12">
        <p class="description">
            <center>
                Pura Srijong merupakan salah satu Pura Luhur Kahyangan yang berada di pantai selatan Pulau Bali. Pura ini secara khusus merupakan
                suatu pura Dhang Kahyangan yang berada di sempadan pantai selatan antara kabupaten Tabanan dan Kabupaten Jembrana.
                Pura ini meliputi beberapa Pura: Pura Taman, Pura Pesanakan, Pura Melanting, Pura Penataran, Pura Beji, Pura Puseh
                serta Pura Sakenan. Dengan pura ini, setiap bulan, hari raya suci tertentu selalu diadakan upacara persembahyangan.
                Pura ini berdiri di atas tebing batu kali kapur keras yang menjorok ke laut sehingga pura ini sering juga disebut
                Pura Batu Klotok. Pada tanggal 20 Juli 2001 dari pihak dinas jawatan pekerjaan Umum dilaksanakan dharma wisata Pura ke Soka.
            </center>
        </p>
    </div>
    <div class="col-md-8">
        <a href="<?= site_url('tour') ?>" target="_blank" class="btn btn-primary btn-virtual-tour btn-block" title="">START VIRTUAL TOUR</a>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js"></script>
<script>
    var viewer = pannellum.viewer('panorama', <?= $config ?>);
</script>