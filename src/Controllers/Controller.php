<?php

namespace App\Controllers;

use App\traits\Middlewares;
use App\traits\Views;

class Controller
{

    /**
     * Integrating Traits of views and middlewares
     * All controllers will have access to the Traits
     */

    use Views;
    use Middlewares;
}
