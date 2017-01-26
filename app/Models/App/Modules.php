<?php

namespace App\Models\App;
use App\Models\Blueprint\Taxonomy;

class Modules extends Taxonomy
{

    public $table = "modules";
    public $parent = "Navigation";
    public $nav = "false";
    public $fields = [
        'type' => [
            'type' => 'string',
            'placeholder' => 'Post',
            'label' => 'Type',
            'rules' => 'required',
            'table' => 'true'
        ],
        'blade' => [
            'type' => 'string',
            'placeholder' => 'page-header-core',
            'label' => 'Blade',
            'rules' => 'required',
            'table' => 'true'
        ],
        'target' => [
            'type' => 'integer',
            'placeholder' => '0',
            'label' => 'Target ID',
            'rules' => 'required',
            'table' => 'true'
        ],
    ];

}
