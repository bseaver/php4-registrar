<?php
    Class Course
    {
        private $id;
        private $course_name;
        private $course_number;

        function __construct($course_name = '', $course_number = '', $id = null)
        {
            $this->setId($id);
            $this->setCourseName($course_name);
            $this->setCourseNumber($course_number);
        }

        function setCourseName($course_name)
        {
            $this->course_name = (string) $course_name;
        }

        function setCourseNumber($course_number)
        {
            $this->course_number = (string) $course_number;
        }

        function setId($id)
        {
            $this->id = (int) $id;
        }

        function getCourseName()
        {
            return $this->course_name;
        }

        function getId()
        {
            return $this->id;
        }
        function getCourseNumber()
        {
            return $this->course_number;
        }

        function save()
        {
            $GLOBALS['DB']->exec(
                "INSERT INTO courses (course_name, course_number)
                    VALUES ('{$this->getCourseName()}', '{$this->getCourseNumber()}');"
            );
            $this->setId($GLOBALS['DB']->lastInsertId());
        }

        static function getAll()
        {
            $returned_courses = $GLOBALS['DB']->query("SELECT * FROM courses ORDER BY id;");
            $courses = array();
            foreach($returned_courses as $course) {
                $course_name = $course['course_name'];
                $course_number= $course['course_number'];
                $id = $course['id'];
                $new_course = new Course($course_name, $course_number, $id);
                array_push($courses, $new_course);
            }
            return $courses;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM courses;");
        }

        static function find($search_id)
        {
            $found_course = null;
            $courses = Course::getAll();
            foreach($courses as $course) {
                $course_id = $course->getId();
                if ($course_id == $search_id) {
                  $found_course = $course;
                }
            }
            return $found_course;
        }

        function update($course_name, $course_number)
        {
            $GLOBALS['DB']->exec("UPDATE courses SET course_name = '{$course_name}', course_number= '{$course_number}' WHERE id = {$this->getId()};");
            $this->setCourseName($course_name);
            $this->setCourseNumber($course_number);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM courses WHERE id = {$this->getId()};");
            // $GLOBALS['DB']->exec("DELETE FROM categories_tasks WHERE category_id = {$this->getId()};");
        }

        function addCourse()
        {
            // $GLOBALS['DB']->exec("INSERT INTO categories_tasks (category_id, task_id) VALUES ({$this->getId()}, {$task->getId()});");
        }

        function geCourses()
        {
            // $query = $GLOBALS['DB']->query("SELECT task_id FROM categories_tasks WHERE category_id = {$this->getId()};");
            // // $task_ids = $query->fetchAll(PDO::FETCH_ASSOC);
            //
            // $tasks = array();
            // // foreach($task_ids as $id) {
            // foreach($query as $id) {
            //     $task_id = $id['task_id'];
            //     $result = $GLOBALS['DB']->query("SELECT * FROM tasks WHERE id = {$task_id};");
            //     $returned_task = $result->fetchAll(PDO::FETCH_ASSOC);
            //
            //     $description = $returned_task[0]['description'];
            //     $id = $returned_task[0]['id'];
            //     $due_date = $returned_task[0]['due_date'];
            //     $done = $returned_task[0]['task_is_done'];
            //     $new_task = new Task($description, $id, $due_date, $done);
            //     array_push($tasks, $new_task);
            // }
            // return $tasks;
        }

    }

 ?>
