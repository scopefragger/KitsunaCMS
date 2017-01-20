<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Taxonomy
{

    public $table = "link";
    public $fields = [
        'id' => [
            'type' => 'increment',
            'placeholder' => 'Title',
            'hidden' => 'true',
            'label' => 'ID',
            'rules' => 'required',
            'table' => 'true'
        ],
        'title' => [
            'type' => 'string',
            'placeholder' => 'Title',
            'label' => 'Title',
            'rules' => 'required',
            'table' => 'true'
        ],
        'url' => [
            'type' => 'string',
            'placeholder' => 'http://example.co.uk',
            'label' => 'Url',
            'rules' => 'required',
            'table' => 'true'
        ],
        'Menu' => [
            'type' => 'integer',
            'placeholder' => '0',
            'label' => 'Menu ID',
            'rules' => 'required',
            'table' => 'true',
            'hasMany' => []
        ]
    ];

    public $relations = [
        'hasMany' => [
            [
                'item' => 'link',
                'local' => 'Menu',
                'remote' => 'id'
            ]
        ]
    ];

}
