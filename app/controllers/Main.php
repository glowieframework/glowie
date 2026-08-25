<?php

namespace Glowie\Controllers;

use Glowie\Core\Http\Response;

/**
 * Main controller for Glowie application.
 * @category Controller
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://glowie.gabrielsilva.dev.br
 */
class Main extends BaseController
{

    /**
     * This method will be called before any other methods from this controller.
     */
    public function init()
    {
        // Calls the BaseController init() method
        if (is_callable([parent::class, 'init'])) {
            parent::init();
        }
    }

    /**
     * Index action.
     */
    public function index()
    {
        // Sets a JSON response
        if (request()->acceptsJson()) {
            return response([
                'status' => true,
                'message' => __('index.title')
            ], Response::HTTP_OK);
        }

        // Renders the index page
        return layout('default', 'index', [
            'title' => config('app_name'),
        ]);
    }
}
