<?php

session_start();
include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) == 1)
    {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password,$user["password"]))
        {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            header("Location: dashboard.php");
            exit();
        }
        else
        {
            echo "<div class='alert alert-danger'>
                    Şifre yanlış
                  </div>";
        }
    }
    else
    {
        echo "<div class='alert alert-danger'>
                Kullanıcı bulunamadı
              </div>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Giriş Yap</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header text-center">

                    <h2>📸 Fotoğrafçılık Kulübü</h2>

                    <p class="text-muted mb-0">
                        Üye Giriş Sistemi
                    </p>

                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Email Adresi
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="ornek@mail.com"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Şifre
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Şifrenizi giriniz"
                                required>

                        </div>

                        <button
                            class="btn btn-success w-100">

                            Giriş Yap

                        </button>

                    </form>

                    <hr>

                    <div class="text-center">

                        <p>
                            Hesabın yok mu?
                        </p>

                        <a href="register.php"
                           class="btn btn-primary">

                           Kayıt Ol

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>