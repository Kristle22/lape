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
.bank {
  background: #569fff url('./img/Bank.png') no-repeat fixed center;
}
.meniu {
  list-style-type: none;
  display: flex;
  gap: 10px;
}
.meniu li {
  padding: 10px;
  background-color: #ddd;
  border-radius: 5px;
}
.meniu li:hover {
  background-color: #ccc;
}
a {
  text-decoration: none;
}

/* sarasas */
.account {
  background: #ddf3fdf5 url('./img/banking_background.jpg') no-repeat fixed center;
  width: 100%;
}
.title {
  text-align: center;
  color: white;
}
.row {
  display: flex;
}
.row ul, ul.row {
  list-style-type: none;
  display: flex;
  border-bottom: 1px solid gray;
  margin: 0 10px 0 40px;
  padding: 0;
}
ul.row {
  font-weight: bold;
}
.row li {
  padding: 5px 15px;
  word-wrap: break-word;
  font-size: 16px;
}
.cap {
  font-size: 18px;
}
ul.row, ul.cap{
  width: 65%;
}
ul.row *, ul.cap * {
  min-width: 16%;
}
.links {
  display: flex;
  flex-wrap: wrap;
  gap: 5px;
  margin: 10px 10px 0 0;
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
.new {
  display: flex;
  align-items: center;
  flex-direction: column;
  gap: 8px;
}
.new label {
  display: inline-block;
  width: 120px;
}
.new input {
  width: 250px;
  padding: 5px;
  border: none;
  border-radius: 3px;
}
.new button {
  border: none;
  color: #555;
  padding: 10px;
  background-color: #ddd;
  border-radius: 5px;
  margin: 15px 0 0 250px;
  cursor: pointer;
  font-weight: bold;
}
  </style>
</head>
<body class="account">
<ul class="meniu">
    <li class="<?= ($_GET['route'] ?? '') == '' ? 'active' : '' ?>"><a href="<?= URL ?>" >SĄSKAITŲ SĄRAŠAS</a></li>
    <li class="<?= ($_GET['route'] ?? '') == 'new' ? 'active' : '' ?>"><a href="<?= URL ?>?route=new">NAUJA SĄSKAITA</a></li>
</ul>