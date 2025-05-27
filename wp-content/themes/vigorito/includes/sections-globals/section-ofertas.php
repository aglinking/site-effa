<?php
$args = array(
    'post_type'      => 'veiculos', // Substitua 'seu_custom_post_type' pelo nome do seu custom post type
    'posts_per_page' => -1, // Número de posts que você deseja recuperar
    'orderby'        => 'menu_order', // order by title
    'order'          => 'ASC', // ascending order, use 'DESC' for descending
);
$posts = get_posts($args);


if ($posts) :
?>

    <section id="section-ofertas-0-km">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title-large">
                        <span class="title-large-min">Conheça os</span><br>
                        MODELOS 0KM <span class="title-large-min">disponíveis pra você!</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-splide-cards">
                    <div class="splide splide-cards-ofertas model-splide-cards-1">
                        <div class="splide__track">
                            <div class="splide__list">
                                <?php $cont = 0;
                                foreach ($posts as $post) :  setup_postdata($post);
                                    $cont++; ?>
                                    <div class="splide__slide">
                                        <?php
                                        $lists = ''; // Inicializa a variável $lists

                                        foreach (get_field('lista') as $list) {
                                            $lists .= '• ' . $list['texto'] . "<br>";
                                        }

                                        $args = array(
                                            'title-faixa-1' => get_field('nome_oferta'),
                                            'title-faixa-2' => get_field('nome_oferta_2'),
                                            'image' => get_the_post_thumbnail_url(get_field('veiculo')),
                                            'title-content' => get_field('titulo'),
                                            'list' => $lists,
                                            'title-desconto-1' => get_field('texto_1'),
                                            'title-desconto-2' => get_field('texto_2'),
                                            'link' => get_permalink(),
                                            'dataIni' =>  get_field('data_de_inicio_da_oferta'),
                                            'dataFim' =>  get_field('data_final_da_oferta'),
                                            'id-countdown' => $cont
                                        );
                                        get_template_part('includes/components/cards/model-1', null, $args);
                                        ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var splideCardsOfertas = new Splide('.splide-cards-ofertas', {
            perPage: 3,
            pagination: false,
            arrows: true,
            perMove: 1,
            padding: 0,
            autoplay: true,
            rewind: true,
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
        splideCardsOfertas.mount();
    </script>
<?php
endif;
wp_reset_postdata(); ?>