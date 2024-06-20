<div class="tm-hero d-flex justify-content-center align-items-center" id="tm-video-container">
    <video autoplay muted loop id="tm-video">
        <source src="<?= ASSETS ?>catalog/video/hero.mp4" type="video/mp4">
    </video>
    <i id="tm-video-control-button" class="fas fa-pause"></i>
    <form class="d-flex position-absolute tm-search-form">
        <input id="find" name="find" class="form-control tm-search-input" type="search" placeholder="Search"
            aria-label="Search">
        <button class="btn btn-outline-success tm-search-btn" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>

<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Latest Videos
        </h2>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <form action="" class="tm-text-primary">
                Page <input type="text" value="<?= $data['activepage'] ?>" size="1"
                    class="tm-input-paging tm-text-primary"> of <?= $data['pagetotal'] ?>
            </form>
        </div>
    </div>
    <div class="row tm-mb-90 tm-gallery">
        <?php
        if (is_array($data['images'])) {
            foreach ($data['images'] as $row) {
                $this->view("catalog/single_image", $row);
            }
        }
        ?>
    </div>

    <div class="row tm-mb-90">
        <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
            <?php if ($data['activepage'] > 1) { ?>
                <a href="?page=<?= $data['activepage'] - 1 ?>" class="btn btn-primary tm-btn-prev mb-2">Previous</a>
                <?php ;
            } ?>
            <div class="tm-paging d-flex">
                <?php for ($i = 1; $i <= $data['pagetotal']; $i++) { ?>
                    <?php if ($i == $data['activepage']) { ?>
                        <a href="?page=<?= $i ?>" class="active tm-paging-link"><?= $i ?></a>
                        <?php ;
                    } else { ?>
                        <a href="?page=<?= $i ?>" class="tm-paging-link"><?= $i ?></a>
                        <?php ;
                    } ?>
                    <?php ;
                } ?>
            </div>
            <?php if ($data['pagetotal'] > $data['activepage']) { ?>
                <a href="?page=<?= $data['activepage'] + 1 ?>" class="btn btn-primary tm-btn-next">Next Page</a>
                <?php ;
            } ?>
        </div>
    </div>
</div>

<script>

    $(function () {
        /************** Video background *********/

        function setVideoSize() {
            const vidWidth = 1280;
            const vidHeight = 720;
            const maxVidHeight = 400;
            let windowWidth = window.innerWidth;
            let newVidWidth = windowWidth;
            let newVidHeight = windowWidth * vidHeight / vidWidth;
            let marginLeft = 0;
            let marginTop = 0;

            if (newVidHeight < maxVidHeight) {
                newVidHeight = maxVidHeight;
                newVidWidth = newVidHeight * vidWidth / vidHeight;
            }

            if (newVidWidth > windowWidth) {
                marginLeft = -((newVidWidth - windowWidth) / 2);
            }

            if (newVidHeight > maxVidHeight) {
                marginTop = -((newVidHeight - $('#tm-video-container').height()) / 2);
            }

            const tmVideo = $('#tm-video');

            tmVideo.css('width', newVidWidth);
            tmVideo.css('height', newVidHeight);
            tmVideo.css('margin-left', marginLeft);
            tmVideo.css('margin-top', marginTop);
        }

        setVideoSize();

        // Set video background size based on window size
        let timeout;
        window.onresize = function () {
            clearTimeout(timeout);
            timeout = setTimeout(setVideoSize, 100);
        };

        // Play/Pause button for video background      
        const btn = $("#tm-video-control-button");

        btn.on("click", function (e) {
            const video = document.getElementById("tm-video");
            $(this).removeClass();

            if (video.paused) {
                video.play();
                $(this).addClass("fas fa-pause");
            } else {
                video.pause();
                $(this).addClass("fas fa-play");
            }
        });
    });
</script>