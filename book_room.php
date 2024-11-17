<?php
$conn = new mysqli('localhost', 'root', '', 'hotel_booking');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$room_query = "SELECT RoomID, RoomNumber, RoomType, PricePerNight FROM rooms";
$rooms = $conn->query($room_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Room</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 500px; margin: auto; }
        input, select { width: 100%; padding: 10px; margin-bottom: 10px; }
        button { background-color: #007bff; color: white; border: none; padding: 10px; cursor: pointer; }
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
    <h1>Book a Room</h1>
    <form action="process_booking.php" method="POST">
        <label for="guest_id">Guest ID</label>
        <input type="text" id="guest_id" name="guest_id" required>

        <label for="room">Select Room</label>
        <select id="room" name="room" required>
            <?php while ($row = $rooms->fetch_assoc()) { ?>
                <option value="<?= $row['RoomID'] ?>">
                    <?= $row['RoomNumber'] ?> - <?= $row['RoomType'] ?> ($<?= $row['PricePerNight'] ?> per night)
                </option>
            <?php } ?>
        </select>

        <label for="checkin">Check-in Date</label>
        <input type="date" id="checkin" name="checkin" required>

        <label for="checkout">Check-out Date</label>
        <input type="date" id="checkout" name="checkout" required>

        <button type="submit">Book Now</button>
    </form>
</body>
</html>
<?php
$conn->close();
?>