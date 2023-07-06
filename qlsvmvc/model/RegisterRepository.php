<?php
class RegisterRepository
{
     // Hàm find lấy các dòng dữ liệu ra khỏi DB
     public function fetch($cond = '')
     {
          global $conn;
          $sql = "SELECT register.*, student.name AS student_name, subject.name AS subject_name FROM register
          JOIN student ON student.id = register.student_id
          JOIN subject ON subject.id = register.subject_id
          ";
          if ($cond) {
               $sql .= " WHERE $cond";
          }
          $result = $conn->query($sql);
          $registers = [];
          if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $student_id = $row['student_id'];
                    $subject_id = $row['subject_id'];
                    $score = $row['score'];
                    $student_name = $row['student_name'];
                    $subject_name = $row['subject_name'];
                    $register = new Register($id, $student_id, $subject_id, $score, $student_name, $subject_name);
                    $registers[] = $register;
               }
          }
          return $registers;
     }

     public function getByPattern($search)
     {
          $cond = " WHERE name LIKE '%$search%'";
          $registers = $this->fetch($cond);
          return $registers;
     }

     public function getAll()
     {
          $registers =  $this->fetch();
          return $registers;
     }
}