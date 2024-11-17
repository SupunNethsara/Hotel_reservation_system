<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Registration</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 500px; margin: auto; }
        input { width: 100%; padding: 10px; margin-bottom: 10px; }
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
    <h1>Guest Registration</h1>
    <form action="save_guest.php" method="POST">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required>

        <label for="contact">Contact Number</label>
        <input type="text" id="contact" name="contact" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Register</button>
    </form>
</body>
</html>