<?php require __DIR__.'/virsus.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sukurti naują užtvanką</h5>
          <form action="<?= URL ?>?route=nauja" method="post">
            <div>
              <button class="btn btn-warning" type="submit">Pridėti</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  
<?php require __DIR__.'/apacia.php'; ?>