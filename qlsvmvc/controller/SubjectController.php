<?php
class SubjectController
{
     function index()
     {
          // Hiện thị danh sách môn học.
          $search = $_GET['search'] ?? '';
          $subjectRepository = new SubjectRepository();
          if ($search) {
               $subjects = $subjectRepository->getByPattern($search);
          } else {
               $subjects = $subjectRepository->getAll();
          }
          require 'view/subject/index.php';
     }

     function create()
     {
          require 'view/subject/create.php';
     }

     function store()
     {
          $data = $_POST;
          $subjectRepository = new SubjectRepository();
          $name = $_POST['name'];
          if ($subjectRepository->save($data)) {
               $_SESSION['success'] = "Đã tạo môn học $name thành công";
               header('location:/?c=subject');
               exit;
          }
          $_SESSION['error'] = $subjectRepository->error;
          header('location:/?c=subject');
     }

     function edit()
     {
          // Hiện thị form cập nhật môn học
          $id = $_GET['id'];
          $subjectRepository = new SubjectRepository();
          $subject = $subjectRepository->find($id);
          require 'view/subject/edit.php';
     }

     function update()
     {
          // Cập nhật thông tin của môn học xuống database

          // Lấy dữ liệu môn học từ DB
          $id = $_POST['id'];
          $subjectRepository = new SubjectRepository();
          $subject = $subjectRepository->find($id);

          //Cập nhật giá trị mới vào đối tương subject
          $subject->name = $_POST['name'];
          $subject->number_of_credit = $_POST['number_of_credit'];
          $name = $subject->name;
          if ($subjectRepository->update($subject)) {
               $_SESSION['success'] = "Đã cập nhật môn học $name thành công";
               header('location:/?c=subject');
               exit;
          }
          $_SESSION['error'] = $subjectRepository->error;
          header('location:/?c=subject');
     }

     function destroy()
     {
          // Xoá môn học
          $id = $_GET['id'];
          $subjectRepository = new SubjectRepository();
          $subject = $subjectRepository->find($id);
          $name = $subject->name;
          if ($subjectRepository->destroy($id)) {
               $_SESSION['success'] = "Đã xoá sinh viên $name thành công";
               header('location:/?c=subject');
               exit;
          }
          $_SESSION['error'] = $subjectRepository->error;
          header('location:/?c=subject');
     }
}