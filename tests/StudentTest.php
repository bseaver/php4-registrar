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
            $this->assertEquals([$student3, $student2], $all_students);
        }

        // function testGetAll()
        // {
        //
        //     $student = new Student('John Smith', '2017-02-28', 1);
        //     $student->save();
        //     $student2 = new Student('Mike Lambert', '2017-02-28', 2);
        //     $student2->save();
        //
        //     //Act
        //     $result = Student::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$student, $student2], $result);
        // }

        // function testDeleteAll()
        // {
        //
        //     $student = new Student('John Smith', '2017-02-28', 1);
        //     $student->save();
        //
        //     $name2 = "Water the lawn";
        //     $id2 = 2;
        //     $student2 = new Student($name2, $id2);
        //     $student2->save();
        //
        //     //Act
        //     Student::deleteAll();
        //
        //     //Assert
        //     $result = Student::getAll();
        //     $this->assertEquals([], $result);
        // }
        //
        //
        // function testUpdate()
        // {
        //     //Arrange
        //     $name = "Work stuff";
        //     $id = 1;
        //     $student = new Student($name, $id);
        //     $student->save();
        //
        //     $new_name = "Home stuff";
        //
        //     //Act
        //     $student->update($new_name);
        //
        //     //Assert
        //     $this->assertEquals("Home stuff", $student->getName());
        // }
        //
        // function testDeleteStudent()
        // {
        //     //Arrange
        //     $name = "Work stuff";
        //     $id = 1;
        //     $student = new Student($name, $id);
        //     $student->save();
        //
        //     $name2 = "Home stuff";
        //     $id2 = 2;
        //     $test_category2 = new Student($name2, $id2);
        //     $test_category2->save();
        //
        //
        //     //Act
        //     $test_category->delete();
        //
        //     //Assert
        //     $this->assertEquals([$test_category2], Student::getAll());
        // }
        //

        // function testFind()
        // {
        //     //Arrange
        //     $name = "Wash the dog";
        //     $id = 1;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     $name2 = "Home stuff";
        //     $id2 = 2;
        //     $test_category2 = new Category($name2, $id2);
        //     $test_category2->save();
        //
        //     //Act
        //     $result = Category::find($test_category->getId());
        //
        //     //Assert
        //     $this->assertEquals($test_category, $result);
        // }
        //
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
