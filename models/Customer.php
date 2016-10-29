<?php
namespace PODataExample\models;

use PODataExample\models\EntityTrait;

class Customer {

    // This trait contains method for fields mapping (between database table and this class)
    use EntityTrait;

    public $ID;
    public $Name;
    public $Staff;
    public $Photo;
}
