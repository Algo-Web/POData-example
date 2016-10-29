<?php
namespace PODataExample\models;

use PODataExample\models\EntityTrait;

class Product {

    // This trait contains method for fields mapping (between database table and this class)
    use EntityTrait;

    public $id;
    public $added_at;
    public $name;
    public $weight;
    public $code;
}
