<?php

namespace App\Models\App;
use App\Models\Blueprint\Taxonomy;

class Pages extends Taxonomy
{

    public $table = "pages";
    public $parent = "Blog";
    public $modules = "true";
    public $fields = [
        'subtitle' => [
            'type' => 'string',
            'placeholder' => 'Model',
            'label' => 'Model',
            'rules' => 'required',
            'parent' => 'general'
        ],
        'excerpt' => [
            'type' => 'string',
            'placeholder' => 'Some example text',
            'label' => 'Excerpt',
            'rules' => 'required',
            'parent' => 'general'
        ],
        'copy' => [
            'type' => 'string',
            'placeholder' => 'Some Exmaple Text',
            'label' => 'Copy',
            'rules' => 'required',
            'parent' => 'general'
        ],
        'path' => [
            'type' => 'string',
            'placeholder' => '/events/event-name-here',
            'label' => 'Path',
            'rules' => 'required',
            'table' => 'true',
            'parent' => 'Seo'
        ],
        'meta_description' => [
            'type' => 'string',
            'placeholder' => 'Event name',
            'label' => 'Meta Description',
            'rules' => 'required',
            'parent' => 'Seo'
        ],
        'meta_keywords' => [
            'type' => 'string',
            'placeholder' => 'Block',
            'label' => 'Meta Keyword',
            'rules' => 'required',
            'parent' => 'Seo'
        ],
        'titleOverride' => [
            'type' => 'string',
            'placeholder' => 'Block',
            'label' => 'Title Overide',
            'rules' => 'required',
            'parent' => 'Seo'
        ],
        'alt_theme' => [
            'type' => 'string',
            'placeholder' => 'Block',
            'label' => 'Alt Theme',
            'rules' => 'required',
            'parent' => 'template'
        ],
        'type' => [
            'type' => 'integer',
            'placeholder' => 'Block',
            'label' => 'Type',
            'rules' => 'required',
            'table' => 'true'
        ],
        'media_id' => [
            'type' => 'integer',
            'placeholder' => 'Block',
            'label' => 'Media ID',
            'rules' => 'required'
        ],
        'parent_id' => [
            'type' => 'integer',
            'placeholder' => 'Block',
            'label' => 'Parent ID',
            'rules' => 'required'
        ],
        'category_id' => [
            'type' => 'integer',
            'placeholder' => 'Block',
            'label' => 'Category ID',
            'rules' => 'required'
        ],
        'template' => [
            'type' => 'string',
            'placeholder' => 'Block',
            'label' => 'Template',
            'rules' => 'required'
        ],
        'menu_id' => [
            'type' => 'integer',
            'placeholder' => 'Block',
            'label' => 'Menu ID',
            'rules' => 'required'
        ],
        'enclosure_id' => [
            'type' => 'integer',
            'placeholder' => 'Block',
            'label' => 'Enclosure ID',
            'rules' => 'required'
        ],
        'start_datetime' => [
            'type' => 'string',
            'placeholder' => 'Block',
            'label' => 'Start Date Time',
            'rules' => 'required'
        ],
        'end_datetime' => [
            'type' => 'string',
            'placeholder' => 'Block',
            'label' => 'End Date Time',
            'rules' => 'required'
        ],
        'event_id' => [
            'type' => 'integer',
            'placeholder' => 'Block',
            'label' => 'Event ID',
            'rules' => 'required'
        ]
    ];

}
