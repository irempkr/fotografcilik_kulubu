<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $event_date = mysqli_real_escape_string($conn, $_POST["event_date"]);
    $location = mysqli_real_escape_string($conn, $_POST["location"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $user_id = $_SESSION["user_id"];

    $kontrol = "
        SELECT *
        FROM events
        WHERE title = '$title'
        AND event_date = '$event_date'
        AND user_id = '$user_id'
    ";

    $sonuc = mysqli_query($conn, $kontrol);

    if (mysqli_num_rows($sonuc) > 0) {

        echo "
            <div class='alert alert-danger'>
                Bu etkinlik zaten kayıtlı.
            </div>
        ";

    } else {

        $sql = "
            INSERT INTO events
            (user_id, title, event_date, location, description)
            VALUES
            (
                '$user_id',
                '$title',
                '$event_date',
                '$location',
                '$description'
            )
        ";

        if (mysqli_query($conn, $sql)) {

            echo "
                <div class='alert alert-success'>
                    Etkinlik eklendi
                </div>
            ";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Etkinlik Ekle</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <a href="dashboard.php" class="btn btn-secondary mb-3">
            ← Dashboard
        </a>

        <h2>Etkinlik Ekle</h2>

        <form method="POST">

            <div class="mb-3">
                <label>Etkinlik Adı</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tarih</label>
                <input type="date" name="event_date" class="form-control">
            </div>

            <div class="mb-3">
                <label>Konum</label>
                <input type="text" name="location" class="form-control">
            </div>

            <div class="mb-3">
                <label>Açıklama</label>
                <textarea
                    name="description"
                    class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">
                Kaydet
            </button>

        </form>

    </div>

</body>

</html>
