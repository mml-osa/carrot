<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *   version="1.0.0",
 *   title="Carrot Institute Backend Developer Code Challenge",
 *   description="L5 Swagger OpenApi description",
 *   @OA\Contact(
 *       email="mail@michaellaryea.me"
 *   ),
 *   @OA\License(
 *       name="Apache 2.0",
 *       url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *   )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Test Server"
 * )
 *
 * @OA\Tag(
 *     name="Projects",
 *     description="API Endpoints of Projects"
 * )
 *
 * @OA\PathItem(path="/")
 */
class Controller extends BaseController
{
  use AuthorizesRequests, ValidatesRequests, DispatchesJobs;

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
