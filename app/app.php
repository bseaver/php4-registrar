<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    // require_once __DIR__."/../src/Task.php";
    // require_once __DIR__."/../src/Category.php";

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $server = 'mysql:host=localhost:8889;dbname=to_do';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    // $app->register(
    //     new Silex\Provider\TwigServiceProvider(),
    //     array('twig.path' => __DIR__.'/../views')
    // );

    $app->get("/", function() use ($app) {
        return 'Hello Registrar';
    });

    $app->post("/post/student", function() use ($app) {
        return 'To Do';
    });

    $app->get("/get/student/{id}/edit", function($id) use ($app) {
        return 'To Do';
    });

    $app->patch("/patch/student", function() use ($app) {
        return 'To Do';
    });

    $app->delete("/delete/student/{id}", function($id) use ($app) {
        return 'To Do';
    });


    return $app;
?>
