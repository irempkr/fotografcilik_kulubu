<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<title>Fotoğrafçılık Kulübü</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">
            📸 Fotoğrafçılık Kulübü
        </span>

        <div>
            <a href="login.php" class="btn btn-success btn-sm">
                Giriş Yap
            </a>

            <a href="register.php" class="btn btn-primary btn-sm">
                Kayıt Ol
            </a>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body text-center p-5">

            <h1 class="display-4">
                Fotoğrafçılık Kulübü
            </h1>

            <p class="lead">
                Etkinlik ve Organizasyon Yönetim Sistemi
            </p>

            <hr>

            <p>
                Bu uygulama sayesinde kulüp üyeleri etkinlik ekleyebilir,
                düzenleyebilir, görüntüleyebilir ve silebilir.
            </p>

            <div class="mt-4">

                <a href="register.php"
                   class="btn btn-primary btn-lg me-2">
                    Kayıt Ol
                </a>

                <a href="login.php"
                   class="btn btn-success btn-lg">
                    Giriş Yap
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>