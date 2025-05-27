<?php
// Template Name: Single Ofertas
?>
<?php
$args = array(
    'page' => 'single-novo',
    'class' => 'single-ofertas'
);
?>

<?php get_template_part('header', null, $args); ?>

<style>
    #section-1 {
        background-image: url('<?php echo get_template_directory_uri(); ?>/dist/imgs/bg-intro-ofertas.jpg');
    }
</style>

<?php

$id_post_veiculo = get_field('veiculo');

if (!valida_oferta(
    get_field('data_de_inicio_da_oferta'),
    (get_field('data_final_da_oferta') != '') ? get_field('data_final_da_oferta') : null
)) {
    // Se a oferta não for válida, encerra a execução do script e interrompe o carregamento da página
    exit('
        <div class="container">
            <div class="row" >
                <div class="col-12 card" style="padding:100px;margin-top:100px;">
                    <h1 class="title-large">Oferta não disponível.</h1>
                </div>
            </div>
        </div>
    ');
}
?>

<div class="bg-faixa">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <span class="name-oferta">
                    <?= get_field('nome_oferta'); ?> <span><?= get_field('nome_oferta_2'); ?></span>
                </span>
            </div>
        </div>
    </div>
</div>

<?php $data = get_field('sessao_banner', $id_post_veiculo); ?>
<section id="section-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 content">
                <div class="content-intro">
                    <h1 class="title">
                        <?= $data['nome_carro']; ?>
                    </h1>
                    <div class="txt-desconto">
                        <strong>
                            <?= get_field('texto_1'); ?>
                        </strong><br>
                        <?= get_field('texto_2'); ?>
                    </div>
                    <div class="txt">
                        <?php foreach (get_field('lista')  as $items) : ?>
                            <span> • <?= $items['texto']; ?></span>
                        <?php endforeach; ?>
                    </div>
                    <!-- <?php
                    if (
                        get_field('data_de_inicio_da_oferta') != ""
                        && get_field('data_final_da_oferta') != ""
                    ) {
                        $args2 = array(
                            'id' => 1,
                            'data_ini' => get_field('data_de_inicio_da_oferta'),
                            'data_fim' => get_field('data_final_da_oferta')
                        );
                        get_template_part('includes/components/countdown', null, $args2);
                    }
                    ?> -->
                </div>
                <img src="<?= get_the_post_thumbnail_url($id_post_veiculo); ?>" alt="Destaque" class="carro">
            </div>
            <?php if (!wp_is_mobile()) : ?>
                <div class="col-lg-4 col-12 content-form">
                    <?php
                    $args = array(
                        'name' => $data['nome_carro']
                    );
                    get_template_part('includes/components/forms/model-1', null, $args);

                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php if (wp_is_mobile()) : ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 content-form">
                <?php
                $args = array(
                    'name' => $data['nome_carro']
                );
                get_template_part('includes/components/forms/model-1', null, $args);

                ?>
            </div>

        </div>
    </div>
<?php endif; ?>
<section id="section-2">
    <?php if (get_field('texto_condicoes') != "") : ?>
        <div class="bg-tabs-intro">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="condicoes-txt-title">
                            <strong>
                                Ver condições desta oferta*
                            </strong>
                        </p>
                        <?= get_field('texto_condicoes'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="container container-of-padding-mob">
        <div class="row">
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php

                        $args = array(
                            'id_post_veiculo' => $id_post_veiculo,
                            'show_content_galery' => false
                        );
                        ?>
                        <?php get_template_part('includes/components/content/veiculo-single', null, $args); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('includes/sections-globals/section-unidades', null, null); ?>



<?php get_template_part('footer', null, null); ?>