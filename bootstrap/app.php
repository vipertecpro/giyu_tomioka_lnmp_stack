<?php

use App\Http\Middleware\AppAuthenticate;
use App\Http\Middleware\AppRedirectIfAuthenticated;
use App\Http\Middleware\ClientAuthenticate;
use App\Http\Middleware\ClientRedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->group('client', [
            'auth' => ClientAuthenticate::class,
            'guest' => ClientRedirectIfAuthenticated::class,
        ]);

        $middleware->group('app', [
            'auth' => AppAuthenticate::class,
            'guest' => AppRedirectIfAuthenticated::class,
        ]);
        $middleware->redirectGuestsTo(function ($request) {
            return $request->is('client/*') ? route('client.login') : route('app.login');
        });

        $middleware->redirectUsersTo(function ($request) {
            return $request->is('client/*') ? route('client.dashboard.index') : route('app.dashboard.index');
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {

            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Record not found.'
                ], 404);
            }

            $pageData = [
                'pageTitle'         => 'Page Not Found - 404 Error',
                'pageDescription'   => 'Sorry, the page you are trying to access does not exist. Return to the home page or use the search feature to find what you’re looking for.',
            ];
            if ($request->getHost() === env('APP_ADMIN_DOMAIN')) {
                return response()->view('restricted.errors.4xx',$pageData);
            }
            return response()->view('client.errors.4xx',$pageData);
        });

    })->create();
