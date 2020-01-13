<?php
namespace App\Models;
use Codefii\Entity\orm\Fiirm;
class Contact extends Fiirm {
    public $pk = 'id';
    public $table = 'contact';
    public $columns = array(
        'user_id','address'
    );
}