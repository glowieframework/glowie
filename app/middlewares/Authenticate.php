<?php

namespace Glowie\Middlewares;

use Glowie\Core\Http\Middleware;
use Glowie\Core\Tools\Authenticator;
use Babel;

/**
 * Authentication middleware for Glowie application.
 * @category Middleware
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://gabrielsilva.dev.br/glowie
 */
class Authenticate extends Middleware
{

    /**
     * The middleware handler.
     * @return bool Should return true on success or false on fail.
     */
    public function handle()
    {
        // Checks if user is authenticated
        return (new Authenticator())->check();
    }

    /**
     * Called if the middleware handler returns false.
     */
    public function fail()
    {
        // Clear session data
        (new Authenticator())->logout();

        // Set HTTP 403 status code
        $this->response->deny();

        // Renders 403 error page
        $this->controller->renderLayout('default', 'error/error', [
            'title' => 'Access Forbidden',
            'code' => 403,
            'message' => Babel::get('errors.forbidden')
        ]);
    }
}
