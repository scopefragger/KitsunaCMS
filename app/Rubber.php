<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubber extends Taxonomy
{

    public $table = "rubber";
    public $parent = "Other";
    public $fields = [
        'title' => [
            'type' => 'string',
            'placeholder' => 'Title',
            'label' => 'Title',
            'rules' => 'required',
            'table' => 'true'
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
        ]
    ];


    public $relations = [
        'hasMany' => [
            'wheel' => [
                'item' => 'wheel',
                'local' => 'rubber',
                'remote' => 'id'
            ],
            'wheel' => [
                'item' => 'wheel',
                'local' => 'rubber',
                'remote' => 'id'
            ],

            'post' => [
                'item' => 'post',
                'local' => 'id',
                'remote' => 'id'
            ]
        ]
    ];


}
