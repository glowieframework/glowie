<?php

namespace Glowie\Middlewares;

use Glowie\Core\Http\Middleware;
use Glowie\Core\Http\Response;
use Glowie\Core\Tools\Authorizator;

/**
 * API Authentication middleware for Glowie application.
 * @category Middleware
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://glowie.gabrielsilva.dev.br
 */
class AuthenticateApi extends Middleware
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
        // Gets the token from the Authorization header or request body
        $auth = new Authorizator(self::AUTH_GUARD);
        $token = $auth->getBearer() ?? $auth->getToken();

        // Checks if the token exists
        if (!$token) return false;

        // Authorizes the token
        return $auth->authorize($token);
    }

    /**
     * Called if the middleware handler returns false.
     */
    public function fail()
    {
        // Sets a JSON response
        return response([
            'status' => false,
            'error' => __('errors.unauthorized')
        ], Response::HTTP_UNAUTHORIZED);
    }
}
