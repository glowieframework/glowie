<?php

namespace Glowie\Controllers;

/**
 * Main controller for Glowie application.
 * @category Controller
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://gabrielsilva.dev.br/glowie
 */
class Main extends BaseController
{

    /**
     * This method will be called before any other methods from this controller.
     */
    public function init()
    {
        // Calls the BaseController init() method
        if (is_callable([parent::class, 'init'])) parent::init();
    }

    /**
     * Index action.
     */
    public function index()
    {
        // Renders the starting page
        $this->renderLayout('default', 'index', [
            'title' => 'Welcome to Glowie!'
        ]);
    }
}
