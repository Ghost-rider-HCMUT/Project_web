<?php
// Khai báo class Student
class Student
{
    //Khai báo thuộc tính
    public $id;
    public $name;
    public $birthday;
    public $gender;
    // Khai báo hàm xây dựng
    function __construct($id, $name, $birthday, $gender)
    {
        // this là đối tượng lưu trữ thông tin 
        // $this->id là truy cập vào thuộc tính id
        $this->id = $id;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->gender = $gender;
    }
}
