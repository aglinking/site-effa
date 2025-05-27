<?php

function cadastroVeiculos()
{
    $post_type = 'semi-novos';
    //delete all posts
    // Argumentos da consulta para obter todos os posts do tipo 'seminovos'
    $args = array(
        'post_type' => $post_type ,
        'posts_per_page' => -1,
    );

    // Obtém os posts do tipo 'seminovos'
    $posts = get_posts($args);

    // Exclui todos os posts do tipo 'seminovos' em uma única chamada
    foreach ($posts as $post) {
        wp_delete_post($post->ID, true); // Exclui o post permanentemente
    }

    // Inclua o WordPress
    require_once('wp-load.php');

    // Caminho para o seu arquivo XML
    $xml_file = 'http://butslof.esy.es/dsautoestoque-all.xml';

    // Carregue o XML
    $xml = simplexml_load_file($xml_file);

    // Itere sobre os veículos no XML
    foreach ($xml->veiculo as $veiculo) {
        // Extraia os dados do XML
        $titulo = (string) $veiculo->modelo . $veiculo->versao;
        $descricao = (string) $veiculo->observacao;
        $marca = (string) $veiculo->marca;


        // Crie ou atualize o post no WordPress
        $post_data = array(
            'post_title'   => $titulo,
            'post_content' => '',
            'post_type'    => $post_type ,
            'post_status'  => 'publish',
            // Adicione mais campos conforme necessário
        );

        $post_id = wp_insert_post($post_data);

        // Se houver ID do post, continue com os metadados
        if ($post_id) {

            // salvando marca
            $taxonomy = 'marca';
            $nome_do_item = (string) $veiculo->marca;
            $termo_existente = term_exists($nome_do_item, $taxonomy);
            // Verifique se o termo já existe antes de adicioná-lo
            if (!$termo_existente) {
                // Se não existir, adicione o termo
                $termo_adicionado = wp_insert_term($nome_do_item, $taxonomy);
                wp_set_post_terms($post_id, $termo_adicionado['term_id'], $taxonomy);
            } else {
                // Se o termo já existir, associe-o ao post diretamente
                wp_set_post_terms($post_id, $termo_existente['term_id'], $taxonomy);
            }


            // salvando ano fabricação
            $taxonomy = 'ano-de-fabricacao';
            $nome_do_item = (string) $veiculo->anofabricacao;
            $termo_existente = term_exists($nome_do_item, $taxonomy);
            // Verifique se o termo já existe antes de adicioná-lo
            if (!$termo_existente) {
                // Se não existir, adicione o termo
                $termo_adicionado = wp_insert_term($nome_do_item, $taxonomy);
                wp_set_post_terms($post_id, $termo_adicionado['term_id'], $taxonomy);
            } else {
                // Se o termo já existir, associe-o ao post diretamente
                wp_set_post_terms($post_id, $termo_existente['term_id'], $taxonomy);
            }


            // salvando ano modelo
            $taxonomy = 'ano-de-modelo';
            $nome_do_item = (string) $veiculo->anomodelo;
            $termo_existente = term_exists($nome_do_item, $taxonomy);
            // Verifique se o termo já existe antes de adicioná-lo
            if (!$termo_existente) {
                // Se não existir, adicione o termo
                $termo_adicionado = wp_insert_term($nome_do_item, $taxonomy);
                wp_set_post_terms($post_id, $termo_adicionado['term_id'], $taxonomy);
                // Associe a marca desejada ao modelo (ajuste 'marca' conforme sua taxonomia)
                wp_set_object_terms($termo_adicionado['term_id'], $marca, 'marca', true);
            } else {
                // Se o termo já existir, associe-o ao post diretamente
                wp_set_post_terms($post_id, $termo_existente['term_id'], $taxonomy);
                wp_set_object_terms($termo_existente['term_id'], $marca, 'marca', true);
            }

            // salvando modelo
            $taxonomy = 'modelo';
            $nome_do_item = (string) $veiculo->modelo;
            $termo_existente = term_exists($nome_do_item, $taxonomy);
            // Verifique se o termo já existe antes de adicioná-lo
            if (!$termo_existente) {
                // Se não existir, adicione o termo
                $termo_adicionado = wp_insert_term($nome_do_item, $taxonomy);
                wp_set_post_terms($post_id, $termo_adicionado['term_id'], $taxonomy);

                // Associe a marca desejada ao modelo (ajuste 'marca' conforme sua taxonomia)
                wp_set_object_terms($termo_adicionado['term_id'], $marca, 'marca', true);
            } else {
                // Se o termo já existir, associe-o ao post diretamente
                wp_set_post_terms($post_id, $termo_existente['term_id'], $taxonomy);
                wp_set_object_terms($termo_existente['term_id'], $marca, 'marca', true);
            }


            // Adicione metadados personalizados (exemplo com preço)
            $modelo = (string) $veiculo->modelo;
            $versao = (string) $veiculo->versao;
            $preco = (string) $veiculo->preco;
            $preco_sem_rs = str_replace('R$', '', $preco);
            $preco_sem_rs = formatarNumeroParaBanco($preco_sem_rs);
            $preco = (string) $veiculo->preco;
            // Remover caracteres não numéricos
            $preco = preg_replace('/[^0-9]/', '', $preco);
            // Converter para número
            $preco = floatval($preco);
            $cor = (string) $veiculo->cor;
            $caixaCambio = (string) $veiculo->cambio;
            $quilometragem = (string) $veiculo->km;
            $anofabricacao = (string) $veiculo->anofabricacao;
            $anomodelo = (string) $veiculo->anomodelo;
            $combustivel = (string)  $veiculo->combustivel;
            $observacoes = (string) $veiculo->observacao;

            $opcionais = [];
            foreach ($veiculo->opcionais->opcional as $opcional) {
                $opcionais[] = array('texto' => (string) $opcional);
            }

            // Obtém os valores atuais do campo repetidor 'opcionais'
            $existing_opcionais = get_post_meta($post_id, 'opcionais', true);

            // Adiciona os novos valores ao array existente
            if (is_array($existing_opcionais)) {
                $existing_opcionais = array_merge($existing_opcionais, $opcionais);
            } else {
                $existing_opcionais = $opcionais;
            }

            $complementos = [];
            foreach ($veiculo->complementos->complemento as $complemento) {
                $complementos[] = array('texto' => (string) $complemento);
            }

            // Obtém os valores atuais do campo repetidor 'complementos'
            $existing_complementos = get_post_meta($post_id, 'complementos', true);

            // Adiciona os novos valores ao array existente
            if (is_array($existing_complementos)) {
                $existing_complementos = array_merge($existing_complementos, $complementos);
            } else {
                $existing_complementos = $complementos;
            }

            $acessorios = [];
            foreach ($veiculo->acessorios->acessorio as $acessorio) {
                $acessorios[] = array('texto' => (string) $acessorio);
            }

            // Obtém os valores atuais do campo repetidor 'acessorios'
            $existing_acessorios = get_post_meta($post_id, 'acessorios', true);

            // Adiciona os novos valores ao array existente
            if (is_array($existing_acessorios)) {
                $existing_acessorios = array_merge($existing_acessorios, $acessorios);
            } else {
                $existing_acessorios = $acessorios;
            }


            $fotos = [];
            foreach ($veiculo->fotos->foto as $foto) {
                $fotos[] = array('url' => (string) $foto);
            }

            // Obtém os valores atuais do campo repetidor 'fotos'
            $existing_fotos = get_post_meta($post_id, 'fotos', true);

            // Adiciona os novos valores ao array existente
            if (is_array($existing_fotos)) {
                $existing_fotos = array_merge($existing_fotos, $fotos);
            } else {
                $existing_fotos = $fotos;
            }

            // Processar complementos
            update_post_meta($post_id, 'nome', $modelo);
            update_post_meta($post_id, 'versao', $versao);
            update_post_meta($post_id, 'preco', $preco_sem_rs);
            update_post_meta($post_id, 'preco_formatado', $preco_sem_rs);
            update_post_meta($post_id, 'cor', $cor);
            update_post_meta($post_id, 'caixa_de_cambio', $caixaCambio);
            update_post_meta($post_id, 'quilometragem', $quilometragem);
            update_post_meta($post_id, 'ano_fabricacao', $anofabricacao);
            update_post_meta($post_id, 'ano_modelo', $anomodelo);
            update_post_meta($post_id, 'combustivel', $combustivel);
            update_post_meta($post_id, 'observacoes', $observacoes);
            update_field('opcionais', $existing_opcionais, $post_id);
            update_field('complementos', $existing_complementos, $post_id);
            update_field('acessorios', $existing_acessorios, $post_id);
            update_field('fotos', $existing_fotos, $post_id);
        }
    }
}
