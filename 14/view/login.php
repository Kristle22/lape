<?php require __DIR__.'/virsus.php'; ?>

<div class="container">
    <div class="row">
      <div class="col-6 m-4">
        <form action="<?= URL ?>?route=login" method="post" class=" m-4 login-form">
          <div class="form-group">
            <label>Vardas</label>
            <input type="text" class="form-control" name="name">
            <small id="emailHelp" class="form-text text-muted">Įveskite prisijungimo vardą.</small>
          </div>
          <div class="form-group">
            <label>Slaptažodis</label>
            <input type="password" class="form-control" name="pass">
            <small id="emailHelp" class="form-text text-muted">Įveskite prisijungimo slaptažodį.</small>
          </div>
          <button type="submit" class="btn btn-warning">Prisijungti</button>
        </form>
      </div>
    </div>
  </div>
  
<?php require __DIR__.'/apacia.php'; ?>