<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use App\src\Infrastucture\Shared\Exception\APIResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class Handler extends ExceptionHandler
{
    use APIResponse;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (Exception $e, $request) {
            $response = $this->handleException($request, $e);
            return $response;
        });
    }

    public function handleException($request, Exception $exception)
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->apiResponse('The specified method for the request is invalid', 405);
        }

        if ($exception instanceof NotFoundHttpException) {
            return $this->apiResponse('The specified URL cannot be found', 404);
        }

        if ($exception instanceof HttpException) {
            return $this->apiResponse($exception->getMessage(), $exception->getStatusCode());
        }
    
    }

    
}
