<?php
require_once 'dbhelp.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM students WHERE id=" .$id;

    execute($sql);
     echo 'Xóa sinh viên thành công!';
}

?>