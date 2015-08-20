<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {


        // Added - tdobbins 6/25/15
        // When using Model::findOfFail() this will result in a 404 if the model is not
        // found rather then a shitty 500 error with ModelNotFoundException
        if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            return response()->view('errors.404', array(), 404);
        }

        // Added - tdobbins 8/18/15
        // catch Integrity constraint violation which will occur
        // if a deletion violates a foreign key constraint
        if ($e instanceof \Illuminate\Database\QueryException) {
            $errorCode = $e->getCode();

            switch ($errorCode)
            {
                case 23000:
                    return response()->view('errors.sql.23000', array(), 200);
                    break;

                default:
                    break;
            }
        }

        return parent::render($request, $e);
    }
}
