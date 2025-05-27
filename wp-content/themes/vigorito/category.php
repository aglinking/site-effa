<?php
// Template Name: Blog
?>
<?php
$args = array(
    'page' => 'blog',
    'class' => ''
);
?>

<?php get_template_part('header', null, $args); ?>


<?php
$category = get_the_category(); // Obtém a categoria atual da postagem
if ($category) {
    $category_name = esc_html($category[0]->name); // Exibe o nome da primeira categoria (pode ser ajustado conforme necessário)
}
$args = array(
    'title' => $category_name
);
get_template_part('includes/sections-globals/intro-interna', null, $args);
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <section id="content-blog">
                <div id="content-card-post">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="card-blog">
                                <a href="<?= get_permalink() ?>" title="<?= strip_tags(get_the_title()); ?>">
                                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="" title="<?= strip_tags(get_the_title()); ?>">
                                </a>
                                <div class="content-text">
                                    <a href="<?= get_permalink() ?>" title="<?= strip_tags(get_the_title()); ?>">
                                        <h2 class="title">
                                            <?= limit_words(get_the_title(), 47); ?>
                                        </h2>
                                    </a>
                                    <a href="<?= get_permalink() ?>" title="<?= strip_tags(get_the_title()); ?>">

                                        <p>
                                            <?= limit_words(get_the_excerpt(), 140); ?>
                                        </p>
                                    </a>
                                    <a href="<?= get_permalink() ?>" class="button-leia" title="<?= strip_tags(get_the_title()); ?>">
                                        Leia Mais
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php wp_reset_postdata();
                    endif; ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center paginacao">
                                <?php
                                echo paginate_links(array(
                                    'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                                    'total'        => $query->max_num_pages,
                                    'current'      => max(1, get_query_var('paged')),
                                    'format'       => '?paged=%#%',
                                    'show_all'     => false,
                                    'type'         => 'plain',
                                    'end_size'     => 2,
                                    'mid_size'     => 1,
                                    'prev_next'    => false,
                                    'add_args'     => false,
                                    'add_fragment' => '',
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php get_template_part('includes/sections-globals/sidebar-blog', null, null); ?>
            </section>
        </div>
    </div>
</div>

<?php get_template_part('footer', null, null); ?>