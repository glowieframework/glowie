<?php
    namespace Glowie\Middlewares;

    use Glowie\Core\Http\Middleware;
    use Glowie\Core\Tools\Cache;

    /**
     * Rate limiter middleware for Glowie application.
     * @category Middleware
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) Glowie
     * @license MIT
     * @link https://eugabrielsilva.tk/glowie
     */
    class RateLimiter extends Middleware{

        /**
         * Unique identifier for this rate limiter.
         * @var string
         */
        protected const UNIQUE_ID = 'r1';

        /**
         * Maximum number of attempts per interval.
         * @var int
         */
        protected const MAX_ATTEMPTS = 100;

        /**
         * Time limit interval (in seconds).
         * @var int
         */
        protected const TIME_LIMIT = 60;

        /**
         * The middleware handler.
         * @return bool Should return true on success or false on fail.
         */
        public function handle(){
            // Creates the cache instance
            $cache = new Cache();

            // Sets the rate limiter key with the IP address and unique identifier
            $key = 'ratelimiter_' . self::UNIQUE_ID . '_' . $this->request->getIPAddress();

            // Gets the current number of attempts
            $attempts = (int)$cache->get($key, 0);

            // Limits the attempts
            if($attempts >= self::MAX_ATTEMPTS) return false;

            // Sets the new number of attempts
            $cache->set($key, $attempts + 1, self::TIME_LIMIT);
            return true;
        }

        /**
         * Called if the middleware handler returns false.
         */
        public function fail(){
            $this->response->rateLimit();
        }

    }

?>