<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include("config.php");

$id = $_GET["id"];

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM events
        WHERE id='$id'
        AND user_id='$user_id'";

$result = mysqli_query($conn, $sql);

$event = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $event_date = mysqli_real_escape_string($conn, $_POST["event_date"]);
    $location = mysqli_real_escape_string($conn, $_POST["location"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $update = "UPDATE events SET

               title='$title',
               event_date='$event_date',
               location='$location',
               description='$description'

               WHERE id='$id'
               AND user_id='$user_id'";

    mysqli_query($conn, $update);

    header("Location:list_events.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Etkinlik Düzenle</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <h2>Etkinlik Düzenle</h2>

        <form method="POST">

            <div class="mb-3">

                <label>Etkinlik Adı</label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="<?php echo $event['title']; ?>">

            </div>

            <div class="mb-3">

                <label>Tarih</label>

                <input
                    type="date"
                    name="event_date"
                    class="form-control"
                    value="<?php echo $event['event_date']; ?>">

            </div>

            <div class="mb-3">

                <label>Konum</label>

                <input
                    type="text"
                    name="location"
                    class="form-control"
                    value="<?php echo $event['location']; ?>">

            </div>

            <div class="mb-3">

                <label>Açıklama</label>

                <textarea
                    name="description"
                    class="form-control"><?php echo $event['description']; ?></textarea>

            </div>

            <button class="btn btn-warning">
                Güncelle
            </button>

        </form>

    </div>

</body>

</html>
