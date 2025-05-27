<?php
// Template Name: Single Blog
?>
<?php
$args = array(
    'page' => 'single-blog',
    'class' => ''
);
?>

<?php get_template_part('header', null, $args); ?>



<div class="container">
    <div class="row">
        <!-- <div class="col-12">
            <img src="<?= get_the_post_thumbnail_url(); ?>" class="img-destaque" alt="<?= get_the_title(); ?>">
        </div> -->
        <div class="col-12">
            <section id="content-single">
                <div id="content-general">
                    <span class="title"><?= get_the_title(); ?></span>
                    <span class="data">
                        <?= get_the_date(); ?>
                    </span>
                    <?php the_content(); ?>
                </div>
                <?php get_template_part('includes/sections-globals/sidebar-blog', null, null); ?>
            </section>
        </div>
    </div>
</div>

<?php get_template_part('footer', null, null); ?>