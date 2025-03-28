<?php

namespace Glowie\Middlewares;

use Glowie\Core\Http\Middleware;

/**
 * CSRF token validation middleware for Glowie application.
 * @category Middleware
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://glowie.gabrielsilva.dev.br
 */
class ValidateCsrfToken extends Middleware
{

    /**
     * The middleware handler.
     * @return bool Should return true on success or false on fail.
     */
    public function handle()
    {
        // Retrieves the token from POST field or header
        $token = $this->post->_token ?? request()->getHeader('X-CSRF-TOKEN');

        // Validates the token
        if (empty($token)) return false;
        return request()->checkCsrfToken($token);
    }

    /**
     * Called if the middleware handler returns false.
     */
    public function fail()
    {
        // Set HTTP 403 status code
        response()->deny();

        // Renders 403 error page
        return layout('default', 'error/error', [
            'title' => 'Access Forbidden',
            'code' => 403,
            'message' => __('errors.forbidden')
        ]);
    }
}
