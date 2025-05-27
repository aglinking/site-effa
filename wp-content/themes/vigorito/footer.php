</main>
<?php
if (!is_page(4428) && !is_page(4430)):
?>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 content">
                    <?php if (!wp_is_mobile() && !is_page('seminovos')) : ?>

                        <div id="column-footer-1" class="column d-none d-lg-block">
                            <span class="title">
                                modelos
                            </span>
                            <?php
                            $locations = get_nav_menu_locations();
                            $menu = wp_get_nav_menu_object($locations['footer-1']);
                            $items = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
                            $menus = buildTree($items);
                            ?>
                            <ul class="list-links">

                                <?php foreach ($menus as $item) : ?>
                                    <a href="<?= $item['url']; ?>" title="<?= $item['title']; ?>">
                                        <li><?= $item['title']; ?></li>
                                    </a>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                        <!-- <div id="column-footer-2" class="column d-none d-lg-block">
                            <span class="title">
                                VENDAS DIRETAS
                            </span>
                            <?php
                            $locations = get_nav_menu_locations();
                            $menu = wp_get_nav_menu_object($locations['footer-2']);
                            $items = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
                            $menus = buildTree($items);
                            ?>
                            <ul class="list-links">

                                <?php foreach ($menus as $item) : ?>
                                    <a href="<?= $item['url']; ?>" title="<?= $item['title']; ?>">
                                        <li><?= $item['title']; ?></li>
                                    </a>
                                <?php endforeach; ?>

                            </ul>
                            <span class="title">
                                PÓS VENDAS
                            </span>
                            <?php
                            $locations = get_nav_menu_locations();
                            $menu = wp_get_nav_menu_object($locations['footer-3']);
                            $items = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
                            $menus = buildTree($items);
                            ?>
                            <ul class="list-links">

                                <?php foreach ($menus as $item) : ?>
                                    <a href="<?= $item['url']; ?>" title="<?= $item['title']; ?>">
                                        <li><?= $item['title']; ?></li>
                                    </a>
                                <?php endforeach; ?>

                            </ul>
                        </div> -->
                        <div id="column-footer-3" class="column d-none d-lg-block">
                            <span class="title">
                                FACILIDADES
                            </span>
                            <?php
                            $locations = get_nav_menu_locations();
                            $menu = wp_get_nav_menu_object($locations['footer-4']);
                            $items = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
                            $menus = buildTree($items);
                            ?>
                            <ul class="list-links">

                                <?php foreach ($menus as $item) : ?>
                                    <a href="<?= $item['url']; ?>" title="<?= $item['title']; ?>">
                                        <li><?= $item['title']; ?></li>
                                    </a>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                        <div id="column-footer-3" class="column d-none d-lg-block">
                            <span class="title">
                                institucional
                            </span>
                            <?php
                            $locations = get_nav_menu_locations();
                            $menu = wp_get_nav_menu_object($locations['footer-5']);
                            $items = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
                            $menus = buildTree($items);
                            ?>
                            <ul class="list-links">

                                <?php foreach ($menus as $item) : ?>
                                    <a href="<?= $item['url']; ?>" title="<?= $item['title']; ?>">
                                        <li><?= $item['title']; ?></li>
                                    </a>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    <?php endif; ?>
                    <div id="column-footer-4" class="column">
                        <div class="img-otimo-footer">
                            <img src="<?= get_template_directory_uri(); ?>/dist/imgs/otimo-footer.png" alt="">
                        </div>
                        <div class="redes-sociais float-lg-end">
                            <a href="https://www.facebook.com/share/1U97eSY7BF/?mibextid=LQQJ4d" title="Facebook" target="_blank">
                                <i class="fa fa-facebook-square" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.instagram.com/grupo_vigorito?igsh=MTRhanNua2k5bjdqMg==" title="Instagram" target="_blank">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 content-direitos">
                    <p class="vig-direito">
                        © <?= date("Y"); ?> Grupo Vigorito. Todos os direitos reservados.
                    </p>
                    <div class="direito-linking">
                        <a href="https://agencialinking.com.br/" title="Agencia Linking" target="_blank">
                            <img src="<?= get_template_directory_uri(); ?>/dist/imgs/logonovolinking-1.png" alt="Agencia Linking">
                        </a>
                        <a href="https://agencialinking.com.br/" title="Agencia Linking" target="_blank">
                            Desenvolvido por Agência Linking
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php endif; ?>

<?php
if (is_page(4428) || is_page(4430)):
?>
    <div class="footer-lps">
        <div class="container">
            <div class="row">
                <div class="col-12 content-direitos">
                    <p class="vig-direito">
                        © <?= date("Y"); ?> Grupo Vigorito. Todos os direitos reservados.
                    </p>
                    <div class="direito-linking">
                        <a href="https://agencialinking.com.br/" title="Agencia Linking" target="_blank">
                            <img src="<?= get_template_directory_uri(); ?>/dist/imgs/logonovolinking-1.png" alt="Agencia Linking">
                        </a>
                        <a href="https://agencialinking.com.br/" title="Agencia Linking" target="_blank">
                            Desenvolvido por Agência Linking
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php

wp_footer();
include 'includes/scripts-globals.php';


?>

</body>

</html>