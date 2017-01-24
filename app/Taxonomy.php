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
    /** Laravel's $fillable array  */
    protected $fillable = ['title', 'model', 'status'];

    /** Defines of the Model is visible in the CMS Nav */
    public $nav = true;

    /** Defines if the Model should be within a sub navigation in the CMS */
    public $parent = null;

    public $table = "taxonomies";
    public $modules = "false";
    public $icon = "ti-pie-chart";
    public $fields = [];
    public $parentFields = [
        'id' => [
            'type' => 'increment',
            'placeholder' => '0',
            'label' => 'ID',
            'table' => 'true',
            'hidden' => 'true',
            'rules' => 'required'
        ],
        'title' => [
            'type' => 'string',
            'placeholder' => 'Title',
            'label' => 'Title',
            'table' => 'true',
            'rules' => 'required'
        ],
        'status' => [
            'type' => 'integer',
            'placeholder' => 'Status',
            'label' => 'Status',
            'rules' => 'required',
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
