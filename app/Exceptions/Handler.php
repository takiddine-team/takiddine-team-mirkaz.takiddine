<?php

namespace App\Exceptions;

use App\Bots\{Telegram,ClickUp};
use ErrorException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ErrorException || $exception instanceof \ParseError) {
            $route = !is_null($request->route()) ? $request->route()->uri : null;

            $errorBotMessage = '**Link visited:** ' . $request->url() . "\n";
            if (!is_null($route)) {
                $errorBotMessage .= '**Route visited: **' . $route . "\n";
            }

            $errorBotMessage .= '**Error type: **' . get_class($exception) . "\n";
            $errorBotMessage .= '**Error code:** ' . $exception->getCode() . "\n";
            $errorBotMessage .= '**Error file:** ' . $exception->getFile() . "\n";
            $errorBotMessage .= '**Error line:** ' . $exception->getLine() . "\n";
            $errorBotMessage .= '**Error message:** ' . $exception->getMessage() . "\n";

            (new Telegram())::channel('errors')
                ->sendMessage(json_encode(str_replace('**', '', $errorBotMessage)));
            
            (new ClickUp())
                ->project('دَن')
                ->details($errorBotMessage)
                ->send();
        }
        return parent::render($request, $exception);
    }
}
