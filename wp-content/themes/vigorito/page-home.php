<?php
// Template Name: Home
?>
<?php
$args = array(
    'page' => 'home',
    'class' => ''
);


?>


<?php get_template_part('header', null, $args); ?>


<h1 class="visually-hidden position-absolute">Vigorito PCD</h1>
<?php $data = get_field('banner_topo'); ?>
<section id="section-1">
    <div class="splide splide-banner">
        <div class="splide__track">
            <div class="splide__list">
                <?php foreach ($data['banners'] as $banner) : ?>
                    <?php
                    if (valida_oferta(
                        $banner['data_inicio'],
                        ($banner['data_fim'] != '') ? $banner['data_fim'] : null
                    )) :
                    ?>
                        <div class="splide__slide">
                            <a href="<?= $banner['link']; ?>" title="Banner Destaque">
                                <img src="<?= (!wp_is_mobile()) ? $banner['imagem'] : $banner['imagem_mobile']; ?>" alt="Banner Destaque">
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('includes/sections-globals/section-ofertas', null, null); ?>

<?php $data = get_field('banners_seminovos');?>
<section id="section-4">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h2 class="title-large">
                    UTILITÁRIOS SEMINOVOS <span class="title-large-min"> em destaque</span>
                </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="splide splide-banner-seminovos">
                    <div class="splide__track">
                        <div class="splide__list">
                            <?php foreach ($data['banners'] as $banner) : ?>
                                <?php
                                if (valida_oferta(
                                    $banner['data_inicio'],
                                    ($banner['data_fim'] != '') ? $banner['data_fim'] : null
                                )) :
                                ?>
                                    <div class="splide__slide">
                                        <a href="<?= $banner['link']; ?>" class="add-localstorage" title="Banner Destaque">
                                            <img src="<?= (!wp_is_mobile()) ? $banner['imagem'] : $banner['imagem_mobile']; ?>" alt="Banner Destaque">
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$args = array(
    'id' => 9
);

get_template_part('includes/sections-globals/section-depoimentos', null, $args); ?>


<?= get_template_part('includes/sections-globals/section-unidades', null, null); ?>

<?php get_template_part('includes/components/modal/modal-home', null, null); ?>

<?php get_template_part('footer', null, null); ?>

<script class="no-defer">
    var splideSliderTop = new Splide('.splide-banner', {
        perPage: 1,
        pagination: false,
        arrows: true,
        autoplay: true,
        type: 'loop'
    });
    splideSliderTop.mount();

    var splideSliderTopSemi = new Splide('.splide-banner-seminovos', {
        perPage: 1,
        pagination: false,
        arrows: true,
        autoplay: true,
        type: 'loop'
    });
    splideSliderTopSemi.mount();
</script>