<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

/**
 * @OA\Info(title="My First API", version="0.1")
 */

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });


    /**
    * @OA\Get(
    *     path="/api/resource.json",
    *     @OA\Response(response="200", description="An example resource")
    * )
    */

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('API: NOMBRE DEVELOPER!');
        return $response;
    });

    $app->get('/test', function(Request $request, Response $response){
        $response->getBody()->write('API: NOMBRE DEVELOPER!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

};
