<?php
namespace App\DB;


interface DataBase
{
    function create(array $uztvankaData) : void;


    function update(int
 $uztvankaId, array $uztvankaData) : void;


    function delete(int
 $uztvankaId) : void;


    function show(int
 $uztvankaId) : array;
    
    function showAll() : array;
}
