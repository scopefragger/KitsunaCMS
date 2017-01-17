<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoaderController extends Controller
{

    private $taxonomy;

    public function manager($function, $tax)
    {

        $controller = new TaxonomyController($tax);
        return $controller->$function();

    }

}
