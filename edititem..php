<?php 

    require_once("connection.php");
    $ItemID = $_GET['GetID'];
    $query = " select * from clothes where User_ID='".$ItemID."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $ItemNName = $row['ItemName'];
        $ImageName = $row['image_name'];
        $Price = $row['Price'];
        $Desc = $row['description'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Document</title>
</head>
<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Update Form in PHP</h3>
                        </div>
                        <div class="card-body">

                            <form action="update.php?ID=<?php echo trim($UserID) ?>" method="post">
                                <input type="text" class="form-control mb-2"   name="name" value="<?php echo $ItemNName?>">
                                <input type="email" class="form-control mb-2"   name="imgname" value="<?php echo $ImageName ?>">
                                <input type="text" class="form-control mb-2"   name="price" value="<?php echo $Price ?>">
                                <input type="email" class="form-control mb-2"   name="desc" value="<?php echo  $Desc ?>">

                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>