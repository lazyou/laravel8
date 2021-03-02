<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        ApiException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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
        if ($exception instanceof ApiException) {
            return response([
                'message' => $exception->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }

        // TODO: 此处会有多个错误情况, 如何配合前端展示? 届时错误码应为 422
        if ($exception instanceof ValidationException && $request->wantsJson()) {
            $firErr = Arr::first($exception->validator->errors()->toArray());
            return response([
                'message' => $firErr[0],
            ], Response::HTTP_BAD_REQUEST);
        }

        // 模型 findOrFail() 异常处理
        if ($exception instanceof ModelNotFoundException) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'message' => '数据不存在',
                    'message_zh' => '数据不存在',
                    'http_code'  => Response::HTTP_NOT_FOUND,
                ], Response::HTTP_NOT_FOUND);
            } else {
                return response()->view('layout.errors.common', [
                    'message' => $exception->getMessage(),
                    'message_zh' => '数据不存在',
                    'http_code'  => Response::HTTP_NOT_FOUND,
                ], Response::HTTP_NOT_FOUND);
            }
        }

        return parent::render($request, $exception);
    }
}
