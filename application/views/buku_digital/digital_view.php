
<html>

<head>
<title>Sistem Informasi Perpustakaan Kampus Mengajar 5 </title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets_style/image/km5getaskerep.jpg'); ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/dist/css/buku_digital.css">
    <script src="<?php echo base_url(); ?>assets_style/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets_style/assets/dist/js/hammer.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets_style/assets/dist/js/Bookcase.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets_style/assets/dist/js/jquery.mousewheel.js"></script>
    <title>Buku Digital | Perpustakaan SDN Getaskerep 01</title>
</head>

<body class="gold">

    <div class="main-container">
        <div class="bookcase-panel">
            <div class="bookcase-nav">
                <div class="nav-bg">
                    <div class="nav-left"></div>
                    <div class="nav-mid"></div>
                    <div class="nav-right"></div>
                </div>
                <div class="nav-left-content">
                    <div class="nav-search-content"><input type="text" class="nav-search-input input-form">
                        <div class="nav-search-btn"></div>
                    </div>
                </div>
                <div class="nav-header"><span class="nav-title">PERPUSTAKAAN JENDELA ANGKASA</span></div>

                <div class="nav-right-btns">
                    <div class="nav-share-btn">
                    </div>


                </div>
            </div>

            <div class="bookcase-content">
                <div class="case-panel mode-2">
                    <div class="case-background">
                        <div class="case-row ">
                            <div class="case-left"></div>
                            <div class="case-mid"></div>
                            <div class="case-right"></div>
                        </div>
                        <div class="case-row ">
                            <div class="case-left"></div>
                            <div class="case-mid"></div>
                            <div class="case-right"></div>
                        </div>
                        <div class="case-row ">
                            <div class="case-left"></div>
                            <div class="case-mid"></div>
                            <div class="case-right"></div>
                        </div>
                        <div class="case-row ">
                            <div class="case-left"></div>
                            <div class="case-mid"></div>
                            <div class="case-right"></div>
                        </div>

                    </div>

                    <div class="case-content user-select-none">
                        <div class="case-row ">
                            <div class="case-wrapper" style="width: 800px;">

                                <?php foreach ($buku as $isi) : ?>
                                    <div class="book-content" style="width: 130px; height: 140px;">
                                        <div class="book-wrapper" style="width: 98.875px; height: 140px; left: 15.5625px; top: 0px;">
                                            <div class="book-outer-title mode-2"><span><?= $isi['title'] ?></span></div>
                                            <input type="hidden" class="id_buku" value="<?= $isi['id_buku'] ?>">
                                            <input type="hidden" class="tgl_masuk" value="<?= $isi['tgl_masuk'] ?>">
                                            <input type="hidden" class="total_hal" value="<?= $isi['total_hal'] ?>">
                                            <div class="book-number hide" data-number="1">1</div>
                                            <img class="book-img show" src="<?php echo base_url(); ?>assets_style/image/buku/lampiran/<?= $isi['lampiran'] ?>/1.png" style="display: inline;">
                                            <div class="book-border-container" style="right: -3px; width: 4px;">
                                                <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 138px; top: 1px; left: 1px;"></div>
                                                <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 136px; top: 2px; left: 2px;"></div>
                                                <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 134px; top: 3px; left: 3px;"></div>
                                                <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 132px; top: 4px; left: 4px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach ?>


                            </div>
                        </div>
                        <!-- <div class="case-row ">
                            <div class="case-wrapper" style="width: 800px;">
                                <div class="book-content" data-index="15510190" data-id="5" load-status="loaded" style="width: 130px; height: 140px;">
                                    <div class="book-wrapper" data-index="15510190" data-id="5" title="Dimana Kacang Sipet?" style="width: 130px; height: 130px; left: 0px; top: 10px;">
                                        <div class="book-outer-title mode-2"><span>Dimana Kacang Sipet?</span></div>
                                        <div class="book-number hide" data-number="6">6</div><img class="book-img show" src="https://online.fliphtml5.com/ycqjr/aecu/files/shot.jpg?1680272524000" style="display: inline;">
                                        <div class="book-border-container" style="right: -3px; width: 4px;">
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 128px; top: 1px; left: 1px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 126px; top: 2px; left: 2px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 124px; top: 3px; left: 3px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 122px; top: 4px; left: 4px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="book-content" data-index="86889754" data-id="6" load-status="loaded" style="width: 130px; height: 140px;">
                                    <div class="book-wrapper" data-index="86889754" data-id="6" title="Tidak Bisa Tidak" style="width: 98.5833px; height: 140px; left: 15.7083px; top: 0px;">
                                        <div class="book-outer-title mode-2"><span>Tidak Bisa Tidak</span></div>
                                        <div class="book-number hide" data-number="7">7</div><img class="book-img show" src="https://online.fliphtml5.com/ycqjr/qvfn/files/shot.jpg?1680272323000" style="display: inline;">
                                        <div class="book-border-container" style="right: -3px; width: 4px;">
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 138px; top: 1px; left: 1px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 136px; top: 2px; left: 2px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 134px; top: 3px; left: 3px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 132px; top: 4px; left: 4px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="book-content" data-index="65362983" data-id="7" load-status="loaded" style="width: 130px; height: 140px;">
                                    <div class="book-wrapper" data-index="65362983" data-id="7" title="Putri Didalam Hutan" style="width: 98.5833px; height: 140px; left: 15.7083px; top: 0px;">
                                        <div class="book-outer-title mode-2"><span>Putri Didalam Hutan</span></div>
                                        <div class="book-number hide" data-number="8">8</div><img class="book-img show" src="https://online.fliphtml5.com/ycqjr/brty/files/shot.jpg?1680269373000" style="display: inline;">
                                        <div class="book-border-container" style="right: -3px; width: 4px;">
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 138px; top: 1px; left: 1px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 136px; top: 2px; left: 2px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 134px; top: 3px; left: 3px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 132px; top: 4px; left: 4px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="book-content" data-index="31712791" data-id="8" load-status="loaded" style="width: 130px; height: 140px;">
                                    <div class="book-wrapper" data-index="31712791" data-id="8" title="Apa Itu?" style="width: 98.875px; height: 140px; left: 15.5625px; top: 0px;">
                                        <div class="book-outer-title mode-2"><span>Apa Itu?</span></div>
                                        <div class="book-number hide" data-number="9">9</div><img class="book-img show" src="https://online.fliphtml5.com/ycqjr/skkm/files/shot.jpg?1680269224000" style="display: inline;">
                                        <div class="book-border-container" style="right: -3px; width: 4px;">
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 138px; top: 1px; left: 1px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 136px; top: 2px; left: 2px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 134px; top: 3px; left: 3px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 132px; top: 4px; left: 4px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="case-row ">
                            <div class="case-wrapper" style="width: 800px;"></div>
                        </div>
                        <div class="case-row ">
                            <div class="case-wrapper" style="width: 800px;"></div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="bookcase-footer user-select-none"><a rel="nofollow" class="footer-logo" target="_blank" href="javascript:void(0);"><img src="" class="hide"></a>
  
                <input type="hidden" id="nama_siswa" value="<?= $nama_siswa; ?>">
            </div>
        </div>

        


    </div>
