<?php

use App\Http\Middleware\DeoMiddleware;
use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\TraineeMiddleware;
use App\Http\Middleware\MonitorCellMiddleware;
use App\Http\Middleware\CourseDirectorMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'useradmin' => AdminAuthenticate::class,
            'admin'=>AdminMiddleware::class,
            'trainee'=>TraineeMiddleware::class,
            'cd'=>CourseDirectorMiddleware::class,
            'monitor'=>MonitorCellMiddleware::class,
            'deo'=>DeoMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

    })->create();
