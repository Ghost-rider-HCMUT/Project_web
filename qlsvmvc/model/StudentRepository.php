<?php
class StudentRepository
{
    // Lấy các dòng dữ liệu trong database (bảng student)
    // Trả về danh sách các đối tượng Student dựa vào các dòng
    // Mỗi dòng tương ứng 1 đối tượng student
    protected function fetch($cond = '')
    {
        // bên trong hàm không nhìn thấy biến ngoài hàm
        //muốn nhìn thấy dùng từ khóa global
        global $conn;
        $sql = "SELECT * FROM student";
        if ($cond) {
            $sql .= " WHERE $cond";
            //SELECT * FROM student WHERE name LIKE '%ty%'
        }
        $result = $conn->query($sql);
        $students = []; //danh sách rỗng
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $birthday = $row['birthday'];
                $gender = $row['gender'];
                //Chuyển 1 dòng dữ liệu thành 1 object 
                $student = new Student($id, $name, $birthday, $gender);
                // [] bên trái là thêm 1 phần tử vào danh sách
                $students[] = $student;
            }
        }
        //danh sách chứa các đối tượng sinh viên
        return $students;
    }

    function getByPattern($search)
    {
        $cond = "name LIKE '%$search%'";
        $students = $this->fetch($cond);
        return $students;
    }

    function getAll()
    {
        $students = $this->fetch();
        return $students;
    }

    function save($data)
    {
        global $conn;
        $name = $data['name'];
        $birthday = $data['birthday'];
        $gender = $data['gender'];
        $sql = "INSERT INTO student (name, birthday, gender) VALUES('$name', '$birthday', '$gender')";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = $sql . '<br>' . $conn->error;
        return false;
    }

    function find($id)
    {
        $cond = "id = $id";
        $students = $this->fetch($cond);
        // $student = $students[0];
        // lấy phần tử đầu tiên trong danh sách
        $student = current($students);
        return $student;
    }

    function update($student)
    {
        global $conn;
        $name = $student->name;
        $birthday = $student->birthday;
        $gender = $student->gender;
        $id = $student->id;
        $sql = "UPDATE student SET name = '$name', birthday = '$birthday', gender = '$gender' WHERE id = $id";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = $sql . '<br>' . $conn->error;
        return false;
    }

    function destroy($id)
    {
        global $conn;
        $sql = "DELETE FROM student WHERE id=$id";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = $sql . '<br>' . $conn->error;
        return false;
    }
}
