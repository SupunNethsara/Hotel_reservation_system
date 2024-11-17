<?php
$conn = new mysqli('localhost', 'root', '', 'hotel_booking');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "
    SELECT 
        bookings.BookingID, 
        guests.Name AS GuestName, 
        guests.ContactInfo, 
        guests.Email, 
        rooms.RoomNumber, 
        rooms.RoomType, 
        rooms.PricePerNight, 
        bookings.CheckInDate, 
        bookings.CheckOutDate
    FROM bookings
    JOIN guests ON bookings.GuestID = guests.GuestID
    JOIN rooms ON bookings.RoomID = rooms.RoomID
";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .nav { text-align: center; margin-bottom: 20px; }
        .nav a { margin: 0 10px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <div class="nav">
        <a href="register_guest.php">Register Guest</a>
        <a href="book_room.php">Book Room</a>
        <a href="view_bookings.php">View Bookings</a>
    </div>
    <h1>All Bookings</h1>
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Guest Name</th>
                <th>Contact Info</th>
                <th>Email</th>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Price Per Night</th>
                <th>Check-in</th>
                <th>Check-out</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['BookingID'] ?></td>
                    <td><?= $row['GuestName'] ?></td>
                    <td><?= $row['ContactInfo'] ?></td>
                    <td><?= $row['Email'] ?></td>
                    <td><?= $row['RoomNumber'] ?></td>
                    <td><?= $row['RoomType'] ?></td>
                    <td>$<?= $row['PricePerNight'] ?></td>
                    <td><?= $row['CheckInDate'] ?></td>
                    <td><?= $row['CheckOutDate'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
<?php
$conn->close();
?>