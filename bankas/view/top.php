<!-- <?php ob_start(); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BANKAS</title>
  <style>
    /* meniu */
body {
  box-sizing: border-box;
}
.container {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.bank {
  width: 100%;
  height: 101%;
  margin: 0 0 -10px -10px;
  background: #569fff url('./img/Bank.png') no-repeat fixed bottom;
}
.bank h1 {
  padding: 70px 0 0 20px;
}
ul.meniu {
  position: fixed;
  top: 0;
  width: 100%;
  margin: 0 0 0 -8px;
  padding: 1.6%;
  overflow: hidden;
  background: #ddf3fd;
  list-style-type: none;
  display: flex;
  gap: 5px;
}
.meniu li, li.login, .logout button {
  padding: 10px;
  background-color: #ddd;
  border-radius: 5px;
  border: none;
  min-height: 100%;
  cursor: pointer;
  display: flex;
  align-items: center;
  
}
.meniu li:hover, .logout button:hover, .login button:hover {
  background-color: #ccc;
}
a, .logout button {
  color: #333;
  text-decoration: none;
  font-size: 16px;
}
/* sarasas */
.account {
  background: linear-gradient(rgba(27, 43, 91, 0.5), rgba(67, 101, 124, 0.5)), url('./img/banking_background.jpg') center/cover;
  width: 100%;
  height: 100vh;
}
.title {
  text-align: center;
  color: white;
}
h2.title {
  font-size: 30px;
  margin-top: 100px;
}
.title h1 {
  font-size: 50px;
}
.title div {
  display: flex;
  gap: 100px;
}
.title.info {
  margin: 0 auto;
  padding: 5px 10px 3px 10px;
  width: fit-content;
  border: 2px solid #ccc;
  border-radius: 5px;
}
h1 span {
  font-size: 20px;
}
.row {
  display: flex;
  justify-content: space-between;
  width: 100%;
}
.row li {
  padding: 5px 10px;
  word-wrap: break-word;
  font-size: 16px;
}
ul {
  list-style-type: none;
  display: flex;
  border-bottom: 1px solid gray;
  margin: 0px;
}
ul.row {
  font-weight: bold;
  width: 65%;
}
ul.cap {
  font-size: 18px;
  min-width: 70%;
}
ul.row * {
  min-width: 17%; 
}
ul.cap * {
  width: 17%;
}
input:focus, select:focus {
  outline: none;
  background: #ddf3fdf5;
}
select {
  width: 250px;
  height: 33px;
  border: none;
  border-radius: 3px;
}
.new.convert input {
  width: 230px;
  height: 20px;
}
.links {
  display: flex;
  flex-wrap: wrap;
  gap: 5px;
  margin: 20px 40px 0 0;
}
.links * {
  border: none;
  color: #555;
  padding: 5px 6px;
  background-color: #ddd;
  border-radius: 5px;
  cursor: pointer;
  display: flex;
  align-items: center;
}
.links *:hover {
  background: #ccc;
  color: crimson;
}
li.active {
  background-color: #ccc;
}
li.active a {
  font-weight: bold;
  color: crimson;
}

/* nauja saskaita */
form.new {
  display: flex;
  align-items: center;
  flex-direction: column;
  gap: 8px;
  padding-top: 30px;
}
label {
  text-transform: uppercase;
  font-size: 14px;
  color: #fff;
}
.new div {
  min-height: 50px;
  max-height: 50px;
}
.new label {
  display: inline-block;
  width: 120px;
}
.new input {
  width: 295px;
  padding: 8px;
  border: none;
  border-radius: 3px;
}

.new button, .login button {
  border: none;
  color: #555;
  padding: 10px;
  background-color: #ddd;
  border-radius: 5px;
  margin: 15px 0 0 250px;
  cursor: pointer;
  font-weight: bold;
}

.sum {
 margin-left: 125px;
}
.sum span {
  display: block;
  font-size: 14px;
  margin: 5px 0 0 100px;
}
button.transfer {
  margin-right: -70px;
}
.error {
  margin: -5px 0 0 120px;
  font-weight: bold;
  color: red;
  width: fit-content;
  padding: 5px;
  border-radius: 3px;
}
.success , .warning, .danger {
  position: absolute;
  z-index: 999;
  top: 20px;
  right: 20px;
  color: crimson;
  padding: 15px 15px;
  max-width: 200px;
  border-radius: 5px;
  font-size: 18px;
  font-weight: bold;
}
.success {
  background: #aaddaaee;
}
.warning {
  background: #eeddaaee;
}
.danger {
  background: #ff7777ee;
  color: #fff;
}
/* LOGIN */
.login {
  display: flex;
  flex-wrap: wrap;
  gap: 25px;
  align-items: center;
  max-width: 380px;
  justify-content: end;
  padding: 50px;
  border-radius: 3px;
  border: 2px solid #18618E; 
  background: #18618Eaa;
}
.login * {
  display: flex;
  flex-direction: column;
  align-items: end;
}
.login label {
  width: 80px;
  align-items: start;
}
.login input {
  height: 33px;
  width: 250px;
  border-radius: 3px;
  border: none;
}
.login small {
  color: #ddd;
}
  </style>
</head>
<body class="account">
<ul class="meniu">
  <li class="<?= ($_GET['route'] ?? '') == 'home' ? 'active' : '' ?>"><a href="<?= URL ?>?route=home">BANKAS</a></li>
  <?php if (isLogged()) : ?>
    <li class="<?= ($_GET['route'] ?? '') == '' ? 'active' : '' ?>"><a href="<?= URL ?>">SĄSKAITŲ SĄRAŠAS</a></li>
    <li class="<?= ($_GET['route'] ?? '') == 'new' ? 'active' : '' ?>"><a href="<?= URL ?>?route=new">NAUJA SĄSKAITA</a></li>
    <li class="<?= ($_GET['route'] ?? '') == 'convert' ? 'active' : '' ?>"><a href="<?= URL ?>?route=convert">VALIUTOS KONVERTERIS</a></li>
    <form class="logout" action="<?= URL ?>?route=logout" method="post">
      <button type="submit">ATSIJUNGTI, <?= $_SESSION['name'] ?? '' ?></button>
    </form>
  <?php else : ?>
    <li class="<?= ($_GET['route'] ?? '') == 'login' ? 'active' : '' ?>"><a href="<?= URL ?>?route=login">PRISIJUNGTI</a></li>
  <?php endif; ?>
</ul>

<?php showMessage(); ?>