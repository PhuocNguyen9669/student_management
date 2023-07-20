<?php
require_once('dbhelp.php');
require_once('config.php');

$fullname = $age = $gender = $email = $phone_number =  $address = '';
if (!empty($_POST)) {
    $id = "";

    if (isset($_POST['fullname'])) {
        $fullname = $_POST['fullname'];
    }

    if (isset($_POST['age'])) {
        $age = $_POST['age'];
    }

    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    if (isset($_POST['phone_number'])) {
        $phone_number = $_POST['phone_number'];
    }

    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    $fullname = str_replace('\'', '\\\'', $fullname);
    $age = str_replace('\'', '\\\'', $age);
    $gender = str_replace('\'', '\\\'', $gender);
    $email = str_replace('\'', '\\\'', $email);
    $phone_number = str_replace('\'', '\\\'', $phone_number);
    $address = str_replace('\'', '\\\'', $address);
    $id = str_replace('\'', '\\\'', $id);
    if ($id != '') {
         // update
        $sql = "UPDATE students SET fullname = '$fullname', age = '$age', gender = '$gender', email = '$email', phone_number = '$phone_number', address = '$address' WHERE id =".$id;

    } else {
        // insert
        $sql = "INSERT INTO students(fullname, age, gender, email, phone_number, address) VALUES
        ('$fullname', '$age', '$gender', '$email', '$phone_number', '$address')";
    }


    execute($sql);

    header('Location: index.php');
    die();
}

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'SELECT * FROM students WHERE id = ' . $id;
    $studentList = executeResult($sql);
    if ($studentList != null && count($studentList) > 0) {
        $std = $studentList[0];
        $fullname = $std['fullname'];
        $age = $std['age'];
        $gender = $std['gender'];
        $email = $std['email'];
        $phone_number = $std['phone_number'];
        $address = $std['address'];
    } else {
        $id = '';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Registation Form * Form Tutorial</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="form-validation.js"></script>
    <style>
        input.error {
            font-weight: 300;
            color: red;
        }
        label.error {
            font-weight: 300;
            color: red;
        }
    </style>
</head> 
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center" id="students">Add Student</h2>
            </div>
            <div class="panel-body">
                <form method="post" id="form-validate">
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input type="number" name="id" value="<?= $id ?>" style="display: none;">
                        <input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?= $fullname; ?>">
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" value="<?= $age; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="custom-select my-1 mr-sm-2" id="gender" name="gender">
                            <option value="male" <?php if (isset($gender) && $gender == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="female" <?php if (isset($gender) && $gender == 'Female') echo 'selected'; ?>>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone number:</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?= $phone_number; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= $address; ?>">
                    </div>
                    <button class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    if (<?= $_GET['id'];  ?> !== '') {
        $('#students').text('Edit Student');
    }
</script>
</html>