<?php
namespace App\Db;

interface DataBase
{
    function create(array $data) : void;


    function update(int
 $id, array $data) : void;


    function delete(int
 $id) : void;


    function show(int
 $id) : array;
    
    function showAll() : array;
}
