<?php

namespace App\Services;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class ResponseConverterToJson
{
	/**
	 * @param Response|JsonResponse $response
	 *
	 * @return mixed
	 */
	public static function replaceStatus($response) {
		$is_debug = env('APP_DEBUG') && env('APP_ENV') !== 'production';
		$status_code = $response->getStatusCode();
		$message = HttpFoundationResponse::$statusTexts[$status_code];

		if(($response->exception ?? false) && $response->exception->getMessage()) {
			$message = $response->exception->getMessage();
		}

		$result = [
			'data' => '',
			'status' => [
				'code' => $status_code,
				//'message' => ($response->exception->getMessage() ?? null) || HttpFoundationResponse::$statusTexts[$status_code],
				'message' => $message,
			]
		];

		$content = json_decode($response->getContent(), true) ?: [];

		if(is_array($content) && key_exists('data', $content)) {
			$result[ 'data' ] = $content[ 'data' ];
		} else {
			$result[ 'data' ] = $content;
		}

		if ($is_debug && $status_code >= 300) {
			$result[ 'error' ] = self::appendTrace($response);
		}

		$result = json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);

		$response
			->setStatusCode(200)
			->setContent($result);

		return $response;
	}


	/**
	 * @param Response|JsonResponse $response
	 *
	 * @return array
	 */
	protected static function appendTrace($response) {
		$exception = $response->exception ?? null;
		$error = [];

		if ($exception) {
			$error = [
				'file'	=> $exception->getFile(),
				'line'	=> $exception->getLine(),
				'message' => $exception->getMessage(),
				'trace'   => self::prepareTrace($exception->getTrace()),
			];
		}

		return $error;
	}


	protected static function prepareTrace($trace) {
		$result = [];

		$fields = [
			'file',
			'line',
			'function',
			'class',
		];

		foreach ($trace as $key => $item) {
			foreach ($fields as $field) {
				if (key_exists($field, $item)) {
					$result[ $key ][ $field ] = $item[ $field ];
				}
			}
		}

		return $result;
	}
}
