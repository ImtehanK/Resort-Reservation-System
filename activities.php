<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Montclair Resort :: Activities</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .activity-img { aspect-ratio: 4/3; object-fit: cover; width: 100%; border-radius: .5rem; }
    .thumb { transition: transform .2s ease, box-shadow .2s ease; }
    .thumb:hover { transform: translateY(-2px); box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15); }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="index.php">The Montclair Resort</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="yurts.php">Yurts</a></li>
                <li class="nav-item"><a class="nav-link active" href="activities.php">Activities</a></li>
                <li class="nav-item"><a class="nav-link" href="reservation.php">Reservation</a></li>
                <li class="nav-item"><a class="nav-link" href="comments.php">Comments</a></li>
            </ul>
        </div>
    </div>
</nav>

  <main class="container mt-4">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h1 class="mb-3">Activities at The Montclair Resort</h1>

        <div class="row g-4 mt-1">
          <div class="col-12 col-sm-6">
            <a class="d-block thumb" href="image.php?img=hiking.jpg" title="Hiking">
              <img src="images/hiking.jpg" alt="Guided hiking overlooking the water" class="activity-img" />
            </a>
          </div>
          <div class="col-12 col-sm-6">
            <a class="d-block thumb" href="image.php?img=parasailing.jpg" title="Parasailing">
              <img src="images/parasailing.jpg" alt="Parasailing over the ocean" class="activity-img" />
            </a>
          </div>
          <div class="col-12 col-sm-6">
            <a class="d-block thumb" href="image.php?img=golf.png" title="Golf">
              <img src="images/golf.png" alt="Resort golf course" class="activity-img" />
            </a>
          </div>
          <div class="col-12 col-sm-6">
            <a class="d-block thumb" href="image.php?img=pool.jpg" title="Pool">
              <img src="images/pool.jpg" alt="Infinity pool facing the ocean" class="activity-img" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-dark text-white text-center py-3 mt-4">
    <p class="mb-0">Copyright © 2025 The Montclair Resort</p>
    <p class="mb-0">email: <a class="text-white" href="mailto:email@montclair.edu">email@montclair.edu</a></p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
