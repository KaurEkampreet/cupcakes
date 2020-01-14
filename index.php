<?php
/*Ekampreet Kaur
* date: Jan/13/2020
* URL: http://ekaur.greenriverdev.com/328/cupcakes/index.php
* description: This program takes user name and check cupcake. The form collect the user info and validate.
 * it makes sure at least one cupcake was selected.
 * The order calculates the total and gives the user order with summary.
*/

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Cupcake</title>
</head>
<body>
<form id="CupcakeForm" method="post">
<div class="container">
    <img src="8878.jpeg" alt="cupcake-pic" class="float-right mr-3" width="250" height="250">
    <link rel="icon" type="image/png"
          href="choco.jpg">
    <h1>Cupcakes Fundraiser</h1>
    Your name:
    <div class="row">
        <input class="col-6" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];} ?>" placeholder="Please input your name.">
        <br>
    </div>

    <?php
    // define cupcake keys associated values
    $cupcakes = array(
        "grasshopper" => "The Grasshopper",
        "maple" => "Whiskey Maple Bacon",
        "carrot" => "Carrot Walnut",
        "caramel" => "Salted Caramel Cupcake",
        "velvet" => "Red Velvet",
        "lemon" => "Lemon Drop",
        "tiramisu" => "Tiramisu",
    );
    foreach ($cupcakes as $key => $value) {
    echo " <input class='form-check-inline' type='checkbox' name='flavor[]' value='$key'=>$value  </input>" . "<br>";
    }
    ?>
    <button type="submit" name="submit" class="btn btn-success mb-3">Order</button>

    <div class="container">
        <?php
        //display user's order with summary
        if(isset($_POST['submit'])) {
            $name = $_POST["name"];
            $cFlavors = $_POST["flavor"];
            $count = 0;
            echo " Thank you " . $name . ", Below is your ";
            echo " order summary:" . "<br>";
            echo "<ul>";
            $isvalid = true;
            foreach ($cFlavors as $item) {
                if (array_key_exists("$item", $cupcakes)) {
                    echo "<li>" . $cupcakes["$item"] . "</li>";
                    $count++;
                } else {
                    echo "<p class='text-danger'>Invalid Information. Please check your order. </p>";
                    $isvalid = false;
                    break;
                }
            }
            if (($isvalid)) {
                echo "<h5 class='text-info'> Total Order:  $" . $count * 3.50 . "</h5>";
                echo "</ul>";
            }
        }
        ?>
    </div>


    </div>
</form>

    <!-- jQuery , Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>
</body>
</html>