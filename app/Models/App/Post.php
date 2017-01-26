<?php

namespace App\Models\App;
use App\Models\Blueprint\Taxonomy;

class Post extends Taxonomy
{

    public $table = "post";
    public $parent = "Blog";
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
            'rules' => 'required',
            'table' => 'true'
        ],
        'block' => [
            'type' => 'string',
            'placeholder' => 'Block',
            'label' => 'Block',
            'rules' => 'required'
        ],
        'alias' => [
            'type' => 'string',
            'placeholder' => 'Alias',
            'label' => 'Alias',
            'rules' => 'required'
        ],
        'version' => [
            'type' => 'integer',
            'placeholder' => 'Version',
            'label' => 'Version',
            'rules' => 'required'
        ],
        'jockey' => [
            'type' => 'integer',
            'placeholder' => 'Version',
            'label' => 'Version',
            'rules' => 'required',
            'related' => 'jockey'
        ],
    ];

}
