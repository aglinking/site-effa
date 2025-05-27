<?php $marca = get_field('marca', 'option');
switch_to_blog(1); ?>

<form method="get" action="<?= get_home_url(); ?>/seminovos/">
    <?php if (!wp_is_mobile()) : ?>
        <input type="text" name="marca" value="<?= $marca; ?>" class="form-control" readonly>

        <select name="modelo" class="form-select">
            <option value="">Modelo</option>
            <?php
            $marca_id = get_term_by('name', $marca, 'marca');
            // Use a função get_objects_in_term para obter os modelos associados à marca
            $modelos_ids = get_objects_in_term($marca_id->term_id, 'marca');


            // Recupere as informações detalhadas sobre cada modelo
            $terms = get_terms(array(
                'taxonomy' => 'modelo',
                'include' => $modelos_ids,
                'hide_empty' => true
            ));
            // Verifique se existem termos
            if (!empty($terms)) :
                foreach ($terms as $term) :

            ?>
                    <?php if (isset($_GET['modelo']) && $_GET['modelo'] == $term->name) : ?>
                    <?php else : ?>
                        <option value="<?= $term->name; ?>"><?= strtoupper($term->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <?php
        $precos = get_maior_e_menor_preco();
        
        $faixaValoresCarros = gerarFaixaDeCarros($precos['menor'], $precos['maior'], 12000);
        
        ?>


        <select name="preco-max" class="form-select">
            <option value="">
                Faixa de Valores
            </option>
            <?php foreach ($faixaValoresCarros as $faixas) : ?>
                <option value="<?= $faixas; ?>">
                    Até: <?= formatarNumeroEmReais($faixas); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="ano" class="form-select">
            <option value="">
                Faixa de Ano
            </option>
            <?php
            $marca_id = get_term_by('name', $marca, 'marca');
            $anos_ids = get_objects_in_term($marca_id->term_id, 'marca');

            // Recupere todos os termos da taxonomia que têm pelo menos um post associado
            $terms = get_terms(array(
                'taxonomy' => 'ano-de-modelo',
                'include' => $anos_ids,
                'hide_empty' => true, // Isso vai ignorar os termos sem posts
            ));
            // Verifique se existem termos
            if (!empty($terms)) :
                foreach ($terms as $term) :

            ?>
                    <?php if (isset($_GET['ano']) && $_GET['ano'] == $term->name) : ?>
                    <?php else : ?>
                        <option value="<?= $term->name; ?>"><?= $term->name; ?></option>
                    <?php endif; ?>

                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <input type="hidden" name="preco-min" value="<?= $precos['menor']; ?>">

        <button type="submit" class="button button-1">
            buscar
        </button>
    <?php endif; ?>
    <a href="<?= get_home_url(); ?>/seminovos/" target="_blank" class="button button-2">
        estoque completo
    </a>
</form>
<?php restore_current_blog();  ?>