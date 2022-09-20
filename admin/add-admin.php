<?php include('partials/menu.php') ?>

<!-- main content start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <form method="POST" action="">
            <span><?php 
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
            ?>
            </span> 
            <table class="tbl_full">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="ful_name" placeholder="enter full name"></td><br>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input type="text" name="username" placeholder="enter usernam"></td><br>

                </tr>
                <tr>

                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="enter password"></td><br>

                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secodary">
                    </td><br>

                </tr>
            </table>
        </form>
        <div class="clearfix"></div>
    </div>
</div>
<!-- main content end -->

<?php include('partials/footer.php') ?>

<?php

//check if submit form butto is clicked
if (isset($_POST['submit'])) {
    // $fulname = $_POST['ful_name'];
    // $username = $_POST['username'];
    // $password = md5($_POST['password']);

    // Trim the user’s name input
    $fulname = trim($_POST['ful_name']);
    // Strip HTML tags and apply escaping
    $stripped = mysqli_real_escape_string($conn, strip_tags($fulname));
    // Get string lengths
    $strlen = mb_strlen($stripped, 'utf8');
    // Check stripped string
    if ($strlen < 1) {
        // $errors[] = 'You forgot to enter your first name.';
        $_SESSION['error'] = 'You forgot to enter your first name.';
    } else {
        $fulname = $stripped;
    }

    // Trim the user’s name input
    $username = trim($_POST['username']);
    // Strip HTML tags and apply escaping
    $stripped = mysqli_real_escape_string($conn, strip_tags($username));
    // Get string lengths
    $strlen = mb_strlen($stripped, 'utf8');
    // Check stripped string
    if ($strlen < 1) {
        // $errors[] = 'You forgot to enter your first name.';
        $_SESSION['error'] = 'You forgot to enter your User name.';
    } else {
        $username = $stripped;
    }

    // Check that a password has been entered, if so, does it match the confirmed password
    if (empty($_POST['password'])) { #3
        $errors[] = 'Please enter a valid password';
    }
    if (!preg_match('/^\w{8,12}$/', $_POST['password'])) { #4
        // $errors[] = 'Invalid password, use 8 to 12 characters and no spaces.';
        $_SESSION['error'] = "Invalid password, use 8 to 12 characters and no spaces.";
    } else {
        $password = md5($_POST['password']);
    }

    // if ($_POST['psword1'] == $_POST['psword2']) { #5
    //     $p = mysqli_real_escape_string($dbcon, trim($psword1));
    // } else {
    //     $errors[] = 'Your two password do not match.';
    // }

    $sql = "INSERT INTO `tbl_admin` (`ful_name`, `username`, `password`) VALUES ('$fulname', '$username', '$password')";

    if (mysqli_query($conn, $sql)) {

        //set session
        $_SESSION['add'] = "Admin info added successfully";
        // Redirect to the 

        header("location:" . SITEURL . 'admin/manage_admin.php');
    } else {
        //set session
        $_SESSION['add'] = "Failed to add Admin";
        // Redirect to the 

        header('location:' . SITEURL . 'admin/add-admin.php');
    }

    //create a query
    // $query="INSERT INTO `tbl_admin` SET ful_name=`$fulname`, username=`$username`,password=`$password`";

    // ///coonnect to database
    // $res=mysqli_query($conn,$query);

    // if($res == null){
    //     echo "inserted to database";
    // }else{
    //     ECHO "NOT INSERTED";
    // }
    // mysqli_close($conn);

}

?>