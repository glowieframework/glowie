<?php

namespace Glowie\Middlewares;

use Glowie\Core\Http\Middleware;
use Glowie\Core\Http\Response;

/**
 * Rate limiter middleware for Glowie application.
 * @category Middleware
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://glowie.gabrielsilva.dev.br
 */
class RateLimiter extends Middleware
{

    /**
     * Unique identifier for this rate limiter.
     * @var string
     */
    private const UNIQUE_ID = 'default';

    /**
     * Maximum number of attempts per interval.
     * @var int
     */
    private const MAX_ATTEMPTS = 30;

    /**
     * Time limit interval (in seconds).
     * @var int
     */
    private const TIME_LIMIT = 60;

    /**
     * The middleware handler.
     * @return bool Should return true on success or false on fail.
     */
    public function handle()
    {
        // Sets the rate limiter key with the IP address and unique identifier
        $key = 'app.ratelimiter.' . self::UNIQUE_ID . '.' . request()->getIPAddress();

        // Gets the current number of attempts
        $attempts = cache()->get($key);

        // Limits the attempts
        if ($attempts !== null && $attempts >= self::MAX_ATTEMPTS) return false;

        // Sets the new number of attempts
        if (is_null($attempts)) {
            cache()->set($key, 1, self::TIME_LIMIT);
        } else {
            cache()->increment($key, 1);
        }

        // No rate limiting
        return true;
    }

    /**
     * Called if the middleware handler returns false.
     */
    public function fail()
    {
        // Sets a JSON response
        if (request()->acceptsJson()) {
            return response([
                'status' => false,
                'error' =>  __('errors.rate_limit')
            ], Response::HTTP_TOO_MANY_REQUESTS);
        }

        // Sets a HTTP 429 response
        abort(Response::HTTP_TOO_MANY_REQUESTS);
    }
}
