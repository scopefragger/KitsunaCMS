<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Taxonomy
{

    public $table = "car";
    public $parent = "Other";
    public $fields = [
        'title' => [
            'type' => 'string',
            'placeholder' => 'Title',
            'label' => 'Title',
            'rules' => 'required'
        ],
        'model' => [
            'type' => 'string',
            'placeholder' => 'Model',
            'label' => 'Model',
            'rules' => 'required'
        ],
        'status' => [
            'type' => 'string',
            'placeholder' => 'Status',
            'label' => 'Status',
            'rules' => 'required'
        ],
        'wheel' => [
            'type' => 'integer',
            'placeholder' => 'Please Select a Wheel',
            'label' => 'Wheel',
            'rules' => 'required'
        ]
    ];

}
