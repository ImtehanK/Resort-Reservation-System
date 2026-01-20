<?php
if ($_POST) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);
    
    if (empty($comment)) {
        $message = "Dear guest, please enter your comments.";
    } else {
        if (!empty($name)) {
            $greeting = $name;
        } elseif (!empty($email)) {
            $greeting = $email;
        } else {
            $greeting = "guest";
        }
        $message = "Dear $greeting, thank you for your comments.";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - The Montclair Resort</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">The Montclair Resort</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <div class="alert alert-success">
                    <h4><?php echo htmlspecialchars($message); ?></h4>
                </div>
                <a href="comments.php" class="btn btn-primary">Another Comment</a>
                <a href="index.php" class="btn btn-secondary">Home</a>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>Copyright © 2025 The Montclair Resort<br>email: team@mail.montclair.edu</p>
    </footer>
</body>
</html>
<?php } else { header("Location: comments.php"); exit(); } ?>