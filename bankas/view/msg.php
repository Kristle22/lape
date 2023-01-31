<?php require __DIR__.'/top.php'; ?>

<?php foreach($messages as $msg) : ?> 

<span class="<?= $msg['type'] ?>"><?= $msg['msg'] ?></span>

<?php endforeach; ?>

<?php require __DIR__.'/bottom.php'; ?>