<?php
class SubjectRepository
{
     protected function fetch($cond = '')
     {
          //Lấy ra các dòng dữ liệu trong DB - Bảng subject
          // Trả về danh sách các đối tượng Subject đưa vào các dòng
          // Mỗi dòng tương ứng với 1 đối tượng Subject
          global $conn;
          $sql = "SELECT * FROM subject";
          if ($cond) {
               $sql .= " WHERE $cond";
          }
          $result = $conn->query($sql);
          $subjects = [];
          if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $number_of_credit = $row['number_of_credit'];
                    //Chuyển một dòng dữ liệu thành một object
                    $subject = new Subject($id, $name, $number_of_credit);
                    // Thêm phần tử mới được tạo vào dánh sách
                    $subjects[] = $subject;
               }
          }
          return $subjects;
     }

     function getByPattern($search)
     {
          $cond = "name LIKE '%$search%'";
          $subjects = $this->fetch($cond);
          return $subjects;
     }

     function getAll()
     {
          $subjects = $this->fetch();
          return $subjects;
     }

     function save($data)
     {
          global $conn;
          $name = $data['name'];
          $number_of_credit = $data['number_of_credit'];
          $sql = "INSERT INTO subject(name, number_of_credit) VALUES('$name', '$number_of_credit')";
          if ($conn->query($sql)) {
               return true;
          }
          $this->error = $sql . '<br>' . $conn->error;
          return false;
     }

     function find($id)
     {
          $cond = "id = $id";
          $subjects = $this->fetch($cond);
          // Lấy phần tử đầu tiên trong mảng sử dụng hàm current(): Vì mảng bắt đầu bằng chỉ số 0
          $subject = current($subjects);
          return $subject;
     }

     function update($subject)
     {
          global $conn;
          $name = $subject->name;
          $number_of_credit = $subject->number_of_credit;
          $id = $subject->id;
          $sql = "UPDATE subject SET name='$name', number_of_credit=$number_of_credit WHERE id=$id";
          if ($conn->query($sql)) {
               return true;
          }
          $this->error = $sql . '<br>' . $conn->error;
          return false;
     }

     public function destroy($id)
     {
          global $conn;
          $sql = "DELETE FROM subject WHERE id=$id";
          if ($conn->query($sql)) {
               return true;
          }
          $this->error = $sql . '<br>' . $conn->error;
          return false;
     }
}