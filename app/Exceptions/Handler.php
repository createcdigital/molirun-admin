<?php namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler {

	private $sentryID;

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		//'Symfony\Component\HttpKernel\Exception\HttpException'
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
		if ($e instanceof FatalErrorException) {

			Log::error("=======ERROR(report), URL: ".URL::current().
						"\n File: " . $e->getFile() . "\n Line: " . $e->getLine().
						"\n Message: " . $e->getMessage().
						"\n Trace: \n" . $e->getTraceAsString()
					);
		}

		if ($this->shouldReport($e)) {
			// bind the event ID for Feedback
			$this->sentryID = app('sentry')->captureException($e);
		}

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
		if(!$e instanceof NotFoundHttpException)
		{
			return response()->view('errors.500', [
				'sentryID' => $this->sentryID,
			], 500);
		}else
			return parent::render($request, $e);
	}

}
