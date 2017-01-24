<?php

namespace App\Http\Controllers;

use App\Taxonomy;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;


class TaxonomyController extends Controller
{

    public $name = "Taxonomy";
    public $limit = 5;
    public $className = '';


    /**
     * TaxonomyController constructor.
     * @param null $tax
     */
    public function __construct($tax = null)
    {
        $className = "App\\" . $tax;
        $this->className = $className;
        $class = new $className;
        $this->name = $tax;
        $this->saveRoute();

        if (!Cache::has('admin_' . $tax . '_db_build')) {
            if (!Schema::hasTable($tax)) {
                Schema::create($tax, function (Blueprint $table) {
                    $table->increments('id');
                    $table->softDeletes();
                    $table->rememberToken();
                    $table->timestamps();
                });
            }

            foreach ($class->fields as $key => $row) {
                if (!Schema::hasColumn($tax, $key)) {
                    Schema::table($tax, function ($table) use ($key, $row) {
                        $type = $row['type'];
                        $table->$type($key);
                    });
                }
            }

            $fieldsFlat = [];
            foreach ($class->fields as $key => $value) {
                $fieldsFlat[] = $key;
            }

            $columns = Schema::getColumnListing($tax);
            foreach ($columns as $col) {
                if (!in_array($col,
                        $fieldsFlat) && $col != 'id' && $col != 'created_at' && $col != 'updated_at' && $col != 'deleted_at'
                ) {
                    if (Schema::hasColumn($tax, $col)) {
                        Schema::table($tax, function ($table) use ($key, $row, $col) {
                            $table->dropColumn($col);
                        });
                    }
                }
            }
            Cache::put('admin_' . $tax . '_db_build', 1, 30);
        }
    }

    /**
     * Blade End Poitns
     */

    public function index()
    {
        $few = $this->few();
        View::share('data', $few);
        return $this->buildTemplate('table');
    }

    public function saveRoute()
    {
        if (!empty(Input::get('back')) && Input::get('back') == true) {
            Session::put('back', URL::previous());
        }
    }

    public function restoreRoute()
    {
        if (Session::has('back')) {
            $session = Session::get('back');
            Session::forget('back');
            return Redirect::to($session);
        } else {
            return $this->index();
        }

    }

    public function make()
    {
        return $this->buildTemplate('make');
    }

    public function edit()
    {
        $id = Input::get('id');
        $modelname = 'App\\' . $this->name;
        $model = new $modelname;
        $data = $model->find($id);
        View::share('data', $data);
        Cache::forget('admin_' . $this->name . '_all()');
        return $this->buildTemplate('edit');
    }

    public function duplicate()
    {
        $id = Input::get('id');
        $modelname = 'App\\' . $this->name;
        $model = new $modelname;
        $data = $model->find($id);
        $clone = $data->replicate();
        $clone->save();
        Cache::forget('admin_' . $this->name . '_all()');
        return $this->index();
    }


    public function info()
    {
        $modelname = 'App\\' . $this->name;
        $model = new $modelname;

        $data = [
            ['VisibleIn Admin Nav', $model->nav],
            ['Database Table', $model->table],
            ['Modules Enabled', $model->modules],
            ['Icon', $model->icon],
        ];

        View::share('data', $data);
        View::share('fillable', $model->fillable);
        View::share('fields', $model->fields);
        View::share('relation', $model->relations);

        return $this->buildTemplate('info');
    }


    /**
     * @version 0.1.1
     * @return View
     *
     * Softdeletes a single row from `$this` models table
     * Accessable via the route /admin/delete/{model}
     * Expects the ID to be passed as a `$_REQUEST`
     */
    public function delete()
    {
        $id = (int)Input::get('id');
        $modelname = 'App\\' . $this->name;
        $model = new $modelname;
        $clone = $model->destroy($id);
        $this->clearQuerys();
        return $this->index();
    }

    /**
     * @version 0.1.1
     * @return View
     *
     * Enables a full cache flush for a single model
     * available via $model->cache(); or by utilising the route `/admin/cache/{model}/`
     * cache flushing includes navigation bars and all assets that relate to the model in question
     *
     */
    public function cache()
    {
        Cache::forget('admin_' . $this->name . '_db_build');
        Cache::forget('admin_' . $this->name . '_view_new');
        Cache::forget('builder_fields');
        Cache::forget('builder_nav');
        $this->clearQuerys();
        Cache::forget('builder_relations');
        return $this->index();
    }

    /**
     * @version 0.1.1
     *
     * Enables a small flush for only data gathered by models
     * Not accessable via a URL action
     * Will not clear additinal assets such as navigation cache or views
     */
    private function clearQuerys()
    {
        Cache::forget('admin_' . $this->name . '_all()');
        Cache::forget('admin_' . $this->name . '_few()');
    }

