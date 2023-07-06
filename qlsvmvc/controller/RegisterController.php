<?php
class RegisterController
{
     function index()
     {
          $search = $_GET['search'] ?? '';
          $registerRepository = new RegisterRepository();
          if ($search) {
               $registers = $registerRepository->getByPattern($search);
          } else {
               $registers = $registerRepository->getAll();
          }
          require 'view/register/index.php';
     }

     function create()
     {    // Lấy danh sách sinh viên
          $studentRepository = new StudentRepository();
          $students = $studentRepository->getAll();

          // Lấy danh sách các môn học
          $subjectRepository = new SubjectRepository();
          $subjects = $subjectRepository->getAll();

          // Hiện thị form tạo sinh viên
          require 'view/register/create.php';
     }

     function store()
     {
          // Lưu sinh viên

     }

     function edit()
     {
          // Hiện thị form cập nhật sinh viên
     }

     function update()
     {
          // Cập nhật thông tin của sinh viên xuống database
     }

     function destroy()
     {
          // Xoá sinh viên
     }
}