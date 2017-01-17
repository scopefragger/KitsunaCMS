<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
            'type' => 'string',
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


    public function allRelations()
    {

    }

    public function __construct()
    {
        $this->fields = array_merge($this->parentFields, $this->fields);
    }

    public function attributes()
    {
        return $this->hasMany('App\Models\TaxonomyAttribute');
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
