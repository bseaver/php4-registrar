<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Student.php";
    // require_once "src/Task.php";

    $server = 'mysql:host=localhost:8889;dbname=registrar_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class StudentTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
          Student::deleteAll();
        //   Task::deleteAll();
        }

        function test_Student_setters_getters_constructor()
        {
            // Act
            $student = new Student('John Smith', '2017-02-28', 1);
            $actual_result = $student->getName() . $student->getDateOfEnrollment() . $student->getId();

            // Assert
            $this->assertEquals('John Smith2017-02-281', $actual_result);
        }

        function test_Student_save_getAll_deleteAll()
        {
            // Arrange
            $student1 = new Student('John Smith', '2017-02-28');
            $student2 = new Student('Tom Smith', '2017-02-27');
            $student3 = new Student('Jane Smith', '2017-02-26');

            // Act
            $student1->save();
            Student::deleteAll();
            $student2->save();
            $student3->save();
            $all_students = Student::getAll();

            // Assert
            $this->assertEquals([$student2, $student3], $all_students);
        }

        function test_Student_update()
        {
            // Arrange
            $student1 = new Student('Tom Smith', '2017-02-27');
            $student1->save();

            // Act
            $student1->update('Tom Smythe', '2017-01-27');
            $all_students = Student::getAll();

            // Assert
            $this->assertEquals(
                'Tom Smythe|2017-01-27',
                $all_students[0]->getName() . '|' . $all_students[0]->getDateOfEnrollment()
            );
        }

        function test_Student_find()
        {
            // Arrange
            $student1 = new Student('John Smith', '2017-02-28');
            $student2 = new Student('Tom Smith', '2017-02-27');
            $student1->save();
            $student2->save();

            // Act
            $result = Student::find($student2->getId());

            // Assert
            $this->assertEquals($student2, $result);
        }

        function testDeleteStudent()
        {
            //Arrange
            $student1 = new Student('John Smith', '2017-02-28');
            $student2 = new Student('Tom Smith', '2017-02-27');
            $student3 = new Student('Jane Smith', '2017-02-26');
            $student1->save();
            $student2->save();
            $student3->save();

            // Act
            $student2->delete();

            //Assert
            $this->assertEquals([$student1, $student3], Student::getAll());
        }



        // function testAddTask()
        // {
        //     //Arrange
        //     $name = "Work stuff";
        //     $id = 1;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     $description = "File reports";
        //     $id2 = 2;
        //     $test_task = new Task($description, $id2);
        //     $test_task->save();
        //
        //     //Act
        //     $test_category->addTask($test_task);
        //
        //     //Assert
        //     $this->assertEquals($test_category->getTasks(), [$test_task]);
        // }
        //
        // function testGetTasks()
        // {
        //     //Arrange
        //     $name = "Home stuff";
        //     $id = 1;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     $description = "Wash the dog";
        //     $id2 = 2;
        //     $test_task = new Task($description, $id2);
        //     $test_task->save();
        //
        //     $description2 = "Take out the trash";
        //     $id3 = 3;
        //     $test_task2 = new Task($description2, $id3);
        //     $test_task2->save();
        //
        //     //Act
        //     $test_category->addTask($test_task);
        //     $test_category->addTask($test_task2);
        //
        //     //Assert
        //     $this->assertEquals($test_category->getTasks(), [$test_task, $test_task2]);
        // }
    }

?>
