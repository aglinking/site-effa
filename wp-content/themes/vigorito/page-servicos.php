<?php
// Template Name: Serviços
?>
<?php
$args = array(
    'page' => 'servicos',
    'class' => ''
);
?>

<?php get_template_part('header', null, $args); ?>

<?php
$args = array(
    'img-desk' => get_field('banner_desktop'),
    'img-mob' =>  get_field('banner_mobile')
);
get_template_part('includes/sections-globals/section-banner-intro-int', null, $args);
?>
<?php $data = get_field('sessao_2'); ?>
<section id="section-1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7 col-left">
                <h2 class="title-large">
                    <span class="title-large-min"><?= $data['titulo_1']; ?></span><br>
                    <?= $data['titulo_2']; ?> <span class="title-large-min"><?= $data['titulo_3']; ?></span>
                </h2>
                <?= $data['texto']; ?>
            </div>
            <div class="col-12 col-lg-5 col-right">
                <?= $data['iframe_video']; ?>
            </div>
        </div>
    </div>
</section>

<?php $data = get_field('sessao_3'); ?>
<section id="section-2">
    <div class="container">
        <div class="row row-2 align-items-center">
            <?php if (!wp_is_mobile()) : ?>
                <div class="col-12 col-lg-6 col-left">
                    <img src="<?= $data['imagem']; ?>" alt="bg">
                </div>
            <?php endif; ?>

            <div class="col-12 col-lg-6 col-right">
                <h2 class="title-large">
                    <span class="title-large-min"><?= $data['titulo_1']; ?></span><br>
                    <?= $data['titulo_2']; ?> <span class="title-large-min"><?= $data['titulo_3']; ?></span>
                </h2>
                <?= $data['texto']; ?>
            </div>
            <?php if (wp_is_mobile()) : ?>
                <div class="col-12 col-lg-6 col-right">
                    <img src="<?= $data['imagem']; ?>" alt="bg">
                </div>
            <?php endif; ?>
        </div>
        <?php $data = get_field('sessao_4'); ?>
        <div class="row row-3 align-items-center">
            <div class="col-12 col-lg-6 col-left">
                <h2 class="title-large">
                    <span class="title-large-min"><?= $data['titulo_1']; ?></span><br>
                    <?= $data['titulo_2']; ?>
                </h2>
                <?= $data['texto']; ?>
                <?php if (!wp_is_mobile()) : ?>
                    <a class="button button-1" href="<?= get_permalink(4428); ?>" title="Saiba Mais">SAIBA MAIS</a>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-6 col-right">
                <img src="<?= $data['imagem']; ?>" alt="bg">
                <?php if (wp_is_mobile()) : ?>
                    <a class="button button-1" href="<?= get_permalink(4428); ?>" title="Saiba Mais">SAIBA MAIS</a>
                <?php endif; ?>
            </div>
        </div>
        <?php $data = get_field('sessao_5'); ?>
        <div class="row row-4 align-items-center">
            <?php if (!wp_is_mobile()) : ?>
                <div class="col-12 col-lg-6 col-left">
                    <img src="<?= $data['imagem']; ?>" alt="bg">
                </div>
            <?php endif; ?>
            <div class="col-12 col-lg-6 col-right">
                <h2 class="title-large">
                    <span class="title-large-min"><?= $data['titulo_1']; ?></span><br>
                    <?= $data['titulo_2']; ?>
                </h2>
                <?= $data['texto']; ?>
                <?php if (!wp_is_mobile()) : ?>
                    <a class="button button-1" href="<?= get_permalink(4430); ?>" title="Saiba Mais">SAIBA MAIS</a>
                <?php endif; ?>
            </div>
            <?php if (wp_is_mobile()) : ?>
                <div class="col-12 col-lg-6 col-right">
                    <img src="<?= $data['imagem']; ?>" alt="bg">
                    <?php if (wp_is_mobile()) : ?>
                        <a class="button button-1" href="<?= get_permalink(4430); ?>" title="Saiba Mais">SAIBA MAIS</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $data = get_field('sessao_6'); ?>
<section id="section-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title-large">
                    <span class="title-large-min"><?= $data['titulo_1']; ?></span><br>
                    <?= $data['titulo_2']; ?> <span class="title-large-min"><?= $data['titulo_3']; ?></span>
                </h2>
            </div>
        </div>
        <div class="row row-2">
            <div class="col-12 column-flex">
                <?php foreach ($data['itens'] as $item) : ?>
                    <div class="item">
                        <div class="top">
                            <span class="title">
                                <?= $item['titulo']; ?>
                            </span>
                            <img src="<?= $item['icone']; ?>" alt="bg">
                        </div>
                        <p>
                            <?= $item['texto']; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?= get_template_part('includes/sections-globals/section-unidades', null, null); ?>

<?php get_template_part('footer', null, null); ?>