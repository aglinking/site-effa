<?php
// Template Name: Single Promoção Oficina
?>
<?php
$args = array(
    'page' => 'single-promocao-oficina',
    'class' => ''
);
?>

<?php get_template_part('header', null, $args); ?>

<section id="section-1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9 col-left">
                <div class="box-border">
                    <div class="column-flex">
                        <img src="<?= get_the_post_thumbnail_url(); ?>" class="img" alt="<?= strip_tags(get_field('titulo_2')); ?>">
                        <div class="content">
                            <h1 class="title">
                                <?= get_field('titulo_1'); ?><br>
                                <span class="large"><?= get_field('titulo_2'); ?></span>
                            </h1>
                            <p class="txt-car">
                                <?= get_field('veiculos'); ?>
                            </p>
                            <div class="desconto">
                                Com desconto de <span class="number"><?= get_field('desconto'); ?></span>
                            </div>
                            <p>
                                <?= get_field('texto'); ?>
                            </p>
                        </div>
                    </div>
                    <?php if (get_field('condicoes') != "") : ?>
                        <div class="box-condicoes">
                            <div class="title">Condições:</div>
                            <p>
                                <?= get_field('condicoes'); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-right">
                <div class="form-side-oficina">
                    <span class="title">
                        eu quero essa
                        <br>
                        <span>promoção</span>
                    </span>
                    <?php get_template_part('includes/components/forms/model-5', null, null); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('includes/sections-globals/section-ofertas-oficina', null, null); ?>

<?php
$page = get_page_by_path('oficinas');
echo $page->ID;
$args = array(
    'id' => $page->ID
);
get_template_part('includes/sections-globals/section-depoimentos', null, $args); ?>

<?php get_template_part('includes/sections-globals/section-unidades', null, null); ?>

<?php get_template_part('footer', null, null); ?>