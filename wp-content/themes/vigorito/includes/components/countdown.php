<div class="countdown countdown<?= $args['id']; ?>">
    <div class="column-1">
        <strong>Restam</strong><br>
        Apenas
    </div>
    <div class="column-2">
        <div class="box">
            <div class="numbers" data-unit="days">
                00
            </div>
            dias
        </div>
        <span class="divisor">:</span>
        <div class="box">
            <div class="numbers" data-unit="hours">
                00
            </div>
            Horas
        </div>
        <span class="divisor">:</span>
        <div class="box">
            <div class="numbers" data-unit="minutes">
                00
            </div>
            Minutos
        </div>
        <span class="divisor">:</span>
        <div class="box">
            <div class="numbers" data-unit="seconds">
                00
            </div>
            Segundos
        </div>
    </div>
</div>

<script>
    // startCountdown("countdown<?= $args['id']; ?>", "2023-12-10T12:00:00", "2023-12-15T18:30:00", "countdown<?= $args['id']; ?>");
    startCountdown("countdown<?= $args['id']; ?>", "<?= $args['data_ini']; ?>", "<?= $args['data_fim']; ?>", "countdown<?= $args['id']; ?>");
</script>