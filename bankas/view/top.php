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
  background: linear-gradient(rgba(27, 43, 91, 0.9), rgba(67, 101, 124, 0.1)), url('./img/banking_background.jpg') center/cover;
  width: 100%;
  height: 100vh;
}
.title {
  text-align: center;
  color: white;
}
h2.title {
  font-size: 30px;
  margin-top: 80px;
}
.row {
  display: flex;
}
.row ul, ul.row {
  list-style-type: none;
  display: flex;
  border-bottom: 1px solid gray;
  margin: 0 30px 0 40px;
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
input:focus, select:focus {
  outline: none;
  background: #ddf3fdf5;
}
select {
  width: 260px;
  height: 26px;
  border: none;
  border-radius: 3px;
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
}
.new label {
  display: inline-block;
  width: 120px;
}
.new input {
  width: 250px;
  padding: 8px;
  border: none;
  border-radius: 3px;
}
.acc div:first-child {
  margin-bottom: 20px;
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
p.error {
  margin: -5px 0 0 120px;
  font-weight: bold;
  color: red;
  width: fit-content;
  padding: 5px;
  border-radius: 3px;
}
.errBox {
  height: 25px;
}
  </style>
</head>
<body class="account">
<ul class="meniu">
    <li class="<?= ($_GET['route'] ?? '') == '' ? 'active' : '' ?>"><a href="<?= URL ?>" >SĄSKAITŲ SĄRAŠAS</a></li>
    <li class="<?= ($_GET['route'] ?? '') == 'new' ? 'active' : '' ?>"><a href="<?= URL ?>?route=new">NAUJA SĄSKAITA</a></li>
</ul>