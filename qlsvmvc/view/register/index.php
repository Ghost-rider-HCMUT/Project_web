<?php require 'layout/header.php' ?>
<h1>Danh sách sinh viên đăng ký môn học</h1>
<a href="?c=register&a=create" class="btn btn-info">Add</a>
<?php require 'layout/search.php' ?>
<table class="table table-hover">
     <thead>
          <tr>
               <th>#</th>
               <th>Mã SV</th>
               <th>Tên SV</th>
               <th>Mã MH</th>
               <th>Tên MH</th>
               <th>Điểm</th>
               <th></th>
               <th></th>
          </tr>
     </thead>
     <tbody>
          <?php
          $order = 0;
          foreach ($registers as $register) :
               $order++;
          ?>
          <tr>
               <td><?= $order ?></td>
               <td><?= $register->student_id ?></td>
               <td><?= $register->student_name ?></td>
               <td><?= $register->subject_id ?></td>
               <td><?= $register->subject_name ?></td>
               <td><?= $register->score ?></td>
               <td><a class="btn btn-warning btn-sm" href="?c=register&a=edit&id=<?= $register->id ?>">Sửa</a></td>
               <td><button class="btn btn-danger btn-sm destroy"
                         data-href="?c=register&a=destroy&id=<?= $register->id ?>" data-target="#exampleModal"
                         data-toggle="modal">Xoá</button></td>
          </tr>
          <?php endforeach ?>
     </tbody>
</table>
<div>
     <span><?= $order ?></span>
</div>
<?php require 'layout/footer.php' ?>