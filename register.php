<?php

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashedPassword = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $kontrol = "
        SELECT *
        FROM users
        WHERE email='$email'
    ";

    $sonuc = mysqli_query($conn, $kontrol);

    if (mysqli_num_rows($sonuc) > 0) {

        echo "
            <div class='alert alert-danger'>
                Bu email zaten kayıtlı.
            </div>
        ";

    } else {

        $sql = "
            INSERT INTO users(username, email, password)
            VALUES(
                '$username',
                '$email',
                '$hashedPassword'
            )
        ";

        if (mysqli_query($conn, $sql)) {

            echo "
                <div class='alert alert-success'>
                    Kayıt başarılı!
                </div>
            ";

        } else {

            echo "Hata oluştu";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Kayıt Ol</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card">

                    <div class="card-header">
                        <h3>Fotoğrafçılık Kulübü Üye Kaydı</h3>
                    </div>

                    <div class="card-body">

                        <form method="POST">

                            <div class="mb-3">
                                <label>Kullanıcı Adı</label>
                                <input
                                    type="text"
                                    name="username"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Şifre</label>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control">
                            </div>

                            <button class="btn btn-primary w-100">
                                Kayıt Ol
                            </button>

                        </form>

                        <hr>

                        <a
                            href="login.php"
                            class="btn btn-success w-100">
                            Zaten Hesabım Var, Giriş Yap
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
