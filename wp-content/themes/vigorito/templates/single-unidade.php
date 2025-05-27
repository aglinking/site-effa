<?php
// Template Name: Unidades
?>
<?php
$args = array(
    'page' => 'unidades',
    'class' => ''
);
?>

<?php get_template_part('header', null, $args); ?>


<?php

$query = array(
    'post_type'      => 'unidades',
    'posts_per_page' => -1,
);

$idPage = get_the_ID();

$posts = get_posts($query);

if ($posts) :
?>

    <section id="section-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box-unidades d-none d-lg-flex">
                        <div>
                            <span class="title-large">
                                <span class="title-large-min">Conheça nossas</span><br>
                                Unidades
                            </span>
                        </div>
                        <div class="unidades">
                            <?php
                            foreach ($posts as $post) :  setup_postdata($post);
                            ?>
                                <a href="<?= get_permalink(); ?>" class="<?= ($idPage == get_the_ID()) ? 'unid-active' : ''; ?>" title="<?= strip_tags(get_field('nome_unidade')); ?>">
                                    <div class="box">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <?= get_field('nome_unidade'); ?>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php wp_reset_postdata();
endif; ?>
<section id="section-2">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9 col-left">
                <h2 class="title-large">
                    <span class="title-large-min">Unidade <?= get_field('empresa', 'option'); ?> </span><br>
                    <?= get_field('nome_unidade'); ?>
                </h2>
                <div class="info-1">
                    <div class="atendimento">
                        <?php if (get_field('telefone_loja') != "") : ?>
                            <p>
                                <!-- <strong>Showroom:</strong> <?= get_field('showroom'); ?><br> -->
                                <a href="tel:<?= formatNumber(get_field('telefone_loja')); ?>"><strong>Telefone:</strong> <span><?= get_field('telefone_loja'); ?></span></a>

                            </p>
                        <?php endif; ?>
                        <?php if (get_field('oficina') != "") : ?>
                            <p>
                                <strong>Oficina:</strong> <?= get_field('oficina'); ?><br>
                                <a href="tel:<?= formatNumber(get_field('telefone_oficina')); ?>"><strong>Telefone:</strong> <span><?= get_field('telefone_oficina'); ?></span></a>
                            </p>
                        <?php endif; ?>
                         <?php if (get_field('pecas') != "") : ?>
                            <p>
                                <strong>Peças:</strong> <?= get_field('pecas'); ?><br>
                            </p>
                        <?php endif; ?>
                  
                    </div>
                    <div class="links-maps">
                        <?php if (get_field('link_') != "") : ?>
                            <a href="<?= get_field('link_'); ?>" title="Google Maps">
                                <img src="<?= get_template_directory_uri(); ?>/dist/imgs/btn-maps.png" alt="Google Maps">
                            </a>
                        <?php endif; ?>
                        <?php if (get_field('link_waze') != "") : ?>
                            <a href="<?= get_field('link_waze'); ?>" title="Waze">
                                <img src="<?= get_template_directory_uri(); ?>/dist/imgs/btn-waze.png" alt="Waze">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (get_field('iframe_maps') != "") : ?>
                    <div class="iframe-map">
                        <?= get_field('iframe_maps'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-3 col-right">
                <?php get_template_part('includes/components/forms/model-6', null, null); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('includes/sections-globals/section-ofertas-0k', null, null); ?>

<?php get_template_part('footer', null, null); ?>