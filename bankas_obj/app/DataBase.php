<?php
namespace App\DB;


interface DataBase
{
    function create(array $bankData) : void;


    function update(int
 $bankId, array $bankData) : void;


    function delete(int
 $bankId) : void;


    function show(int
 $bankId) : array;
    
    function showAll() : array;
}
