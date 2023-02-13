<?php require __DIR__.'/top.php'; ?>

      <div class="container">
        <form class="login" action="<?= URL ?>login" method="post">
          <label>El. paštas</label>
          <div>
            <input type="text" name="email">
            <small>Įveskite prisijungimo el. paštą.</small>
          </div>
          <label>Slaptažodis</label>
          <div>
            <input type="password" name="pass">
            <small>Įveskite prisijungimo slaptažodį.</small>
          </div>
          <button type="submit">Prisijungti</button>
        </form>
      </div>
  
<?php require __DIR__.'/bottom.php'; ?>