    /**
     * API End Points
     */
    public function create()
    {
        $modelname = 'App\\' . $this->name;
        $model = new $modelname;
        foreach ($model->fields as $key => $value) {
            $model->$key = Input::get($key);
        }
        $model->save();
        Cache::forget('admin_' . $this->name . '_all()');
        return $this->restoreRoute();

    }

    public function all()
    {
        $class = $this->getModelNameSpace();
        $cacheName = 'admin_' . $this->name . '_all()';
        if (!empty(Cache::get($cacheName))) {
            return Cache::get($cacheName);
        } else {
            $data = $class::where('model', '=', $class)->get();
            Cache::put($cacheName, $data);
        }
    }

    public function few()
    {
        $modelName = $this->getModelNameSpace();
        $class = new $modelName();
        $cacheName = 'admin_' . $this->name . '_few()';
        if (!empty(Cache::get($cacheName))) {
            return Cache::get($cacheName);
        } else {
            return $data = $class::limit($this->limit)->orderBy('id', 'DESC')->get();
        }
    }

    public function one($id)
    {
        $search = Input::get('id');
        $class = $this->getModelNameSpace();
        return $class::where('model', '=', $class)->where('id', '=', $search)->get();
    }

    public function view()
    {
        return $this->buildTemplate();
    }

    /**
     * TOOLKIT FUNCTIONS
     */

    public function buildTemplate($mode)
    {

        View::share('tax', $this->name);
        $this->buildMainNav();

        if ($mode == 'table') {
            return view('admin.tax.table.index');
        } else {
            if ($mode == 'make') {
                if (!empty(Cache::get('admin_' . $this->name . '_view_new'))) {
                    return Cache::get('admin_' . $this->name . '_view_new');
                } else {
                    Cache::put('admin_' . $this->name . '_view_new', view('admin.tax.create.index'));
                }
                return view('admin.tax.create.index');

            } else {
                if ($mode == 'edit') {
                    return view('admin.tax.edit.index');
                } else {
                    if ($mode == 'info') {
                        return view('admin.tax.info.index');
                    } else {
                        return view('admin.tax.index');
                    }
                }
            }
        }

    }

    public
    function getModelNameSpace()
    {
        return 'App\\' . $this->name;
    }

    public
    function getControllerlNameSpace()
    {
        return 'App\Http\Controllers\\' . $this->name;
    }

    /**
     * Public : BuildMainNav
     * ----------------------------------------------------
     * Binds a number of variables to the current page
     * Caches where possable,  Cached assets can be flushed
     * with $this->cache(); or $this->clearQuerys();
     * Cache persists indefenitly.
     */
    public function buildMainNav()
    {

        if (!Cache::has('builder_fields')) {

            /** Some prefunction varables to be filled */
            $controllers = scandir(__DIR__ . '/../../');
            $trueController = [];
            $fields = [];
            $relations = [];
            $tabs = ['general' => 1];

            /** Step though each model in the folder */
            foreach ($controllers as $controller) {
                if (strpos($controller, '.php') !== false) {
                    $controllerNamespace = 'App\\' . str_replace('.php', '', $controller);
                    if ($controllerNamespace != 'App\Users' && $controllerNamespace != 'App\Taxonomy') {
                        $class = new $controllerNamespace();

                        /** Clean up our model files and turn them into usable names */
                        $name = str_replace('.php', '', mb_strtolower($controller));
                        $relations[$name] = $class->relations;

                        /** Loop the current models fields and get the parent tags */
                        foreach ($class->fields as $row) {
                            if (!empty($row['parent'])) {
                                $tabs[$name][$row['parent']] = 1;
                            }
                        }

                        /** Detect what subnavigation the current model should be placed unders */
                        if ($class->nav == true) {
                            $fields[$name] = $class->fields;
                            if ($class->parent == null) {
                                $trueController[] = $name;
                            } else {
                                $trueController[$class->parent]['children'][] = $name;
                            }
                        }
                    }
                }
            }

            /** provide the data as view assets */
            View::share('builder_tabs', $tabs);
            View::share('builder_fields', $fields);
            View::share('builder_nav', $trueController);
            View::share('builder_relations', $relations);
            View::share('builder_model', $this->className);

            /** Cache the fun bits */
            Cache::put('builder_fields', $fields);
            Cache::put('builder_tabs', $tabs);
            Cache::put('builder_nav', $trueController);

        } else {

            /** fetch the fun bits from the cache bin */
            $fields = Cache::get('builder_fields');
            $trueController = Cache::get('builder_nav');
            $tabs = Cache::get('builder_tabs');
            $relations = Cache::get('builder_relations');

            /** provide the data as view assets */
            View::share('builder_fields', $fields);
            View::share('builder_nav', $trueController);
            View::share('builder_relations', $relations);
            View::share('builder_model', $this->className);
            View::share('builder_tabs', $tabs);
        }
    }
}