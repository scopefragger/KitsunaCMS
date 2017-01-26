<?php

namespace App\Models\App;
use App\Models\Blueprint\Taxonomy;

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
