<?php

namespace App\Http\Controllers\Blueprint;

use App\Http\Controllers\Controller;

/**
 * Class LoaderController
 * @package App\Http\Controllers\Blueprint
 * --------------------------------
 * Additinal security layer for handeling requests firectly to
 * interactive controllers,  Handles direct route Queries
 */
class LoaderController extends Controller
{

    private $taxonomy;

    public function manager($function, $tax)
    {

        $controller = new TaxonomyController($tax);
        return $controller->$function();

    }

}
