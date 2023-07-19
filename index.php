<?php
require_once 'dbhelp.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="panel-heading">
            <a class="text-decoration-none" href="index.php">
                <h3>Quản lý thông tin sinh viên</h3>
            </a>
            <div class="row">
                <div class="col-6">
                    <form method="get">
                        <input type="text" name="search" class="form-control" style="margin-bottom: 15px;" placeholder="Tìm kiếm theo tên">
                    </form>
                </div>
                <div class="col-6">
                    <button class="btn btn-success  float-right" onclick="window.open('input.php', '_self')">Add Student</button>
                </div>
            </div>
        </div>
        <div class="panel-body mt-1">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Tuổi</th>
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th width="60px"></th>
                        <th width="60px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['search']) && $_GET['search'] != '') {
                        $sql = 'SELECT * FROM students WHERE fullname LIKE "%' . $_GET['search'] . '%"';
                    } else {
                        $sql = "SELECT * FROM students";
                    }
                    $studentList = executeResult($sql);

                    foreach ($studentList as $std) {
                        echo '
                                <tr>
                                    <td>' . $std['id'] . '</td>
                                    <td>' . $std['fullname'] . '</td>
                                    <td>' . $std['age'] . '</td>
                                    <td>' . $std['gender'] . '</td>
                                    <td>' . $std['email'] . '</td>
                                    <td>' . $std['phone_number'] . '</td>
                                    <td>' . $std['address'] . '</td>
                                    <td><button class="btn btn-warning" onclick=\'window.open("input.php?id=' . $std['id'] . '", "_self")\'>Edit</button></td>
                                    <td><button class="btn btn-danger" onclick="deleteStudent(' . $std['id'] . ')">Delete</button></td>
                                </tr>
                        ';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        function deleteStudent(id) {
            option = confirm('Bạn có muốn xoá sinh viên này không?');
            if (!option) {
                return;
            }
            $.post('delete_student.php', {
                'id': id
            }, function(data) {
                alert(data);
                location.reload();
            })
        }
    </script>

</html>