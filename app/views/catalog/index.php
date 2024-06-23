<?session_start()?>
<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll"
    data-image-src="<?= ASSETS ?>catalog/img/hero.jpeg">
    <form class="d-flex tm-search-form" method="get">
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
            Latest Photos
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

    </div> <!-- row -->
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