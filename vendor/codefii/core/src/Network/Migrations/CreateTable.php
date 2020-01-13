<?php
namespace Codefii\Migrations;
class CreateTable {
    public $tableName;
    public function add($tableName,$function){
        if(is_callable($function)){
            $function(get_called_class());
        }
    }
}