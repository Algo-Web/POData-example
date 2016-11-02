<?php
namespace PODataExample\models;

use PODataExample\models\EntityTrait;

class customer {

    // This trait contains method for fields mapping (between database table and this class)
    use EntityTrait;

    public $id;
    public $name;
    public $staff;
    public $photo;
}
