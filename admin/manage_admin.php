<?php include('partials/menu.php') ?>

<!-- main content start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>
        <span><?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                ?>
        </span>
        <br>
        <br>
        <br>
        <br>
        <a href="add-admin.php" class="btn-primary">Add admin</a>
        <br>
        <br>
        <table class="tbl_full">

            <tr>
                <th>ID</th>
                <th>Ful name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
            $query = "SELECT * FROM tbl_admin";

            //executte our query
            $result = mysqli_query($conn, $query);

            if ($result == true) {
                //check the number or rows in the database
                $count = mysqli_num_rows($result);

                $n=1;

                if ($count > 0) {
                    while($rows =mysqli_fetch_assoc($result)){
                        // extract($row);
                        echo '
                        <tr>
                            <td>'. $n++. '</td>
                            <td>'. $rows['ful_name']. '</td>
                            <td>'. $rows['username']. '</td>
                            <td>
                                <a href="#" class="btn-secodary">update</a>
                                <a href="#" class="btn-danger">Delete</a>
                            </td>
                        </tr>
                        ';
                        
                    }
                } else {
                    echo "no data found";
                }
            }

            ?>


            
           


        </table>

        <div class="clearfix"></div>
    </div>
</div>
<!-- main content end -->

<?php include('partials/footer.php') ?>