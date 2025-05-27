<!-- page blog -->
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


<section id="header-index-blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-large">Blog</div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-12">
            <section id="content-blog">
                <div id="content-card-post">
                    <?php
                    $query = new WP_Query(array(
                        'posts_per_page' => 9,
                        'post_type'        => 'post',
                        'paged' => $paged = (get_query_var('paged')) ? get_query_var('paged') : 1
                    ));

                    ?>
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="card-blog">
                                <a href="<?= get_permalink() ?>" title="<?= strip_tags(get_the_title()); ?>">
                                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= strip_tags(get_the_title()); ?>" title="<?= strip_tags(get_the_title()); ?>">
                                </a>
                                <div class="content-text">
                                    <a href="<?= get_permalink() ?>" title="<?= strip_tags(get_the_title()); ?>">
                                        <h2 class="title">
                                            <?= limit_words(get_the_title(), 60); ?>
                                        </h2>
                                    </a>
                                    <a href="<?= get_permalink() ?>" title="<?= strip_tags(get_the_title()); ?>">
                                        <span class="data">
                                            <?= get_the_date(); ?>
                                        </span>
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