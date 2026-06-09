<?php

include 'koneksi.php';

$full_name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone_number = trim($_POST['phone_number'] ?? '');
$course_id = (int) ($_POST['course_id'] ?? 0);
$participant_count = (int) ($_POST['participant_count'] ?? 0);

$sql_course = "SELECT price FROM courses WHERE id='$course_id'";
$query_course = mysqli_query($conn, $sql_course);
$data_course = mysqli_fetch_assoc($query_course);

$unit_price = $data_course['price'];

$sql = "insert into registrations (
    full_name,
    email,
    phone_number,
    course_id,
    participant_count,
    unit_price
) values (
    '$full_name',
    '$email',
    '$phone_number',
    '$course_id',
    '$participant_count',
    '$unit_price'
)";

$query = mysqli_query($conn, $sql);

header("Location: index.php");
exit;

?>