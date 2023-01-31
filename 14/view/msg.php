<?php if (!empty($messages)) : ?>
<div class="container">
  <div class="row">
    <div class="col-12">
    <?php foreach ($messages as $mes) : ?>
    
      <div class="alert alert-<?= $mes['type'] ?>" role="alert">
        <?= $mes['msg'] ?>
      </div>
    
    <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>