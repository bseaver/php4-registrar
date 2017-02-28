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

        // protected function tearDown()
        // {
        //   Category::deleteAll();
        //   Task::deleteAll();
        // }

        function test_Student_setters_getters_constructor()
        {
            // Act
            $student = new Student('John Smith', '2017-02-28', 1);
            $actual_result = $student->getName() . $student->getDateOfEnrollment() . $student->getId();

            // Assert
            $this->assertEquals('John Smith2017-02-281', $actual_result);
        }

        // function testSave()
        // {
        //     //Arrange
        //     $name = "Work stuff";
        //     $id = 1;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     //Act
        //     $result = Category::getAll();
        //
        //     //Assert
        //     $this->assertEquals($test_category, $result[0]);
        // }
        //
        // function testUpdate()
        // {
        //     //Arrange
        //     $name = "Work stuff";
        //     $id = 1;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     $new_name = "Home stuff";
        //
        //     //Act
        //     $test_category->update($new_name);
        //
        //     //Assert
        //     $this->assertEquals("Home stuff", $test_category->getName());
        // }
        //
        // function testDeleteCategory()
        // {
        //     //Arrange
        //     $name = "Work stuff";
        //     $id = 1;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     $name2 = "Home stuff";
        //     $id2 = 2;
        //     $test_category2 = new Category($name2, $id2);
        //     $test_category2->save();
        //
        //
        //     //Act
        //     $test_category->delete();
        //
        //     //Assert
        //     $this->assertEquals([$test_category2], Category::getAll());
        // }
        //
        // function testGetAll()
        // {
        //     //Arrange
        //     $name = "Work stuff";
        //     $id = 1;
        //     $name2 = "Home stuff";
        //     $id2 = 2;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //     $test_category2 = new Category($name2, $id2);
        //     $test_category2->save();
        //
        //     //Act
        //     $result = Category::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_category, $test_category2], $result);
        // }
        //
        // function testDeleteAll()
        // {
        //     //Arrange
        //     $name = "Wash the dog";
        //     $id = 1;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     $name2 = "Water the lawn";
        //     $id2 = 2;
        //     $test_category2 = new Category($name2, $id2);
        //     $test_category2->save();
        //
        //     //Act
        //     Category::deleteAll();
        //
        //     //Assert
        //     $result = Category::getAll();
        //     $this->assertEquals([], $result);
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
