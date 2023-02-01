<?php if (!empty($messages)) : ?>
<?php foreach($messages as $msg) : ?> 

<span class="<?= $msg['type'] ?>"><?= $msg['msg'] ?></span>

<?php endforeach; ?>
<?php endif; ?>