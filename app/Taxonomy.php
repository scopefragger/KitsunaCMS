<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Taxonomy
 * Default Parent class for all Models
 * @package App
 */
class Taxonomy extends Model
{
    protected $fillable = ['title', 'model', 'status'];
    public $nav = true;
    public $table = "taxonomies";
    public $fields = [];
    public $parentFields = [
        'title' => [
            'type' => 'string',
            'placeholder' => 'Title',
            'label' => 'Title',
            'rules' => 'required'
        ],
        'status' => [
            'type' => 'integer',
            'placeholder' => 'Status',
            'label' => 'Status',
            'rules' => 'required'
        ],
        'owner' => [
            'type' => 'integer',
            'placeholder' => 'Status',
            'label' => 'Status',
            'rules' => 'required'
        ]
    ];

    public function getMany($model)
    {
        if (!empty($this->relations['hasMany'][$model]['remote'])) {
            $remote = $this->relations['hasMany'][$model]['remote'];
            $key = $this->relations['hasMany'][$model]['local'];
            $model = 'App\\' . $model;
            return $model::where($remote, '=', $this->$key)->get();
        } else {
            return [];
        }

    }

    /**
     * Taxonomy constructor.
     * Allows classes that extend to inhert a default set of fields ( ID / Owner / Status )
     */
    public function __construct()
    {
        $this->fields = array_merge($this->parentFields, $this->fields);
    }


    public function rules()
    {
        $rule = [];
        foreach ($this->fields as $key => $value) {
            $rule[$key] = $value['rules'];
        }
        return $rule;
    }

}
