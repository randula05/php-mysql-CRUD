<?php
    include_once 'includes/dbh.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Typr - Basic CRUD with PHP</title>
</head>

<body>
    <!-- As a link -->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Typr - PHP CRUD</a>
    </nav>

    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Type Racing Platform</h1>
                <br>
                <br>
                <form action="includes/addedit.php" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label>Speed</label>
                        <input type="number" class="form-control" name="speed" placeholder="Enter Speed" required>
                    </div>
                    
                    <?php 
                        if(isset($_GET['edit'])){
                            ?>
                            <input type="hidden" name="editid" value="<?php echo $_GET['edit'] ?>">
                            <button type="submit" class="btn btn-primary rounded-0" name="edit">Save User</button>
                            <a href="index.php" class="btn btn-danger rounded-0">Cancel</a>
                        
                            <?php
                        }else{
                            ?>
                            <button type="submit" class="btn btn-primary rounded-0" name="add">Add User</button>
                            <?php
                        }
                    ?>
                </form>
            </div>
        </div>
        <br>
        <br>
        <br>

        <?php
        $sql="select * from raceusers order by speed desc;";
        $result=mysqli_query($conn,$sql);
        ?>
        <div class="row">
            <div class="col-md-12">
                <h1>Current Users</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Speed</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row=mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td>
                                <?php echo $row['userid'] ?>
                            </td>
                            <td>
                                <?php echo $row['username'] ?>
                            </td>
                            <td>
                                <?php echo $row['speed'] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Record Actions">
                                    <a href="index.php?edit=<?php echo $row['userid'] ?>" class="btn btn-primary rounded-0">Edit</a>
                                    <form action="includes/delete.php" method="POST">
                                        <input type="hidden" name="delid" value="<?php echo $row['userid'] ?>">
                                        <button type="submit" class="btn btn-danger rounded-0" name="del">Delete</button>
                                    </form> 
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>