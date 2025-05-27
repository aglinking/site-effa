<section id="section-banner-intro-int">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <?php if (!wp_is_mobile()) : ?>
                    <img src="<?= $args['img-desk']; ?>" alt="Banner" class="bg">
                <?php else : ?>
                    <img src="<?= $args['img-mob']; ?>" alt="Banner" class="bg">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>