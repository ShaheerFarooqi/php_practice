<?php
include "config.php";
if (isset($_POST['update'])) {

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    //exit;

    $name      = $_POST['name'];
    $user_id   = $_POST['user_id'];
    $email     = $_POST['email'];
    $passsword = $_POST['password'];
    $sql       = "UPDATE `user` SET `name` = '$name',`email`= '$email', `password`='password' WHERE `id`= '$user_id'";
    $result    = $conn->query($sql);
    if ($result == TRUE) {
        echo "record updated succesfully";
        header('Location: view.php');
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {

    $user_id = base64_decode($_GET['id']);

    $sql    = "SELECT * FROM `user` WHERE `id`='$user_id'";
    $result = $conn->query($sql);
    // print_r($result);
    // exit;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name     = $row['name'];
            $email    = $row['email'];
            $password = $row['password'];
            $id       = $row['id'];
        }
        ?>
        <div class="form_main">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Update</legend>
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
                    <input type="text" autocomplete="off" placeholder="Name" name="name" id="name" value="<?php echo $name; ?>">
                    <input type="email" autocomplete="off" placeholder="email" name="email" id="email" value="<?php echo $email; ?>">
                    <input type="password" autocomplete="off" placeholder="password" name="password" id="password" value="<?php echo $password; ?>">
                    <input type="submit" value="Update" name="update">
                    <!-- <a href="view.php">View Records</a> -->
                </fieldset>

            </form>
        </div>
        <?php

    } else {
        header('Location: view.php');
    }
}
?>