<?php


// Configuração da consulta
switch_to_blog(1);

$args = array(
    'post_type'      => 'semi-novos',  // Substitua 'post' pelo tipo de postagem que você está usando
    'posts_per_page' => 6,      // Retorna todos os posts correspondentes
    'post_status'    => 'publish',
    'ignore_sticky_posts' => 1,
    'orderby'        => 'rand',  // Ordena aleatoriamente
);



// Cria a instância da WP_Query
$query = new WP_Query($args);

?>

<?php if ($query->have_posts()) : ?>

    <section id="section-seminovos-destaque">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="<?= get_home_url(1); ?>/seminovos/" title=" Veja todos Seminovos">
                        <h2 class="title-large">
                            seminovos<span class="title-large-min"> em destaque</span>
                        </h2>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="splide splide-cards-seminovos model-splide-cards-1">
                        <div class="splide__track">
                            <div class="splide__list">
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <div class="splide__slide">
                                        <?php
                                        $fotos = get_field('fotos');
                                        if (!isset($fotos[0])) {
                                            $fotos[0] = array("url" => get_template_directory_uri() . '/dist/imgs/placeholder-car.png');
                                        }
                                        $args = array(
                                            'title-1' => get_field('nome'),
                                            'text' => get_field('versao') .  get_field('cor') .
                                                ' • ' . get_field('caixa_de_cambio') . '<br>' .
                                                number_format(get_field('quilometragem'), 0, ',', '.') . 'Km <br>',
                                            'image' => $fotos[0]['url'],
                                            'preco' => get_field('preco'),
                                            'preco_formatado' => formatarNumeroEmReais(get_field('preco_formatado')),
                                            'link' => get_permalink(),
                                        );
                                        get_template_part('includes/components/cards/model-2', null, $args);
                                        ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a href="<?= get_home_url(1); ?>/seminovos/" class="button-4" title=" Veja todos os Seminovos">
                        Veja todos os Seminovos
                    </a>
                </div>
            </div>
        </div>
    </section>


    <script>
        var splideModelSeminovos = new Splide('.splide-cards-seminovos', {
            perPage: 4,
            pagination: false,
            arrows: true,
            autoplay: true,
            type: 'loop',
            perMove: 1,
            mediaQuery: 'max',
            breakpoints: {
                1023: {
                    padding: 0,
                    perPage: 1,
                    arrows: true,
                    pagination: true,
                },
            }

        });
        splideModelSeminovos.mount();
    </script>
<?php wp_reset_postdata();

endif;
restore_current_blog(); ?>