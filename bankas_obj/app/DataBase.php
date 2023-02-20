<?php
namespace App\DB;


interface DataBase
{
    function create(array $accData) : void;


    function update(int
 $accId, array $accData) : void;


    function delete(int
 $accId) : void;


    function show(int $accId) : array;
    
    function showAll() : array;
}