</body>

<script>
    let nama_siswa =  $('#nama_siswa').val();

    $("body").on('click', '.view', function() {
        let id = $(this).parent().find('.id_buku_view').val();
        location.href = "<?php echo base_url(); ?>buku_digital/read/" + id;
    });

    $(".nav-share-btn").click(function() {

        if (confirm(`Log out siswa ${nama_siswa}?`)) {
            location.href = "<?php echo base_url(); ?>login/logout";
        } else {
            alert("batal");
        }
    });

    $("body").on('click', '.light-box-cancel-btn', function() {
        $(".light-box-out").removeClass('fade-in');
        $(".light-box-out").addClass('fade-out');
        var delay = 500;
        setTimeout(function() {
            $(".light-box-out").remove();
        }, delay);
    });


    $(".book-img").click(function() {

        let id = $(this).parent().find('.id_buku').val();
        let judul = $(this).parent().find('.book-outer-title span').text();
        let sampul = $(this).attr('src');
        let tgl_masuk = $(this).parent().find('.tgl_masuk').val();
        let total_hal = $(this).parent().find('.total_hal').val();

        $(".main-container").after(`
            <div class="light-box-out">
            <div class="light-box-bg"></div>
            <div class="light-box sh5-table">
                <div class="sh5-table-centered">
                    <div class="light-box-content" style="width: 485px;">
                        <div class="light-box-title">Book Detail<div class="light-box-cancel-btn" title="Close" >x</div>
                        </div>
                        <div class="light-box-panel">
                            <div class="book-detail-content" style="min-height: 160px;">
                                <div class="book-detail-book" style="width: 130px; height: 130px;"><img class="book-detail-shelf" src="assets_style/image/bookcase/shelf.png">
                                    <div class="book-wrapper"  title="Rumah Wortel" style="width: 130px; height: 130px; left: -2px; top: 0px; touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                        <input type="hidden" class="id_buku_view" value="${id}">
                                        <div class="book-outer-title mode-2"><span>${judul}</span></div>
                                        <div class="book-number hide" data-number="1">1</div><img class="book-img show" src="${sampul}" style="display: inline;">
                                        <div class="book-border-container" style="right: -3px; width: 4px;">
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 128px; top: 1px; left: 1px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 126px; top: 2px; left: 2px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(204, 204, 204); height: 124px; top: 3px; left: 3px;"></div>
                                            <div style="position: absolute; width: 1px; background: rgb(255, 255, 255); height: 122px; top: 4px; left: 4px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="book-detail-title">${judul}</div>
                                <div class="book-detail-page">Pages: ${total_hal}</div>
                                <div class=" view button button-blue button-rounded button-block button-large" >View</div>
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




    function gcd(x, y) {
        if (y == 0) {
            return x;
        }
        return gcd(y, x % y);
    }

    $(window).resize(function() {
        var ratio = gcd($(window).width(), $(window).height());
        var testratio = ($(window).width() / ratio) / ($(window).height() / ratio);

        if (testratio < 1.7777777) {
            $('.case-wrapper').css('width', '320px');

            // alert($(window).width());
            if ($(window).width() > 400 || $(window).width() < 1000) {
                for (let index = 0; index < 8; index++) {
                    $('.case-background').append(`
                            <div class="case-row ">
                                <div class="case-left"></div>
                                <div class="case-mid"></div>
                                <div class="case-right"></div>
                            </div>
    `)

                }
            }

        }

    }).resize();
</script>

</html>