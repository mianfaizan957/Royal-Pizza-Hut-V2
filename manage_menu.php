<?php
include("database.php");

$result = mysqli_query($conn, "SELECT * FROM menu");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Menu</title>

<style>
body{
    font-family:Arial;
    background:#f4f4f4;
}

h1{
    text-align:center;
    color:#c40000;
}

table{
    width:90%;
    margin:30px auto;
    border-collapse:collapse;
    background:#fff;
}

th,td{
    border:1px solid #ddd;
    padding:12px;
    text-align:center;
}

th{
    background:#c40000;
    color:white;
}

a{
    text-decoration:none;
    color:white;
    background:#c40000;
    padding:8px 15px;
    border-radius:5px;
}
</style>

</head>

<body>

<h1>🍕 Manage Menu</h1>

<table>

<tr>
<th>ID</th>
<th>Category</th>
<th>Item Name</th>
<th>Price</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['category']; ?></td>

<td><?php echo $row['name']; ?></td>

<td>Rs. <?php echo $row['price']; ?></td>

<td>
<a href="edit_menu.php?id=<?php echo $row['id']; ?>">Edit</a>
<a href="delete_menu.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this item?');">
Delete
</a>
</td>

</tr>

<?php } ?>

</table>

</body>
</html>