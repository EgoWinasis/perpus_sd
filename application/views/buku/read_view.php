<html>

<head>
    <title>Sistem Informasi Perpustakaan Kampus Mengajar 5 </title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets_style/image/km5getaskerep.jpg'); ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/dist/css/read_digital.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>

<body>
    <section class="layout">
        <div class="header">


            <div class="logo">
                <img src="<?php echo base_url(); ?>assets_style/image/bookcase/logo.png" alt="logo">
            </div>

            <div class="pull-right info">
                <i class="fa info_icon fa-info-circle fa-2x"></i>
            </div>




        </div>
        <div class="main">
            <!-- Previous Button -->
            <button id="prev-btn">
                <i class="fa arrow_book fa-arrow-left fa-4x"></i>
            </button>


            <!-- Book -->
            <div id="book" class="book">
                <!-- Paper 1 -->
                <?php $pages =  ($buku[0]['total_hal']) / 2  ?>
                <input type="hidden" class="total_hal" value="<?= $buku[0]['total_hal'] ?>">
                <?php for ($i = 1; $i <= $pages; $i++) : ?>
                    <div id="p<?= $i ?>" class="paper" style="z-index: <?= $pages - $i ?>;">

                        <?php
                        if ($i == 1) {
                            $img1 = 1;
                            $img2 = 2;
                        } else {
                            $img1 += 2;
                            $img2 += 2;
                        }

                        ?>
                        <div class="front">
                            <div id="f<?= $i ?>" class="front-content">
                                <img class="img-content " src="<?php echo base_url(); ?>assets_style/image/buku/lampiran/<?= $buku[0]['lampiran'] ?>/<?= $img1 ?>.png" alt="">
                            </div>
                        </div>
                        <div class="back">
                            <div id="b<?= $i ?>" class="back-content">
                                <img class="img-content " src="<?php echo base_url(); ?>assets_style/image/buku/lampiran/<?= $buku[0]['lampiran'] ?>/<?= $img2 ?>.png" alt="">
                            </div>
                        </div>
                    </div>
                <?php endfor ?>

            </div>


            <!-- Next Button -->
            <button id="next-btn">
                <i class="fa arrow_book fa-arrow-right fa-4x"></i>
            </button>
        </div>
        <div class="footer">
            <i class="footer-btn arrow_back fa fa-arrow-left fa-lg"></i>
            <i class="footer-btn zoom_in  fa fa-search-plus fa-lg"></i>
            <i class="footer-btn zoom_out fa fa-search-minus fa-lg"></i>
            <i class="footer-btn full fa fa-arrows-alt fa-lg "></i>
            <i class="footer-btn minimize fa fa-desktop fa-lg hide"></i>
        </div>
    </section>
    <script src="<?php echo base_url('assets_style/assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_style/assets/dist/js/flip.js'); ?>"></script>
    <script>
        $('.arrow_back').click(function() {
            window.history.go(-1);
            return false;
        })

        // full screen event
        $('.full').click(function() {
            var elem = document.documentElement;
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) {
                /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                /* IE11 */
                elem.msRequestFullscreen();
            }

            $(".full").addClass('hide');
            $(".minimize").removeClass('hide');
        });
        // minimize
        $('.minimize').click(function() {
            var elem = document.documentElement;
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                /* Safari */
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                /* IE11 */
                document.msExitFullscreen();
            }

            $(".minimize").addClass('hide');
            $(".full").removeClass('hide');
        });

        $(document).keydown(function(e) {
            var elem = document.documentElement;
            if (e.which == 122 && elem.requestFullscreen) {

                $(".full").addClass('hide');
                $(".minimize").removeClass('hide');
            }
        });

        // zoom

        $('.zoom_in').click(function() {
            $('.main').css('zoom', '130%')
        });
        $('.zoom_out').click(function() {
            $('.main').css('zoom', '100%')
        });

        // as
        let buku = <?= json_encode($buku); ?>;

        let kode_buku = buku[0]['kode_buku'];
        let isbn = buku[0]['isbn'];
        let judul = buku[0]['title'];
        let pengarang = buku[0]['pengarang'];
        let penerbit = buku[0]['penerbit'];
        let thn_buku = buku[0]['thn_buku'];
        let base_url = "<?= base_url(); ?>";
        let lampiran = buku[0]['lampiran'];
        let url_sampul = base_url + "assets_style/image/buku/lampiran/" + lampiran + "/1.png";
        let tgl_masuk = buku[0]['tgl_masuk'];
        $('.info_icon').click(function() {

            $(".main").after(`
            <div class="light-box-out">
            <div class="light-box-bg"></div>
            <div class="light-box sh5-table">
                <div class="sh5-table-centered">
                    <div class="light-box-content" style="width: 485px;">
                        <div class="light-box-title">Book Info<div class="light-box-cancel-btn" title="Close" >x</div>
                        </div>
                        <div class="light-box-panel">
                            <div class="book-detail-content" style="min-height: 160px;">
                                <div class="book-detail-book" style="width: 130px; height: 130px;"><img class="book-detail-shelf" src="${base_url}/assets_style/image/bookcase/shelf.png">
                                    <div class="book-wrapper" data-index="65099627" data-id="0" title="Rumah Wortel" style="width: 130px; height: 130px; left: -2px; top: 0px; touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                        <div class="book-outer-title mode-2"><span>${judul}</span></div>
                                        <div class="book-number hide" data-number="1">1</div><img class="book-img show" src="${url_sampul}" style="display: inline;">
                                        <div class="book-border-container" style="right: -3px; width: 4px;">
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 128px; top: 1px; left: 1px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 126px; top: 2px; left: 2px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 124px; top: 3px; left: 3px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 122px; top: 4px; left: 4px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="book-detail-title">${judul}</div>
                                <div class="book-detail-page">Kode Buku : ${kode_buku}</div>
                                <div class="book-detail-page">ISBN      : ${isbn}</div>
                                <div class="book-detail-page">Pengarang : ${pengarang}</div>
                                <div class="book-detail-page">Penerbit  : ${penerbit}</div>
                                <div class="book-detail-page">Tahun     : ${thn_buku}</div>
                                
                            </div>
                            <p class="book-detail-time">Published on ${tgl_masuk}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `);

            var delay = 200;
            setTimeout(function() {
                $(".light-box-out").addClass('fade-in');
            }, delay);
        });

        $("body").on('click', '.light-box-cancel-btn', function() {
            $(".light-box-out").removeClass('fade-in');
            $(".light-box-out").addClass('fade-out');
            var delay = 500;
            setTimeout(function() {
                $(".light-box-out").remove();
            }, delay);
        });

        const mousePosText = document.getElementById('mouse-pos');
        let mousePos = {
            x: undefined,
            y: undefined
        };

        // get mouse event
        window.addEventListener('mousemove', (event) => {
            mousePos = {
                x: event.clientX,
                y: event.clientY
            };

            if (mousePos.y > 70) {
                var delay = 500;
                setTimeout(function() {
                    $(".header").addClass('hide');
                    $(".footer").addClass('hide');
                }, delay);
            }
            if (mousePos.y < 70 || mousePos.y > 550) {
                var delay = 500;
                setTimeout(function() {
                    $(".header").removeClass('hide');
                    $(".footer").removeClass('hide');
                }, delay);
            }
            // console.log(`(${mousePos.x}, ${mousePos.y})`);
        });

        // mouse wheel
        window.addEventListener("wheel", event => {
            const delta = Math.sign(event.deltaY);
            if (delta == -1) {
                goNextPage();
            } else {
                goPrevPage();
            }
        });
    </script>
</body>

</html>