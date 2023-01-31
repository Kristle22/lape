<?php if (!empty($messages)) : ?>
<div class="container">
  <div class="row">
  <?php foreach ($messages as $mes) : ?>
    
    <div class="alert alert-<?= $mes['type'] ?>" role="alert">
      <?= $mes['msg'] ?>
    </div>
    
  <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>