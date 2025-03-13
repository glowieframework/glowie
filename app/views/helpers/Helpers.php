<?php

namespace Glowie\Helpers;

/**
 * View helpers for Glowie application.
 * @category Helpers
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://glowie.gabrielsilva.dev.br
 */
class Helpers
{

    /**
     * Returns the page rendering time.
     * @return string Page rendering time.
     */
    public function getRenderTime()
    {
        $time = round((microtime(true) - APP_START_TIME) * 1000, 2);
        if ($time <= 1000) return $time . 'ms';
        if ($time <= 60000) return round($time / 1000, 2) . 's';
        if ($time <= 3600000) return round($time / 60000, 2) . 'min';
        return round($time / 3600000, 2) . 'h';
    }
}
