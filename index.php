<?php 

include "./inc/conn.php";
include "./inc/form.php";

$sql2 = "SELECT * FROM `users` ORDER BY RAND() LIMIT 1";
$res = mysqli_query($conn, $sql2);

$users = mysqli_fetch_all($res, MYSQLI_ASSOC);

// echo "<pre>"; 
// print_r($users); 
// echo "</pre>";


mysqli_free_result($res);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">
    <title>mywebapp</title>
</head>
<body>

    <div class="container">

        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <img class="img-fluid" src="./images/icon.jpg" alt="the amazing spider-man">
            <h1 class="display-4 fw-normal">Win With Spidey</h1>
            <p class="lead fw-normal">Time remaining to open registeration.</p>
            <h3 id="demo"></h3>
            <a class="btn btn-outline-secondary" href="#">Coming soon</a>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">We All Know That Spider-Man Is The Best</li>
            <li class="list-group-item">Follow Me</li>
            
        </ul>

        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <form class="mt-5" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <h3>Please Enter Your Info</h3>
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" name="firstName" class="form-control" id="firstName" value="<?php echo $firstName; ?>" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text error"><?php echo $errors["firstNameError"]; ?></div>
                </div>

                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" name="lastName" class="form-control" id="lastName" value="<?php echo $lastName; ?>" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text error"><?php echo $errors["lastNameError"]; ?></div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text error"><?php echo $errors["emailError"]; ?></div>
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    

    <!-- <form action="index.php" method="POST">
        <input type="text" name="firstName" id="firstName" placeholder="First Name">
        <input type="text" name="lastName" id="lastName" placeholder="Last Name">
        <input type="text" name="email" id="email" placeholder="Email">
        <input type="submit" value="send" name="submit">

    </form> -->

    <!-- Button trigger modal -->
    <div class="d-grid gap-2 col-6 mx-auto my-5">
        <button id="winner" type="button" class="btn btn-primary">
        Choose Winner
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">WWCD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach($users as $user){  ?>
                        <h1 class="display-3 text-center"><?php echo htmlspecialchars($user['firstName']) . " " . htmlspecialchars($user["lastName"]) . "<br>" . htmlspecialchars($user["email"]); ?> </h1>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="loader-con">
        <div id="loader">
            <canvas id="circularLoader" width="200" height="200"></canvas>
        </div>
    </div>

    <!-- <div id="cards" class="row mb-5 pb-5">
        <?php foreach($users as $user){  ?>
            <div class="col-sm-6">
                <div class="card my-2 bg-light">
                    <h5><?php echo htmlspecialchars($user['firstName']) . " " . htmlspecialchars($user["lastName"]); ?></h5>
                    <p><?php echo htmlspecialchars($user["email"]); ?></p>
                </div>
            </div>
        
        <?php } ?>
    </div> -->

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
    
    <script src="./js/loader.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>