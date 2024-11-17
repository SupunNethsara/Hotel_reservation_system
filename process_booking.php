<?php
$conn = new mysqli('localhost', 'root', '', 'hotel_booking');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$guest_id = $_POST['guest_id'];
$room_id = $_POST['room'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];

$query = "INSERT INTO bookings (GuestID, RoomID, CheckInDate, CheckOutDate) 
          VALUES ('$guest_id', '$room_id', '$checkin', '$checkout')";

if ($conn->query($query) === TRUE) {
    $message = "Booking successful! Booking ID: " . $conn->insert_id;
} else {
    $message = "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .message-box {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .message-box h2 {
            margin: 0 0 10px;
            font-size: 24px;
        }
        .message-box p {
            margin: 0;
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h2>Booking Status</h2>
        <p><?php echo $message; ?></p><br/>

        <div  class="nav">
        <a href="register_guest.php">Register Guest</a>&nbsp;&nbsp;&nbsp;
        <a href="book_room.php">Book Room</a>&nbsp;&nbsp;&nbsp;
        <a href="view_bookings.php">View Bookings</a>&nbsp;&nbsp;&nbsp;
    </div>
    </div>
</body>
</html>
