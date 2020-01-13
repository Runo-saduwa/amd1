<?php 
namespace Codefii\Migrations;
class Migrations extends TableCommands{
    public function __construct(){
        $this->up();
        $this->down();
    }
}
