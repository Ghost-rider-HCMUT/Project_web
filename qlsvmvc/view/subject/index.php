<?php require 'layout/header.php' ?>
<h1>Danh sách Môn Học</h1>
<a href="?c=subject&a=create" class="btn btn-info">Add</a>
<?php require 'layout/search.php' ?>
<table class="table table-hover">
     <thead>
          <tr>
               <th>#</th>
               <th>Mã MH</th>
               <th>Tên</th>
               <th>Số tín chỉ</th>
               <th>Edit</th>
               <th>Destroy</th>
          </tr>
     </thead>
     <tbody>
          <?php
          $order = 0;
          foreach ($subjects as $subject) :
               $order++;
          ?>
          <tr>
               <td><?= $order ?></td>
               <td><?= $subject->id ?></td>
               <td><?= $subject->name ?></td>
               <td><?= $subject->number_of_credit ?></td>
               <td><a class="btn btn-warning btn-sm" href="?c=subject&a=edit&id=<?= $subject->id ?>">Sửa</a></td>
               <td>
                    <button class="destroy btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"
                         type="subject" data-href="?c=subject&a=destroy&id=<?= $subject->id ?>">Xóa</button>
               </td>
          </tr>
          <?php endforeach ?>
     </tbody>
</table>
<div>
     <span>Số lượng: <?= $order ?></span>
</div>
<?php require 'layout/footer.php' ?>