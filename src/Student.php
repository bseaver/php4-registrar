<?php
    Class Student
    {
        private $id;
        private $name;
        private $date_of_enrollment;

        function __construct($name = '', $date_of_enrollment = "0000-00-00", $id = null)
        {
            $this->setId($id);
            $this->setName($name);
            $this->setDateOfEnrollment($date_of_enrollment);
        }

        function setName($name)
        {
            $this->name = (string) $name;
        }

        function setDateOfEnrollment($date_of_enrollment)
        {
            $this->date_of_enrollment = (string) $date_of_enrollment;
        }

        function setId($id)
        {
            $this->id = (int) $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }
        function getDateOfEnrollment()
        {
            return $this->date_of_enrollment;
        }

        function save()
        {
            $GLOBALS['DB']->exec(
                "INSERT INTO students (name, date_of_enrollment)
                    VALUES ('{$this->getName()}', '{$this->getDateOfEnrollment()}');"
            );
            $this->setId($GLOBALS['DB']->lastInsertId());
        }

        static function getAll()
        {
            $returned_courses = $GLOBALS['DB']->query("SELECT * FROM courses ORDER BY id;");
            $courses = array();
            foreach($returned_courses as $course) {
                $course_name = $course['name'];
                $course_number = $course['date_of_enrollment'];
                $id = $course['id'];
                $new_course = new Course($course_name, $course_number, $id);
                array_push($courses, $new_course);
            }
            return $courses;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM students;");
        }

        static function find($search_id)
        {
            $found_student = null;
            $students = Student::getAll();
            foreach($students as $student) {
                $student_id = $student->getId();
                if ($student_id == $search_id) {
                  $found_student = $student;
                }
            }
            return $found_student;
        }

        function update($name, $date_of_enrollment)
        {
            $GLOBALS['DB']->exec("UPDATE students SET name = '{$name}', date_of_enrollment= '{$date_of_enrollment}' WHERE id = {$this->getId()};");
            $this->setName($name);
            $this->setDateOfEnrollment($date_of_enrollment);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM students WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM courses_students WHERE student_id = {$this->getId()};");
        }

        function addCourse()
        {
            $GLOBALS['DB']->exec("INSERT INTO courses_students (course_id, student_id) VALUES ({$this->getId()}, {$course->getId()});");
        }

        function getCourses()
        {
            $query = $GLOBALS['DB']->query("SELECT course_id FROM courses_students WHERE student_id = {$this->getId()};");
            // $course_ids = $query->fetchAll(PDO::FETCH_ASSOC);

            $courses = array();
            // foreach($course_ids as $id) {
            foreach($query as $id) {
                $course_id = $id['course_id'];
                $result = $GLOBALS['DB']->query("SELECT * FROM courses WHERE id = {$course_id};");
                $returned_course = $result->fetchAll(PDO::FETCH_ASSOC);

                $course_name = $returned_course[0]['course_name'];
                $id = $returned_course[0]['id'];
                $course_number = $returned_course[0]['course_number'];
                $new_course = new Course($course_name, $course_number, $id);
                array_push($courses, $new_course);
            }
            return $courses;
        }

    }

 ?>
