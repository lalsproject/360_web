<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Tour 360</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/tour/assets/style.css">
</head>
<body >
    <div id="panorama" onclick="resetMenuTimeout()"></div>
    <div id="fullscreenModal" class="modal fade fullscreen-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-white">Image</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Hotspot Image">
                    <div id="modalCaption" class="caption"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="menu" class="collapsed" >
        <div id="menu-toggle" onclick="toggleMenu()">Menu</div>
        <div class="group">
            <div class="group-title" onclick="toggleGroup(this)">View</div>
            <ul class="list-group">

                <?php foreach ($scene as $s){ ?>
                    <li class="list-group-item bg-dark"><a href="#" onclick="switchScene('<?= encrypt_url($s->id_scane) ?>')"><?= $s->title ?></a></li>
                <?php } ?>
                <li class="list-group-item bg-dark"><a href="<?= site_url('home') ?>">Keluar</a></li>
            </ul>
        </div>
    </div>
    <div style="display: none;" id="htmlContent">
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script> -->
    <script>
        
        
        var viewer = pannellum.viewer('panorama', <?= $config ?>);

        function openModal(event, args) {
            document.getElementById('modalImage').src = args.imgSrc;
            document.getElementById('modalCaption').innerText = args.caption;
            $('#fullscreenModal').modal('show');
        }

        function closeModal() {
            $('#fullscreenModal').modal('hide');
        }

        function switchScene(sceneId) {
            viewer.loadScene(sceneId);
        }

        function toggleMenu() {
            var menu = document.getElementById('menu');
            menu.classList.toggle('collapsed');
        }

       

        function toggleGroup(element) {
        }

        // Auto-hide menu after a period of inactivity
        var menuTimeout;
        function resetMenuTimeout() {
            clearTimeout(menuTimeout);
            document.getElementById('menu').classList.remove('hidden');
            menuTimeout = setTimeout(function() {
                document.getElementById('menu').classList.add('hidden');
            }, 1000); // Hide menu after 5 seconds of inactivity
        }

        /* Get the documentElement (<html>) to display the page in fullscreen */
        var elem = document.documentElement;

        /* View in fullscreen */
        function openFullscreen() {
          if (elem.requestFullscreen) {
            elem.requestFullscreen();
          } else if (elem.webkitRequestFullscreen) { /* Safari */
            elem.webkitRequestFullscreen();
          } else if (elem.msRequestFullscreen) { /* IE11 */
            elem.msRequestFullscreen();
          }
        }

        /* Close fullscreen */
        function closeFullscreen() {
          if (document.exitFullscreen) {
            document.exitFullscreen();
          } else if (document.webkitExitFullscreen) { /* Safari */
            document.webkitExitFullscreen();
          } else if (document.msExitFullscreen) { /* IE11 */
            document.msExitFullscreen();
          }
        }
        window.onload = function() {
            resetMenuTimeout();
            toggleMenu();
            // openFullscreen();
        }
    </script>
</body>
</html>
