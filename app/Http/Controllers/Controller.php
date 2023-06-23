<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  use AuthorizesRequests, ValidatesRequests;

  public function response($statusCode, $message, $data)
  {
    if ($message === false) {
      $message = 'Error!';
      if (!is_array($data))
        $data = array($data);
    }

    if ($message === true) {
      $message = 'Success!';
    }

    $date = Carbon::now();
    $content = compact('statusCode', 'message', 'data', 'date');

    return response($content, $statusCode)
      ->header('Content-Type', 'application/json');
  }
}
