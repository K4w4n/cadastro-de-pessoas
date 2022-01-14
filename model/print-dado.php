<?php
function printDado($dataName, $dataContent)
{
?>
    <div class="dado">
        <label class="data-name"><?= htmlentities($dataName) ?>: </label>
        <label class="data-content"><?= htmlentities($dataContent) ?></label>
    </div>
    <?php
}