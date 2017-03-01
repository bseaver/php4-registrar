<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Student.php";
    require_once __DIR__."/../src/Course.php";

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $server = 'mysql:host=localhost:8889;dbname=registrar';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();
    $app['debug'] = true;

    $app->register(
        new Silex\Provider\TwigServiceProvider(),
        array('twig.path' => __DIR__.'/../views')
    );

    // Student Routes

    $app->get("/", function() use ($app) {
        return $app['twig']->render(
            'students.html.twig',
            array('students' => Student::getAll(), 'edit_student_id' => 0)
        );
    });

    $app->post("/post/student", function() use ($app) {
        $student = new Student($_POST['student_name'],$_POST['date_of_enrollment']);
        $student->save();
        return $app['twig']->render(
            'students.html.twig',
            array('students' => Student::getAll(), 'edit_student_id' => 0)
        );
    });

    $app->get("/get/student/{id}/edit", function($id) use ($app) {

        return $app['twig']->render(
            'students.html.twig',
            array('students' => Student::getAll(), 'edit_student_id' => $id)
        );
    });

    $app->patch("/patch/student", function() use ($app) {
        $student = Student::find($_POST['student_id']);
        $student->update($_POST['student_name'], $_POST['date_of_enrollment']);

        return $app['twig']->render(
            'students.html.twig',
            array('students' => Student::getAll(), 'edit_student_id' => 0)
        );
    });

    $app->delete("/delete/student/{id}", function($id) use ($app) {
        $student= Student::find($id);
        $student->delete();
        return $app['twig']->render(
            'students.html.twig',
            array('students' => Student::getAll(), 'edit_student_id' => 0)
        );
    });


    // Course Routes
    $app->get("/get/courses", function() use ($app) {
        return $app['twig']->render(
            'courses.html.twig',
            array('courses' => Course::getAll(), 'edit_course_id' => 0)
        );
    });

    $app->post("/post/course", function() use ($app) {
        $course = new Course($_POST['course_name'],$_POST['course_number']);
        $course->save();
        return $app['twig']->render(
            'courses.html.twig',
            array('courses' => Course::getAll(), 'edit_course_id' => 0)
        );
    });

    $app->get("/get/course/{id}/edit", function($id) use ($app) {

        return $app['twig']->render(
            'courses.html.twig',
            array('courses' => Course::getAll(), 'edit_course_id' => $id)
        );
    });

    $app->patch("/patch/course", function() use ($app) {
        $course = Course::find($_POST['course_id']);
        $course->update($_POST['student_name'], $_POST['course_number']);

        return $app['twig']->render(
            'courses.html.twig',
            array('courses' => Course::getAll(), 'edit_course_id' => 0)
        );
    });

    $app->delete("/delete/course/{id}", function($id) use ($app) {
        $course= Course::find($id);
        $course->delete();
        return $app['twig']->render(
            'courses.html.twig',
            array('courses' => Course::getAll(), 'edit_course_id' => 0)
        );
    });


    return $app;
?>
