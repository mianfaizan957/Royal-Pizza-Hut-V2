<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
?>
<?php
include 'db.php';
$todayOrders = $conn->query("SELECT COUNT(*) AS total FROM orders WHERE DATE(order_date)=CURDATE()");
$todayOrders = $todayOrders->fetch_assoc()['total'];

$todaySales = $conn->query("SELECT SUM(total) AS sales FROM orders WHERE DATE(order_date)=CURDATE()");
$todaySales = $todaySales->fetch_assoc()['sales'];

?>
<?php
include 'db.php';

$result = $conn->query("SELECT * FROM orders ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Royal Pizza Hut - Admin Panel</title>
</head>
<body>

<h1>Royal Pizza Hut - Admin Panel</h1>
<div style="display:flex;gap:20px;margin:20px 0;">

<div style="background:#28a745;color:white;padding:20px;border-radius:10px;">
<h2><?php echo $todayOrders; ?></h2>
<p>Today's Orders</p>
</div>

<div style="background:#dc3545;color:white;padding:20px;border-radius:10px;">
<h2>Rs. <?php echo $todaySales ? $todaySales : 0; ?></h2>
<p>Today's Sales</p>
</div>

</div>
<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Item</th>
    <th>Total</th>
    <th>Status</th>
    <th>Date</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['customer_name']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['items']; ?></td>
    <td>Rs. <?php echo $row['total']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><?php echo $row['order_date']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
<a href="logout.php" style="color:red;">Logout</a>