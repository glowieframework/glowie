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
     * Authentication guard to be used for this middleware.
     * @var string
     */
    private const AUTH_GUARD = 'default';

    /**
     * The middleware handler.
     * @return bool Should return true on success or false on fail.
     */
    public function handle()
    {
        // Checks if user is authenticated
        return auth(self::AUTH_GUARD)->check();
    }

    /**
     * Called if the middleware handler returns false.
     */
    public function fail()
    {
        // Clear session data
        auth(self::AUTH_GUARD)->logout();

        // Sets a JSON response
        if (request()->acceptsJson()) {
            return response([
                'status' => false,
                'error' => __('errors.unauthorized')
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Sets a HTTP 401 response
        abort(Response::HTTP_UNAUTHORIZED);
    }
}
