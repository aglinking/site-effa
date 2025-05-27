<?php
// Template Name: Single Novo
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

$id_post_veiculo = get_the_ID();

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


<div id="">
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
    </section>
</div>


<section id="section-2">
    <div class="container container-of-padding-mob">
        <div class="row">
            <div class="col-12 ">

                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php
                        $args = array(
                            'id_post_veiculo' => get_the_ID(),
                            'show_content_galery' => true
                        );
                        ?>
                        <?php get_template_part('includes/components/content/veiculo-single', null, $args); ?>
                        <div class="title-generics">
                            <h2 class="title">
                                Ficha Técnica
                            </h2>
                        </div>
                        <div class="accordion accordion-info" id="accordionExample">
                            <?php $data = get_field('versoes');
                            $cont = 0; ?>
                            <?php foreach ($data['versao'] as $items) : $cont++; ?>
                                <?php $tabelas =  $items['tabelas'];
                                $cont2 = 0; ?>

                                <?php foreach ($tabelas as $tabela) : $cont2++; ?>
                                    <div class="accordion-item">

                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button <?= ($cont2 != 1) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $cont2; ?>" aria-controls="collapse<?= $cont2; ?>">
                                                <?= $tabela['nome_tabela']; ?> <i class="fa fa-chevron-down"></i>
                                            </button>
                                        </h2>
                                        <div id="collapse<?= $cont2; ?>" class="accordion-collapse collapse <?= ($cont2 == 1) ? 'show' : ''; ?>" aria-labelledby="heading<?= $cont2; ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <?= $tabela['tabela']; ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                                <?php
                                if ($cont == 1) {

                                    break;
                                }
                                ?>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('includes/sections-globals/section-ofertas', null, null); ?>

<?php $data = get_field('banners_seminovos', 9); ?>
<section id="section-seminovos-banners">
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

<?php get_template_part('includes/sections-globals/section-unidades', null, null); ?>
<?php get_template_part('includes/components/loading', null, null); ?>


<script>
    var splideSliderTopSemi = new Splide('.splide-banner-seminovos', {
        perPage: 1,
        pagination: false,
        arrows: true,
        autoplay: true,
        type: 'loop'
    });
    splideSliderTopSemi.mount();
</script>


<?php get_template_part('footer', null, null); ?>