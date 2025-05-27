<!doctype html>

<html lang="pt">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="<?= get_template_directory_uri(); ?>/dist/imgs/favicon.ico" type="image/x-icon">

  <title><?= wp_title('|') ?></title>

  <?php wp_head(); ?>

  <script>
    if (window.history.replaceState) {

      window.history.replaceState(null, null, window.location.href);

    }
  </script>
  
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K6XHL4FP');</script>
<!-- End Google Tag Manager -->



</head>


<body class="<?= str_replace(".php", "", get_page_template_slug()) ?> <?= $args['class']; ?>  <?= (get_field('esse_site_pode_ter_bordas_circulares', 'option')) ? '' : 'no-border-theme'; ?>">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6XHL4FP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <?php



  $queryUnidades = array(
    'post_type'      => 'unidades',
    'posts_per_page' => -1,
  );

  $unidades = get_posts($queryUnidades);
  ?>

  <div id="navigator-mc">
    <div class="container">
      <div class="row">
        <div class="col-12 d-lg-flex justify-content-end">
          
          <?php if (!wp_is_mobile()) : ?>
            <div class="gn d-none d-lg-flex">
              <?php if ($unidades) : ?>
                <div class="hover-collapse">
                  <a data-bs-toggle="collapse" href="#collapseunidade" role="button" aria-expanded="false" aria-controls="collapseunidade" class="button button-1" title="Unidades">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    Unidades
                  </a>
                  <div class="collapse box-menus-items" id="collapseunidade">
                    <div class="card card-body">
                      <ul>
                        <?php
                        foreach ($unidades as $unidade) :
                          setup_postdata($unidade);
                        ?>
                          <li>
                            <a href="<?= get_permalink($unidade->ID); ?>" title="<?= strip_tags($unidade->post_title); ?>">
                              <?= $unidade->post_title; ?>
                            </a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php wp_reset_postdata();
              endif; ?>


              <div class="hover-collapse">

                <a data-bs-toggle="collapse" href="#collapsetelefone" role="button" aria-expanded="false" aria-controls="collapsetelefone" class="button button-1" title="Telefones">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  Telefones
                </a>
                <div class="collapse box-menus-items" id="collapsetelefone">
                  <div class="card card-body">
                    <select name="unidade" class="unidade-select-for-phone form-select" required>
                      <?php
                      foreach ($unidades as $unidade) :  setup_postdata($unidade);
                      ?>
                        <option value='
                                                            <?php if (get_field('telefone_loja', $unidade->ID) != "") : ?>
                                                                <a href="tel:<?= formatNumber(get_field('telefone_loja', $unidade->ID)); ?>">
                                                                    <p class="pb-1 mb-0">telefone: <?= get_field('telefone_loja', $unidade->ID); ?></p>
                                                                    </a>
                                                            <?php endif; ?>

                                                            <?php if (get_field('telefone_oficina', $unidade->ID) != "") : ?>
                                                            <a href="tel:<?= formatNumber(get_field('telefone_oficina', $unidade->ID)); ?>">
                                                                <p class="pb-1 mb-0">oficina: <?= get_field('telefone_oficina', $unidade->ID); ?></p>
                                                            </a>
                                                            <?php endif; ?>
                                                            '>
                          <?= $unidade->post_title; ?>
                        </option>
                      <?php endforeach;
                      wp_reset_postdata(); ?>
                    </select>
                    <div class="messagem-phone">
                      <?php if (get_field('telefone_loja', $unidades[0]->ID) != "") : ?>
                        <a href="tel:<?= formatNumber(get_field('telefone_loja', $unidades[0]->ID)); ?>">
                          <p class="pb-1 mb-0">telefone: <?= get_field('telefone_loja', $unidades[0]->ID); ?></p>
                        </a>
                      <?php endif; ?>
                      <?php if (get_field('telefone_oficina', $unidades[0]->ID) != "") : ?>
                        <a href="tel:<?= formatNumber(get_field('telefone_oficina', $unidades[0]->ID)); ?>">
                          <p class="pb-1 mb-0">oficina: <?= get_field('telefone_oficina', $unidades[0]->ID); ?></p>
                        </a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>

              <a href="<?= get_home_url(); ?>/contato/" class="button button-1" title="Agendar Revisão">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                Fale Conosco
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <header>
    <div class="container">
      <div class="row">
        <div class="col-12 col-items">
          <div>
            <a href="<?= get_home_url(); ?>" class="container-logo">
              <img src="<?= get_template_directory_uri(); ?>/dist/imgs/logo-oficial.png" class="logo" alt="Vigorito Effa">
            </a>
            <span class="hamb"></span>
          </div>
          <div id="nav-menu-container">
            <nav class="navbar navbar-expand-lg nav-content-full ">
              <div class="collapse navbar-collapse offcanvas-collapse" id="navbarNav">
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object((!wp_is_mobile()) ? $locations['header'] : $locations['header-mobile']);
                $items = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
                $menus = buildTree($items);
                ?>
                <ul class="navbar-nav">
                  <?php $contMenu = 0; ?>
                  <?php foreach ($menus as $item) : ?>
                    <?php $contMenu++;
                    
                     // Obtém as classes do item de menu (array de classes)
                                $menuClasses = !empty($item['classes']) ? array_filter($item['classes']) : [];
                                // Filtra classes vazias e junta em uma string
                                $menuClassesString = implode(' ', $menuClasses);

                    $current_url = home_url('/' . get_post_field('post_name', get_post()) . '/');
                    if ($item['url'] == $current_url) {
                      $menuActive = 'menu-active';
                    } else if ($item['url'] ==  home_url('/') && is_front_page()) {
                      $menuActive = "menu-active";
                    } else if (is_tax('categorias-de-produtos') && $item['title'] == "Catálogo") {
                      $menuActive = "menu-active";
                    } else {
                      $menuActive = "";
                    } ?>
                    <?php if (empty($item['children']) && !isset($item['children'])) : ?>
                      <li class="nav-item">
                        <a class="nav-link <?= $menuActive; ?> <?= esc_attr($menuClassesString); ?> " href="<?= $item['url']; ?>" title="<?= $item['title']; ?>"><?= $item['title']; ?>
                          <span class="title-before"></span>
                        </a>
                      </li>
                    <?php else :   ?>
                      <?php if (!wp_is_mobile()) : ?>
                        <li class="nav-item dropdown d-none d-lg-block">
                          <a class="nav-link  <?= $menuActive; ?> dropdown-toggle" title="<?= $item['url']; ?>" href="<?= $item['url']; ?>">
                            <?= $item['title']; ?>
                            <span class="title-before"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <div class="container">
                              <div class="row">
                                <div class="col-12 column-list">
                                  <?php foreach ($item['children'] as $category) : ?>
                                    <li class="nav-item dropend">
                                      <a class="dropdown-item" title="<?= $category['title']; ?>" href="<?= $category['url']; ?>">
                                        <?= $category['title']; ?>
                                      </a>
                                      <?php if (isset($category['children']) && $category['children']) : ?>
                                        <div class="dropdown-menu-sub">
                                          <?php foreach ($category['children'] as $subCategory) : ?>
                                            <a class="dropdown-item" href="<?= $subCategory['url']; ?>" title="<?= $subCategory['title']; ?>">• <?= $subCategory['title']; ?></a>
                                          <?php endforeach; ?>
                                        </div>
                                      <?php endif; ?>
                                    </li>
                                  <?php endforeach; ?>
                                </div>
                              </div>
                            </div>
                          </ul>
                        </li>
                      <?php endif; ?>
                      <?php if (wp_is_mobile()) : ?>
                        <div class="dropdown d-lg-none">
                          <a class="nav-link dropdown-toggle d-lg-none link-drop-mob collapsed" data-bs-toggle="collapse" href="#collapseExample<?= str_replace(' ', '', $item['title']); ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?= str_replace(' ', '', $item['title']); ?>">
                            <?= $item['title']; ?>
                          </a>
                          <div class="collapse" id="collapseExample<?= str_replace(' ', '', $item['title']); ?>">
                            <?php $contN1 = 0; ?>
                            <?php if (!empty($item['children']) && isset($item['children'])) : ?>

                              <?php foreach ($item['children'] as $category) : $contN1++; ?>
                                <?php if (!empty($category['children']) && isset($category['children'])) : ?>
                                  <a class="dropdown-item dropdown-toggle link-drop-mob collapsed" data-bs-toggle="collapse" href="#collapseExample<?= $item['title'] . $contN1; ?>-sub" role="button" aria-expanded="false" aria-controls="collapseExample<?= $item['title'] . $contN1; ?>-sub">
                                    <?= $category['title']; ?>
                                  </a>
                                <?php else : ?>
                                  <a class="dropdown-item" href="<?= $category['url']; ?>" title="<?= $category['title']; ?>">
                                    <?= $category['title']; ?>
                                  </a>
                                <?php endif; ?>
                                <?php if (!empty($category['children']) && isset($category['children'])) : ?>
                                  <div class="collapse sub-box-drop" id="collapseExample<?= $item['title'] . $contN1; ?>-sub">
                                    <?php $contN2 = 0; ?>
                                    <?php foreach ($category['children'] as $categoryN2) : ?>
                                      <a class="dropdown-item" href="<?= $categoryN2['url']; ?>" title="<?= $categoryN2['title']; ?>"> <?= $categoryN2['title']; ?></a>
                                    <?php endforeach; ?>
                                  </div>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </div>
                        </div>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
                <?php if (wp_is_mobile()) : ?>
                  <div class="gn d-lg-none">
                    <?php if ($unidades) : ?>
                      <a data-bs-toggle="collapse" href="#collapseunidade" role="button" aria-expanded="false" aria-controls="collapseunidade" class="button button-1" title="Unidades">
                        <!-- <i class="fa fa-map-marker" aria-hidden="true"></i> -->
                        Unidades
                      </a>
                      <div class="collapse box-menus-items" id="collapseunidade">
                        <div>
                          <ul>
                            <?php
                            foreach ($unidades as $unidade) :  setup_postdata($unidade);
                            ?>

                              <li>
                                <a href="<?= get_permalink($unidade->ID); ?>" title="Unidade">
                                  <?= $unidade->post_title; ?>
                                </a>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </div>
                      </div>
                    <?php wp_reset_postdata();
                    endif; ?>


                    <?php if ($unidades) : ?>
                      <a data-bs-toggle="collapse" href="#collapsetelefone" role="button" aria-expanded="false" aria-controls="collapsetelefone" class="button button-1" title="Telefones">
                        <!-- <i class="fa fa-phone" aria-hidden="true"></i> -->
                        Telefones
                      </a>
                      <div class="collapse box-menus-items" id="collapsetelefone">
                        <div class="card card-body">
                          <select name="unidade" class="unidade-select-for-phone form-select" required>
                            <?php
                            foreach ($unidades as $unidade) :  setup_postdata($unidade);
                            ?>
                              <option value='
                                                            <?php if (get_field('telefone_loja', $unidade->ID) != "") : ?>
                                                                <a href=" tel:<?= formatNumber(get_field('telefone_loja', $unidade->ID)); ?>">
                                                                    <p class="pb-1 mb-0">telefone: <?= get_field('telefone_loja', $unidade->ID); ?></p>
                                                                    </a>
                                                            <?php endif; ?>

                                                            <?php if (get_field('telefone_oficina', $unidade->ID) != "") : ?>
                                                            <a href="tel:<?= formatNumber(get_field('telefone_oficina', $unidade->ID)); ?>">
                                                                <p class="pb-1 mb-0">oficina: <?= get_field('telefone_oficina', $unidade->ID); ?></p>
                                                            </a>
                                                            <?php endif; ?>
                                                            '>
                                <?= $unidade->post_title; ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                          <div class="messagem-phone">
                            <?php if (get_field('telefone_loja', $unidades[0]->ID) != "") : ?>
                              <a href="tel:<?= formatNumber(get_field('telefone_loja', $unidades[0]->ID)); ?>">
                                <p class="pb-1 mb-0">telefone: <?= get_field('telefone_loja', $unidades[0]->ID); ?></p>
                              </a>
                            <?php endif; ?>
                            <?php if (get_field('telefone_oficina', $unidades[0]->ID) != "") : ?>
                              <a href="tel:<?= formatNumber(get_field('telefone_oficina', $unidades[0]->ID)); ?>">
                                <p class="pb-1 mb-0">oficina: <?= get_field('telefone_oficina', $unidades[0]->ID); ?></p>
                              </a>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    <?php wp_reset_postdata();
                    endif; ?>
                  </div>
                <?php endif; ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var selectElement = document.querySelector('.unidade-select-for-phone');
      var messageDiv = document.querySelector('.messagem-phone');

      if (selectElement && messageDiv) {
        selectElement.addEventListener('change', function() {
          // Obtenha o valor selecionado do select
          var selectedOption = selectElement.options[selectElement.selectedIndex];
          var selectedValue = selectedOption.value;

          // Atualize o conteúdo da div de mensagem
          messageDiv.innerHTML = selectedValue;
        });
      } else {
        console.error('Elementos não encontrados: .unidade-select-for-phone ou .messagem-phone');
      }
    });
  </script>
  <!-- FIM HEADER -->
  <main id="<?= $args['page']; ?>" class="<?= $args['class']; ?>">

    <h1 class="visually-hidden position-absolute"><?= get_the_title(); ?></h1>