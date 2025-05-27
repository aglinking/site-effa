<?php ed_set_post_views(get_the_ID()); ?>

<aside id="aside-blog">
    <?php
    $term_args = array(
        'taxonomy'               => 'category',
        'orderby'                => 'name',
        'order'                  => 'ASC',
        'hide_empty'             => true,
        'exclude' => 1
    );
    $term_query = new WP_Term_Query($term_args);
    ?>
    <?php if ($term_query->terms) : ?>
        <div class="boxs">
            <div class="category">
                <span class="title">Categorias</span>
                <ul>
                    <?php
                    foreach ($term_query->terms as $term) {
                        echo "<li><a href='" . get_home_url() . "/category/" . $term->slug . "''>" . $term->name . "</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    <?php
    $args = array(
        'post_type' => 'post',
        'showposts' => '4',
        'meta_key' => 'ed_post_views_count',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
    ?>
        <div class="boxs">
            <div class="more-visited">
                <span class="title">Mais Visitados</span>
                <?php
                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                    <div class="content-img-txt">
                        <a href="<?= get_permalink(); ?>" title="<?= strip_tags(get_the_title()); ?>">
                            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?= strip_tags(get_the_title()); ?>" title="<?= strip_tags(get_the_title()); ?>">                        </a>
                        <a href="<?= get_permalink(); ?>" title="<?= strip_tags(get_the_title()); ?>">
                            <p>
                                <?= limit_words(get_the_excerpt(), 45); ?>
                            </p>
                        </a>
                    </div>
                <?php
                    endwhile;
                else :  endif;
                wp_reset_query();
                wp_reset_postdata();
                ?>
            </div>
        </div>
    <?php endif; ?>
</aside>