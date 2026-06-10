<?php

session_start();
 header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if(!isset($_SESSION["user_id"]))
{
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">
            📸 Fotoğrafçılık Kulübü
        </span>

        <a href="logout.php" class="btn btn-danger">
            Çıkış Yap
        </a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h2>
                Hoşgeldin,
                <?php echo $_SESSION["username"]; ?>
            </h2>

            <p class="text-muted">
                Fotoğrafçılık Kulübü Etkinlik Yönetim Sistemi
            </p>

            <hr>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <div class="card border-primary">

                        <div class="card-body text-center">

                            <h4>➕</h4>

                            <h5>Yeni Etkinlik</h5>

                            <p>
                                Kulüp için yeni bir etkinlik oluştur.
                            </p>

                            <a href="add_event.php"
                               class="btn btn-primary">
                                Etkinlik Ekle
                            </a>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <div class="card border-success">

                        <div class="card-body text-center">

                            <h4>📋</h4>

                            <h5>Etkinliklerim</h5>

                            <p>
                                Eklediğin etkinlikleri görüntüle.
                            </p>

                            <a href="list_events.php"
                               class="btn btn-success">
                                Listeyi Aç
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>