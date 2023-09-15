<?php
use App\Db\JsonDb;

require __DIR__.'/../vendor/autoload.php';

define('URL', 'http://localhost/lape/database/src/');

// Gaunam duombaze
$db = new JsonDb('users'); 

// $db->create(['name' => 'Bebras', 'psw' => md5('123'), 'full_name' => 'Bebras Upinis']);
// $db->create(['name' => 'Kristina', 'psw' => md5('123'), 'full_name' => 'Kristina Leonaviciute']);
// $db->create(['name' => 'Petras', 'psw' => md5('123'), 'full_name' => 'Peter Johanson']);

$uri = explode('/', str_replace('lape/database/src/', '', $_SERVER['REQUEST_URI']));
array_shift($uri);

$m = $_SERVER['REQUEST_METHOD'];

   // ROUTER
   if ('GET' == $m && count($uri) == 1 && $uri[0] === 'all') {
      echo '<h1>ALL USERS</h1>';
      foreach($db->showAll() as $user) {
      ?>
      <div>ID: <?= $user['id'] ?> NAME: <a href="<?= URL.'user/'.$user['id'] ?>"><?= $user['full_name'] ?></a></div>
      <div><a href="<?= URL.'edit/'.$user['id'] ?>">[EDIT]</a></div>
      <form action="<?= URL.'delete/'.$user['id'] ?>" method="post">
         <button type="submit">DELETE</button>
      </form>
      <?php
      };
    }
    if ('GET' == $m && count($uri) == 2 && $uri[0] === 'user') {
      echo "<h1>USER ID. $uri[1]</h1>";
      $user = $db->show($uri[1]);
      foreach($db->showAll() as $user) {
         if ($user['id'] == $uri[1]) {
      ?>
         <div>ID: <?= $user['id'] ?> NAME: <?= $user['full_name'] ?></div>
      <?php
         }
      }
    }
    if ('POST' == $m && count($uri) == 2 && $uri[0] === 'delete') {
      $db->delete($uri[1]);
      header('Location: '.URL.'all');
      die;
    }
    if ('GET' == $m && count($uri) == 2 && $uri[0] === 'edit') {
      echo "<h1>EDIT USER ID. $uri[1]</h1>";
      $user = $db->show($uri[1]);
      foreach($db->showAll() as $user) {
          if ($user['id'] == $uri[1]) {
      ?>

      <div>ID: <?= $user['id'] ?>
      
      <form action="<?= URL.'edit/'.$user['id'] ?>"  method="post">
      <input type="text" name="name" value="<?= $user['name'] ?>">
      <input type="text" name="full_name" value="<?= $user['full_name'] ?>">
         <button type="submit">SAVE</button>
      </form>
    </div>
      <?php
          }
         }
      }
      if ('POST' == $m && count($uri) == 2 && $uri[0] === 'edit') {
         $user = $db->show($uri[1]);
         $user['name'] = $_POST['name'];
         $user['full_name'] = $_POST['full_name'];
         $db->update($uri[1], $user);
         header('Location: '.URL.'all');
         die;
       }
       if ('GET' == $m && count($uri) == 1 && $uri[0] === 'create') {
         echo "<h1>CREATE USER</h1>";
         ?>
         <form action="<?= URL.'create' ?>" method="post">
         Name: <input type="text" name="name">
         Password: <input type="text" name="psw">
         Full name: <input type="text" name="full_name">
            <button type="submit">SAVE</button>
         </form>
       </div>
         <?php
      }
      if ('POST' == $m && count($uri) == 1 && $uri[0] === 'create') {
         $user['name'] = $_POST['name'];
         $user['psw'] = md5($_POST['psw']);
         $user['full_name'] = $_POST['full_name'];
         $db->create($user);
         header('Location: '.URL.'all');
         die;
      }