<?php

namespace app\entities;

use yii\db\ActiveRecord;

class Pagination
{
    public $models = [];

    public $total = 0;

    /**
     * Pagination constructor.
     *
     * @param ActiveRecord[] $models
     * @param int $total
     */
    public function __construct($models = [], $total = 0)
    {
        $this->models = $models;
        $this->total = $total;
    }
}