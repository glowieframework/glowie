<?php

namespace Glowie\Controllers;

/**
 * Error controller for Glowie application.
 * @category Controller
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://glowie.gabrielsilva.dev.br
 */
class Error extends BaseController
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
     * Handler for 404 Not Found errors.
     */
    public function notFound()
    {
        // Renders 404 error page
        return layout('default', 'error/error', [
            'title' => 'Page Not Found',
            'code' => 404,
            'message' => __('errors.not_found')
        ]);
    }

    /**
     * Handler for 403 Forbidden errors.
     */
    public function forbidden()
    {
        // Renders 403 error page
        return layout('default', 'error/error', [
            'title' => 'Access Forbidden',
            'code' => 403,
            'message' => __('errors.forbidden')
        ]);
    }

    /**
     * Handler for 503 Service Unavailable errors.
     */
    public function serviceUnavailable()
    {
        // Renders 503 error page
        return layout('default', 'error/error', [
            'title' => 'Service Unavailable',
            'code' => 503,
            'message' => __('errors.service_unavailable')
        ]);
    }
}
