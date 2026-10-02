<?php

namespace App\Helpers;

class Logger
{
    public static function info(string $m): void  { self::write('INFO', $m); }
    public static function error(string $m): void { self::write('ERROR', $m); }

    private static function write(string $level, string $m): void
    {
        $file = __DIR__ . '/../../storage/logs/app.log';
        if (!is_dir(dirname($file))) {
            @mkdir(dirname($file), 0775, true);
        }
        error_log(sprintf('[%s] %s: %s%s', date('Y-m-d H:i:s'), $level, $m, PHP_EOL), 3, $file);
    }
}
