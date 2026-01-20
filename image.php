<?php
if (isset($_GET['img'])) {
    $image = $_GET['img'];
    $allowed_images = ['parasailing.jpg', 'pool.jpg', 'hiking.jpg', 'dining.jpg', 'golf.png'];
    
    if (in_array($image, $allowed_images)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image View - Montclair Resort</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            cursor: pointer;
        }
        .full-screen-image {
            max-width: 100vw;
            max-height: 100vh;
            width: auto;
            height: auto;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <img src="images/<?php echo htmlspecialchars($image); ?>" class="full-screen-image" alt="Activity Image">
    
    <script>
        // Close when clicking anywhere or pressing ESC
        document.addEventListener('click', function() {
            window.history.back();
        });
        
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                window.history.back();
            }
        });
    </script>
</body>
</html>
<?php
    } else {
        header("Location: activities.php");
        exit();
    }
} else {
    header("Location: activities.php");
    exit();
}
?>