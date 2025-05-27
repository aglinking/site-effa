<?php
// Template Name: Single Semi Novos
?>
<?php
$args = array(
    'page' => 'single-semi-novos',
    'class' => ''
);

// Obtém o ID da postagem atual
$post_id = get_the_ID();

// Nome da sua taxonomia personalizada
$taxonomy = 'marca';

// Obtém os termos associados à postagem
$termos = wp_get_post_terms($post_id, $taxonomy);

?>

<?php get_template_part('header', null, $args); ?>
<section id="section-1">
    <div class="container">
        <div class="row">
            <?php if (wp_is_mobile()) : ?>
                <div class="d-lg-none form-search">
                    <?php get_template_part('includes/components/forms/model-2', null, null); ?>
                </div>
            <?php endif; ?>
            <div class="col-12 content-border">
                <hr>
            </div>
            <div class="col-12 col-lg-9 col-left">
                <div class="d-lg-none col-right">
                    <h1 class="title-large">
                        <span class="title-large-min"><?= $termos[0]->name; ?></span>
                        <?= get_field('nome'); ?>
                    </h1>
                    <span class="desc">
                        <?= get_field('versao'); ?>
                    </span>
                    <div class="valor d-lg-none">
                        <span class="rs">R$</span>
                        <?= formatarNumeroEmReais(get_field('preco_formatado')); ?>
                    </div>
                </div>
                <?php if (have_rows('fotos')) : ?>
                    <div>
                        <div class="splide" id="main-slider">
                            <div class="splide__track">
                                <div class="splide__list">
                                    <?php while (have_rows('fotos')) : the_row();  ?>
                                        <div class="splide__slide">
                                            <img src="<?= get_sub_field('url'); ?>" alt="<?= strip_tags(get_field('nome')); ?>">
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="splide" id="thumbnail-slider">
                            <div class="splide__track">
                                <div class="splide__list">
                                    <?php while (have_rows('fotos')) : the_row();  ?>
                                        <div class="splide__slide">
                                            <img src="<?= get_sub_field('url'); ?>" alt="<?= strip_tags(get_field('nome')); ?>">
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="itens">
                    <div class="item">
                        <img src="<?= get_template_directory_uri(); ?>/dist/imgs/ico-cambio.jpg" alt="Caixa de câmbio">
                        <span class="title">
                            Caixa de câmbio<br>
                            <span>
                                <?= get_field('caixa_de_cambio'); ?>
                            </span>
                        </span>
                    </div>
                    <div class="item">
                        <img src="<?= get_template_directory_uri(); ?>/dist/imgs/ico-km.jpg" alt="Quilometragem">
                        <span class="title">
                            Quilometragem<br>

                            <span>
                                <?= number_format(get_field('quilometragem'), 0, ',', '.'); ?>KM
                            </span>
                        </span>
                    </div>
                    <div class="item">
                        <img src="<?= get_template_directory_uri(); ?>/dist/imgs/ico-ano.jpg" alt="Ano">
                        <span class="title">
                            Ano<br>
                            <span>
                                <?= get_field('ano_fabricacao'); ?>/<?= get_field('ano_modelo'); ?>
                            </span>
                        </span>
                    </div>
                    <div class="item">
                        <img src="<?= get_template_directory_uri(); ?>/dist/imgs/ico-comnbustivel.jpg" alt="Combustível">
                        <span class="title">
                            Combustível<br>
                            <span>
                                <?= get_field('combustivel'); ?>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
                    <?php if (have_rows('opcionais')) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Opcionais
                                </div>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="container-list">
                                        <?php while (have_rows('opcionais')) : the_row();  ?>
                                            <li><i class="fa fa-chevron-down"></i><?= get_sub_field('texto'); ?></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (have_rows('acessorios')) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Acessórios
                                </div>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="container-list">
                                        <?php while (have_rows('acessorios')) : the_row();  ?>
                                            <li><i class="fa fa-chevron-down"></i><?= get_sub_field('texto'); ?></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Observações
                            </div>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?= get_field('observacoes'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-right">
                <div class="d-none d-lg-block">
                    <h1 class="title-large">
                        <span class="title-large-min"><?= $termos[0]->name; ?></span>
                        <?= get_field('nome'); ?>
                    </h1>
                    <span class="desc">
                        <?= get_field('versao'); ?>
                    </span>
                </div>
                <div class="valor d-none d-lg-block">
                    <span class="rs">R$</span>
                    <?= formatarNumeroEmReais(get_field('preco_formatado')); ?>
                </div>
                <div class="form">
                    <span class="title">
                        quero <span>negociar!</span>
                    </span>
                    <?php get_template_part('includes/components/forms/model-3', null, null); ?>
                </div>
                <?php
                // Obtém o título do post atual
                $titulo_atual = get_the_title();

                // Configuração da consulta
                $args = array(
                    'post_type'      => 'semi-novos',  // Substitua 'post' pelo tipo de postagem que você está usando
                    'posts_per_page' => 4,      // Retorna todos os posts correspondentes
                    'post_status'    => 'publish',
                    'ignore_sticky_posts' => 1,
                    'orderby'        => 'rand',  // Ordena aleatoriamente
                    's'              => $titulo_atual,  // Realiza uma pesquisa com o título atual
                );
                // Adiciona o ID do post atual à lista de exclusão
                $args['post__not_in'] = array(get_the_ID());
                // Cria a instância da WP_Query
                $query = new WP_Query($args);

                ?>
                <?php if ($query->have_posts()) : ?>
                    <div class="outros">
                        <div class="box">
                            <div class="top-bg">
                                Veja mais de<br>
                                <span><?= get_field('nome'); ?> <?= get_field('versao'); ?></span>
                            </div>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="infos-car">
                                    <a href="<?= get_permalink(); ?>" title="<?= strip_tags(get_the_title()); ?>">
                                        <?php $fotos = get_field('fotos');
                                        if (!isset($fotos[0])) {
                                            $fotos[0] = array("url"=> get_template_directory_uri(  ) . '/dist/imgs/placeholder-car.png');
                                        }; 
                                       
                                        
                                        ?>
                                        <img src="<?= $fotos[0]['url']; ?>" alt="<?= strip_tags(get_the_title()); ?>">
                                        <div class="infos">
                                            <span class="txt">
                                                <?= get_field('ano_fabricacao'); ?>/<?= get_field('ano_modelo'); ?><br>
                                                <?= number_format(get_field('quilometragem'), 0, ',', '.'); ?>KM
                                            </span>
                                            <span class="preco">
                                                R$ <?= formatarNumeroEmReais(get_field('preco_formatado')); ?>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('includes/sections-globals/section-seminovos-destaque', null, null); ?>

<?php get_template_part('footer', null, null); ?>


<script>
    var main = new Splide('#main-slider', {
        type: 'fade',
        pagination: false,
        arrows: true,
    });

    var thumbnails = new Splide('#thumbnail-slider', {
        rewind: true,
        fixedWidth: 190,
        fixedHeight: 125,
        isNavigation: true,
        gap: 10,
        // focus: 'center',
        pagination: false,
        arrows: false,
        cover: true,
        dragMinThreshold: {
            mouse: 4,
            touch: 10,
        },
        breakpoints: {
            640: {
                fixedWidth: 66,
                fixedHeight: 38,
            },
        },
    });

    main.sync(thumbnails);
    main.mount();
    thumbnails.mount();
</script>