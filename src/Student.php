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
            // $GLOBALS['DB']->exec("INSERT INTO categories (name) VALUES ('{$this->getName()}')");
            // $this->id= $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            // $returned_categories = $GLOBALS['DB']->query("SELECT * FROM categories;");
            // $categories = array();
            // foreach($returned_categories as $category) {
            //     $name = $category['name'];
            //     $id = $category['id'];
            //     $new_category = new Category($name, $id);
            //     array_push($categories, $new_category);
            // }
            // return $categories;
        }

        static function deleteAll()
        {
        //   $GLOBALS['DB']->exec("DELETE FROM categories;");
        }

        static function find($search_id)
        {
            // $found_category = null;
            // $categories = Category::getAll();
            // foreach($categories as $category) {
            //     $category_id = $category->getId();
            //     if ($category_id == $search_id) {
            //       $found_category = $category;
            //     }
            // }
            // return $found_category;
        }

        function update()
        {
            // $GLOBALS['DB']->exec("UPDATE categories SET name = '{$new_name}' WHERE id = {$this->getId()};");
            // $this->setName($new_name);
        }

        function delete()
        {
            // $GLOBALS['DB']->exec("DELETE FROM categories WHERE id = {$this->getId()};");
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
