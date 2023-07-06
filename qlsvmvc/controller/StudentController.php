<?php
class StudentController
{
    function index()
    {
        //Hiển thị danh sách sinh viên
        //mặc định
        // $search = !empty($_GET['search']) ? $_GET['search'] : '';
        // toán tử 3 ngôi rút gọn
        $search = $_GET['search'] ?? '';
        $studentRepository = new StudentRepository();
        if ($search) {
            $students = $studentRepository->getByPattern($search);
        } else {
            $students = $studentRepository->getAll();
        }

        require 'view/student/index.php';
    }

    function create()
    {
        // Hiển thị form tạo sinh viên
        require 'view/student/create.php';
    }

    function store()
    {
        //Lưu sinh viên
        $data = $_POST;
        $studentRepository = new StudentRepository();
        $name = $_POST['name'];
        if ($studentRepository->save($data)) {
            $_SESSION['success'] = "Đã tạo sinh viên $name thành công";
            header('location:/'); //trở về danh sách sinh viên
            exit;
        }
        $_SESSION['error'] = $studentRepository->error;
        header('location:/'); //trở về danh sách sinh viên
    }

    function edit()
    {
        //Hiển thị form cập nhật sinh viên
        $id = $_GET['id'];
        $studentRepository = new StudentRepository();
        $student = $studentRepository->find($id);
        require 'view/student/edit.php';
    }

    function update()
    {
        //Cập nhật thông tin của sinh viên xuống database
        $id = $_POST['id'];
        //lấy dữ liệu sinh viên từ database
        $studentRepository = new StudentRepository();
        $student = $studentRepository->find($id);

        // Cập nhật giá trị mới vào đối tượng student
        $student->name = $_POST['name'];
        $student->birthday = $_POST['birthday'];
        $student->gender = $_POST['gender'];
        $name = $student->name;
        if ($studentRepository->update($student)) {
            $_SESSION['success'] = "Đã cập nhật sinh viên $name thành công";
            header('location:/'); //trở về danh sách sinh viên
            exit;
        }
        $_SESSION['error'] = $studentRepository->error;
        header('location:/'); //trở về danh sách sinh viên
    }

    function destroy()
    {
        //xóa sinh viên
        $id = $_GET['id'];
        $studentRepository = new StudentRepository();
        $student = $studentRepository->find($id);
        $name = $student->name;
        if ($studentRepository->destroy($id)) {
            $_SESSION['success'] = "Đã xóa sinh viên $name thành công";
            header('location:/'); //trở về danh sách sinh viên
            exit;
        }
        $_SESSION['error'] = $studentRepository->error;
        header('location:/'); //trở về danh sách sinh viên
    }
}