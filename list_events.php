<?php

session_start();

if(!isset($_SESSION["user_id"]))
{
    header("Location: login.php");
    exit();
}

include("config.php");

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM events
        WHERE user_id='$user_id'";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Etkinlikler</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Etkinliklerim</h2>

<a href="dashboard.php"
class="btn btn-secondary mb-3">
Dashboard
</a>

<table class="table table-striped table-hover">

<tr>
<th>ID</th>
<th>Etkinlik</th>
<th>Tarih</th>
<th>Konum</th>
<th>Açıklama</th>
<th>İşlemler</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row["id"]; ?></td>

<td><?php echo $row["title"]; ?></td>

<td><?php echo $row["event_date"]; ?></td>

<td><?php echo $row["location"]; ?></td>

<td><?php echo $row["description"]; ?></td>

<td>

<a
href="edit_event.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">
Düzenle
</a>

<a
href="delete_event.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm">
Sil
</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>
</html>