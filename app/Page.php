<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Taxonomy
{

    public $table = "page";
    public $parent = "Blog";
    public $modules = "true";
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
        'block' => [
            'type' => 'string',
            'placeholder' => 'Block',
            'label' => 'Block',
            'rules' => 'required'
        ]
    ];

}
