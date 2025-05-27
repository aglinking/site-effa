<form method="get" action="<?= get_home_url(); ?>/seminovos/">
    <?php
    // Obtém a URL atual
    $current_url = home_url(add_query_arg(array(), $wp->request));

    ?>
    <a href="<?= home_url(add_query_arg(array(), $wp->request)); ?>" title="Remover filtros" class="text-filters">Remover filtros X</a>
    <select name="marca" class="form-select" onchange="carregarModelos()" id="selectMarca">
        <option value="<?= isset($_GET['marca']) && $_GET['marca'] != null ? sanitize_text_field($_GET['marca']) : ''; ?>">
            <?= isset($_GET['marca']) && $_GET['marca'] != null ? sanitize_text_field($_GET['marca']) : 'Marca'; ?>
        </option>
        <?php
        // Recupere todos os termos da taxonomia que têm pelo menos um post associado
        $terms = get_terms(array(
            'taxonomy' => 'marca',
            'hide_empty' => true, // Isso vai ignorar os termos sem posts
        ));
        // Verifique se existem termos
        if (!empty($terms)) :
            foreach ($terms as $term) :

        ?>
                <?php if (isset($_GET['marca']) && $_GET['marca'] == $term->name) : ?>
                <?php else : ?>
                    <option value="<?= $term->name; ?>"><?= $term->name; ?></option>
                <?php endif; ?>

            <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <select name="modelo" class="form-select" id="selectModelo">
        <option value="<?= isset($_GET['modelo']) && $_GET['modelo'] != null  ? sanitize_text_field($_GET['modelo']) : ''; ?>">
            <?= isset($_GET['modelo']) && $_GET['modelo'] != null ? strtoupper(sanitize_text_field($_GET['modelo'])) : 'Modelo'; ?>
        </option>

        <?php
        if (isset($_GET['marca']) && !empty($_GET['marca'])) {
            $marca_id = get_term_by('name', sanitize_text_field($_GET['marca']), 'marca');
            // Use a função get_objects_in_term para obter os modelos associados à marca
            $modelos_ids = get_objects_in_term($marca_id->term_id, 'marca');

            // Recupere as informações detalhadas sobre cada modelo
            $terms = get_terms(array(
                'taxonomy' => 'modelo',
                'include' => $modelos_ids,
                'hide_empty' => true
            ));
        } else {
            // Recupere todos os termos da taxonomia que têm pelo menos um post associado
            $terms = get_terms(array(
                'taxonomy' => 'modelo',
                'hide_empty' => true, // Isso vai ignorar os termos sem posts
            ));
        }

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

    <select name="ano" class="form-select">
        <option value="<?= isset($_GET['ano']) && $_GET['ano'] != null  ? sanitize_text_field($_GET['ano']) : ''; ?>">
            <?= isset($_GET['ano']) && $_GET['ano'] != null ? sanitize_text_field($_GET['ano']) : 'Ano'; ?>
        </option>
        <?php
        // Recupere todos os termos da taxonomia que têm pelo menos um post associado
        $terms = get_terms(array(
            'taxonomy' => 'ano-de-modelo',
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
    <div class="grupo-range">
        <label for="price-form" class="text-filters for-slider">Preço:</label>
        <input type="hidden" id="price-form" class="slider-range" readonly>
        <div class="box-group">
            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="text" class="form-control" name="preco-min" id="preco-min" value="" readonly>
            </div>
            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="text" class="form-control" name="preco-max" id="preco-max" value="" readonly>
            </div>
        </div>
        <div id="slider-range-price"></div>
    </div>

    <div class="grupo-range">
        <label for="km-form" class="text-filters for-slider">Quilometragem:</label>
        <input type="hidden" id="km-form" class="slider-range" readonly>
        <div class="box-group">
            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text">KM</span>
                </div>
                <input type="text" class="form-control" name="km-min" id="km-min" value="" readonly>
            </div>
            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text">KM</span>
                </div>
                <input type="text" class="form-control" name="km-max" id="km-max" value="" readonly>
            </div>
        </div>
        <div id="slider-range-km"></div>
    </div>

    <button type="submit" class="button button-1">
        buscar >>
    </button>
</form>


<?php

$precos = get_maior_e_menor_preco();
$km = get_maior_e_menor_km();
?>
<script>
    $(function() {
        $("#slider-range-price").slider({
            range: true,
            min: <?= formatarNumeroEmReais($precos['menor']); ?>,
            max: <?= formatarNumeroEmReais($precos['maior']); ?>,
            values: [<?= formatarNumeroEmReais($precos['menor_select']); ?>, <?= formatarNumeroEmReais($precos['maior_select']); ?>],
            slide: function(event, ui) {
                var precoMin = ui.values[0].toLocaleString('pt-BR', {
                    minimumFractionDigits: 3,
                    maximumFractionDigits: 3
                }).replace(',', '.');
                var precoMax = ui.values[1].toLocaleString('pt-BR', {
                    minimumFractionDigits: 3,
                    maximumFractionDigits: 3
                }).replace(',', '.');

                $("#price-form").val("R$: " + precoMin + " - R$: " + precoMax);
                $("#preco-min").val(precoMin);
                $("#preco-max").val(precoMax);
            }
        });

        var precoInicial = $("#slider-range-price").slider("values", 0).toLocaleString('pt-BR', {
            minimumFractionDigits: 3,
            maximumFractionDigits: 3
        }).replace(',', '.');
        var precoFinal = $("#slider-range-price").slider("values", 1).toLocaleString('pt-BR', {
            minimumFractionDigits: 3,
            maximumFractionDigits: 3
        }).replace(',', '.');

        $("#preco-min").val(precoInicial);
        $("#preco-max").val(precoFinal);
    });
</script>

<script>
    $(function() {
        $("#slider-range-km").slider({
            range: true,
            min: <?= formatarNumeroEmReais($km['menor']); ?>,
            max: <?= formatarNumeroEmReais($km['maior']); ?>,
            values: [<?= formatarNumeroEmReais($km['menor_select']); ?>, <?= formatarNumeroEmReais($km['maior_select']); ?>],
            slide: function(event, ui) {
                var kmMin = ui.values[0].toLocaleString('pt-BR', {
                    minimumFractionDigits: 3,
                    maximumFractionDigits: 3
                }).replace(',', '.');
                var kmMax = ui.values[1].toLocaleString('pt-BR', {
                    minimumFractionDigits: 3,
                    maximumFractionDigits: 3
                }).replace(',', '.');

                $("#km-form").val("KM: " + kmMin + " - KM: " + kmMax);
                $("#km-min").val(kmMin);
                $("#km-max").val(kmMax);
            }
        });

        var kmInicial = $("#slider-range-km").slider("values", 0).toLocaleString('pt-BR', {
            minimumFractionDigits: 3,
            maximumFractionDigits: 3
        }).replace(',', '.');
        var kmFinal = $("#slider-range-km").slider("values", 1).toLocaleString('pt-BR', {
            minimumFractionDigits: 3,
            maximumFractionDigits: 3
        }).replace(',', '.');

        $("#km-min").val(kmInicial);
        $("#km-max").val(kmFinal);
    });
</script>