<?php

namespace Glowie\Middlewares;

use Glowie\Core\Http\Middleware;
use Glowie\Core\Http\Response;

/**
 * Authentication middleware for Glowie application.
 * @category Middleware
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://glowie.gabrielsilva.dev.br
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
        return auth()->check();
    }

    /**
     * Called if the middleware handler returns false.
     */
    public function fail()
    {
        // Clear session data
        auth()->logout();

        // Set HTTP 401 status code
        response()->unauthorized();

        // Sets a JSON response
        if (request()->acceptsJson()) {
            return response([
                'status' => false,
                'error' => __('errors.unauthorized')
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Renders 401 error page
        return layout('default', 'error.error', [
            'title' => 'Unauthorized',
            'code' => 401,
            'message' => __('errors.unauthorized')
        ]);
    }
}
