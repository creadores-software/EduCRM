<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Spatie\Permission\Exceptions\UnauthorizedException;
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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $mensaje=$exception->getMessage();
        //Las importaciones manejan las excepciones
        if (!$request->is('subirImportacion') && $exception instanceof QueryException) {            
            if($exception->getCode() == "23000"){ //Error de llave foranea
                if($request->method()==='DELETE'){//En método de eliminación
                    $mensaje = "No se puede eliminar el registro. Es posible que tenga asociación con otros elementos.";
                }else if($request->method()==='PUT' || $request->method()==='PATCH'){//En método de eliminación
                    $mensaje = "Verificar que todas las asociaciones existan correctamente.";
                }               
            }   
            return response()->view('layouts.error', ['message'=>$mensaje], 500);         
        }else if($exception instanceof MethodNotAllowedHttpException){
            $mensaje ="Este acción no está habilitada.";
            return response()->view('layouts.error', ['message'=>$mensaje], 500);
        }else if ($exception instanceof UnauthorizedException) {
            if(Auth::guest()){
                return redirect()->guest('login');
            }else{
                $mensaje ="No estás autorizado para realizar esta operación.";
                return response()->view('layouts.error', ['message'=>$mensaje], 500);
            }
        }   
        return parent::render($request, $exception);
    }
}
