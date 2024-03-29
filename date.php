<?php
/*
 _____                                  
/ _  / __ ___   _____  _ __ __ _  /\/\  
\// / / _` \ \ / / _ \| '__/ _` |/    \ 
 / //\ (_| |\ V / (_) | | | (_| / /\/\ \
/____/\__,_| \_/ \___/|_|  \__,_\/    \/                                      
*/


//show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
    header("location: ./");
    exit();
}
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$sexuality = $_SESSION['sexuality'];
$dateSent = false;
include "config.php";
include "functions.php";

$sql = "SELECT * FROM credentials";
$result = mysqli_query($conn, $sql);

$users = array();
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

shuffle($users);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($users as $i => $user) {
        if (isset($_POST["send-date-$i"])) {
            $dateSent = true;
            $senderId = $_SESSION['ID'];
            $date = mysqli_real_escape_string($conn, $_POST['sender-date']);
            $time = mysqli_real_escape_string($conn, $_POST['sender-time']);
            $message = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['sender-message']));
            $place = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['sender-place']));
            $recipientId = mysqli_real_escape_string($conn, $_POST['recipientId']);

            $datetime = $date . ' ' . $time;
            $sql = "INSERT INTO dates (senderId, recipientId, dateInvitation, message, place)
                    VALUES ('$senderId', '$recipientId', '$datetime', '$message', '$place')";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="styles/index.css">
        <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
        <title>🖤 Chci rande! 🧡</title>
    </head>

    <body class="d-flex flex-column min-vh-100">
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php"><img src="./img/logo.png" width="200px" height="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./home.php">Domu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #ff9900;" href="./date.php">Chci rande!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./help.php">Podpora</a>
                    </li>
                    <li>
                        <a class="nav-link" href="./chat.php">Chat</a>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./shop.php">Obchod</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" style="color: #ff9900;"
                           href="./settings.php"><?php echo $firstName . " " . $lastName ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: red;" href="./logout.php">Odhlásit se</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Date was sent successfully-->
    <?php if ($dateSent) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Úspěch!</strong> Žádost o rande byla úspěšně odeslána.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(function () {
                window.location.href = "./date.php";
            }, 2500);
        </script>
    <?php } ?>

    <section id="dates" class="p-5 bg-dark">
        <div class="container">
            <h2 class="text-center text-white">Nabídka</h2>
            <br>
            <div class="row g-4">
                <?php
                foreach ($users as $i => $user) {
                    if ($users[$i]['email'] != "admin@admin.com" && $users[$i]['email'] != $_SESSION['email']) {
                        $firstNameDB = $users[$i]['firstName'];
                        $lastNameDB = $users[$i]['lastName'];
                        $aboutMeDB = $users[$i]['aboutMe'];
                        $sexualityDB = $users[$i]['sexuality'];
                        $gender = $users[$i]['gender'];
                        $birthDateDB = $users[$i]['birthDate'];
                        $now = date("Y-m-d");
                        $diff = date_diff(date_create($birthDateDB), date_create($now));
                        $profilePictureDB = "./profilePictures/" . $users[$i]['profilePicture'];
                        echo '<div class="col-md-6 col-lg-3">';
                        echo '<div class="card bg-secondary text-white">';
                        echo '<img src="' . $profilePictureDB . '" class="card-img-top rounded text-center" alt="User Image" style="width: 100%; height: 200px;">';
                        echo '<div class="card-body text-center">';
                        echo '<h3 class="card-title"><span style="font-weight: 600;">' . $firstNameDB . '</span></h3>';
                        echo '<p class="card-title" style="font-size: large;">' . $lastNameDB . '</p>';
                        echo '<p class="card-subtitle mb-2"><b>Věk: </b>' . $diff->format('%y') . '</p>';
                        echo '<p class="card-subtitle mb-2"><b>Pohlaví: </b>' . gender($gender) . '</p>';
                        echo '<h6 class="card-subtitle mb-2"><b>Sexualita: </b></h6>';
                        echo '<p class="card-text">' . sexuality($sexualityDB) . '</p>';
                        echo '<h6 class="card-subtitle mb-2"><b>O mně:</b> </h6>';
                        echo '<p class="card-text">' . $aboutMeDB . '</p>';
                        echo '<button type="button" class="btn btn-primary mr-2 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal' . $i . '">Požádat o rande</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                        echo '<div class="modal fade" id="exampleModal' . $i . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                        echo '<div class="modal-dialog">';
                        echo '<div class="modal-content" id="cardbg">';
                        echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="exampleModalLabel">Požádat o rande</h5>';
                        echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                        echo '</div>';
                        echo '<div class="modal-body">';
                        echo '<form method="post">';
                        echo '<div class="mb-3">';
                        echo '<label for="sender-name" class="col-form-label">Jméno:</label>';
                        echo '<input type="text" class="form-control" id="sender-name" name="sender-name" value="' . $firstNameDB . ' ' . $lastNameDB . '" disabled>';
                        echo '</div>';
                        echo '<div class="mb-3">';
                        echo '<label for="sender-date" class="col-form-label">Datum:</label>';
                        echo '<input type="date" class="form-control" id="sender-date" name="sender-date" required min="' . date('Y-m-d') . '">';
                        echo '</div>';
                        echo '<div class="mb-3">';
                        echo '<label for="sender-time" class="col-form-label">Čas:</label>';
                        echo '<input type="time" class="form-control" id="sender-time" name="sender-time" required>';
                        echo '</div>';
                        echo '<div class="mb-3">';
                        echo '<label for="sender-place" class="col-form-label">Místo:</label>';
                        echo '<input type="text" class="form-control" id="sender-place" name="sender-place" required>';
                        echo '</div>';
                        echo '<div class="mb-3">';
                        echo '<label for="sender-message" class="col-form-label">Zpráva:</label>';
                        echo '<textarea class="form-control" id="sender-message" name="sender-message"></textarea>';
                        echo '</div>';
                        echo '<div class="modal-footer">';
                        echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zavřít</button>';
                        echo '<button type="submit" class="btn btn-primary" name="send-date-' . $i . '">Odeslat</button>';
                        echo '</div>';
                        echo '<input type="hidden" name="recipientId" value="' . $users[$i]['ID'] . '">';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } ?>
            </div>
        </div>
    </section>


    <!--FOOTER-->
    <footer class="p-1 bg-dark text-white text-center position-relative mt-auto">
        <div class="container">
            <p class="lead">Copyright &copy; PROCHY | SPŠE Ječná</p>
            <a href="#" class="position-absolute bottom-0 end-0 p-5"><i class="bi-arrow-up-circle h1"
                                                                        style="color: #ff9900;"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script>
        // Function to check if the selected time is valid
        function checkTimeValidity() {
            // Get the current date
            var today = new Date();
            var todayDate = today.toISOString().slice(0,10); // Get YYYY-MM-DD format

            // Get the value of the selected date
            var selectedDateInput = document.getElementById("sender-date");
            var selectedDate = new Date(selectedDateInput.value);

            // Get the formatted date string of the selected date
            var selectedDateFormatted = selectedDate.toISOString().slice(0,10); // Get YYYY-MM-DD format

            // Check if the selected date is today's date
            if (selectedDateFormatted === todayDate) {
                // Get the current time
                var currentTime = new Date();

                // Get hours and minutes of the current time
                var currentHours = currentTime.getHours();
                var currentMinutes = currentTime.getMinutes();

                // Get hours and minutes of the selected time
                var selectedTime = document.getElementById("sender-time").valueAsDate;
                var selectedHours = selectedTime.getHours();
                var selectedMinutes = selectedTime.getMinutes();

                // Compare the selected time with the current time
                if (selectedHours < currentHours || (selectedHours === currentHours && selectedMinutes < currentMinutes)) {
                    // Display an alert
                    alert("Prosím, vyberte platný čas.");

                    // Clear the input field
                    document.getElementById("sender-time").value = null;
                }
            }
        }

        // Add event listener to the input field to check validity on change
        document.getElementById("sender-time").addEventListener("change", checkTimeValidity);

        // Add event listener to the date input field to check if the date is today
        document.getElementById("sender-date").addEventListener("change", checkTimeValidity);
    </script>


    </body>
</html>
<?php
mysqli_close($conn);
?>