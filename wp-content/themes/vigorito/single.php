<?php

$post_type = get_post_type();

if ($post_type == "post") {
    get_template_part('templates/single-blog', null, null);
} elseif ($post_type == "veiculos") {
    get_template_part('templates/single-novos-0km', null, null);
} elseif ($post_type == "ofertas") {
    get_template_part('templates/single-ofertas', null, null);
} elseif ($post_type == "promocao-de-servico") {
    get_template_part('templates/single-promocao-servico', null, null);
} elseif ($post_type == "unidades") {
    get_template_part('templates/single-unidade', null, null);
}

