<?php
$is_post = ($_SERVER['REQUEST_METHOD'] === 'POST');

if ($is_post) {
  $first = trim($_POST['first'] ?? '');
  $last  = trim($_POST['last'] ?? '');
  $street= trim($_POST['street'] ?? '');
  $city  = trim($_POST['city'] ?? '');
  $state = trim($_POST['state'] ?? '');
  $zip   = trim($_POST['zip'] ?? '');
  $checkin  = $_POST['checkin'] ?? '';
  $checkout = $_POST['checkout'] ?? '';
  $people = (int)($_POST['people'] ?? 1);
  $room   = $_POST['room'] ?? 'Queen';
  $phone  = trim($_POST['phone'] ?? '');
  $email  = trim($_POST['email'] ?? '');
  $pay    = $_POST['pay'] ?? 'visa';
  $card   = trim($_POST['card'] ?? '');
  $req    = trim($_POST['req'] ?? '');

  $ci = $checkin ? strtotime($checkin) : 0;
  $co = $checkout ? strtotime($checkout) : 0;
  $days = ($ci && $co) ? max(1, (int)(($co - $ci)/86400)) : 1;

  $rate  = ($room === 'King') ? 200 : (($room === 'Queen') ? 150 : 300);
  $total = $rate * $days * 1.07;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Montclair Resort :: Reservation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    :root{ --base: 0.875rem; --pad: .35rem; --gap: .30rem; }

    html,body{ height:100%; margin:0; }
    body{ font-size: var(--base); display:flex; flex-direction:column; }
    main{ flex:1; display:flex; }
    footer{ margin-top:auto; width:100%; }
    footer p{ margin:0; }

    .navbar{ padding-top:.25rem; padding-bottom:.25rem; font-size:.95em; }
    .footer-min{ padding-top:.35rem !important; padding-bottom:.35rem !important; font-size:.9em; }

    .page{ width:100%; max-width:none; padding-inline:12px; }

    .page-wide{ padding-inline:0 !important; }
    .page-wide .row{ --bs-gutter-x:0; --bs-gutter-y:0; }      
    .page-wide .col-12{ padding-left:0 !important; padding-right:0 !important; }

    .label-col{ text-align:left; font-weight:500; white-space:nowrap; }
    .g-tight{ --bs-gutter-x: var(--gap); --bs-gutter-y: var(--gap); }

    .form-control, .form-select{
      width:100%; padding-top:var(--pad); padding-bottom:var(--pad);
      height:calc(1.25em + var(--pad)*2 + 2px); font-size:.95em;
    }
    textarea.form-control{ min-height:5.25rem; resize:vertical; }

    .form-shell{ display:flex; flex-direction:column; min-height:0; height:100%; }
    form.form-flex{ flex:1 1 auto; display:flex; flex-direction:column; min-height:0; }
    .fields{ flex:1 1 auto; min-height:0; }
    .btn-row{ margin-top:.35rem; padding-bottom:.25rem; display:flex; gap:.5rem; }

    h1.thankyou-title{
      font-size: 2rem;
      font-weight:700;
      margin: 0;
      text-align: left;
    }
    .note-line{
      margin: .25rem 0 .35rem;
      font-size:.95em;
      text-align:left;
    }

    .page-wide {
      height: calc(100vh - 56px - 48px);
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: stretch;
      padding: 0 !important;
      margin: 0 !important;
    }
    .page-wide .row {
      width: 100%;
      flex: 1;
      margin: 0 !important;
      display: flex;
      justify-content: flex-start;
      align-items: stretch;
    }
    .page-wide .col-12 {
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: stretch;
      padding: 0 2rem;
      flex: 1;
    }
    .page-wide .table-wrap {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: stretch;
      margin: 0;
      padding: 0;
    }
    .page-wide table.table {
      width: 100%;
      height: 100%;
      margin: 0;
      border-collapse: collapse;
    }
    .table-sm th, .table-sm td {
      padding:.5rem .75rem;
      vertical-align: middle;
    }
    .table-striped > tbody > tr:nth-of-type(odd) > * { background-color:#f4f5f7; }
    .table-striped > tbody > tr:nth-of-type(even) > * { background-color:#ffffff; }
    .table-total th, .table-total td { background-color:#dfe3e7 !important; font-weight:600; }

    .page-wide.mt-3 { margin-top:0 !important; }
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
                <li class="nav-item"><a class="nav-link" href="activities.php">Activities</a></li>
                <li class="nav-item"><a class="nav-link" href="reservation.php">Reservation</a></li>
                <li class="nav-item"><a class="nav-link" href="comments.php">Comments</a></li>
            </ul>
        </div>
    </div>
</nav>

  <main class="container-fluid page <?php echo $is_post ? 'page-wide' : ''; ?> <?php echo $is_post ? '' : 'mt-3'; ?>">
    <div class="row <?php echo $is_post ? 'g-0' : ''; ?>">
      <div class="col-12 form-shell">

        <?php if ($is_post): ?>
          <h1 class="thankyou-title">Thank you <?= htmlspecialchars($first) ?> <?= htmlspecialchars($last) ?> for your reservation</h1>
          <p class="note-line">The followings are the information that you entered:</p>

          <div class="table-wrap">
            <table class="table table-striped table-sm align-middle">
              <tbody>
                <tr><th style="width:25%">Number & Street</th><td><?= htmlspecialchars($street) ?></td></tr>
                <tr><th>City</th><td><?= htmlspecialchars($city) ?></td></tr>
                <tr><th>State</th><td><?= htmlspecialchars($state) ?></td></tr>
                <tr><th>Zip Code</th><td><?= htmlspecialchars($zip) ?></td></tr>
                <tr><th>Check In Date</th><td><?= htmlspecialchars($checkin) ?></td></tr>
                <tr><th>Check Out Date</th><td><?= htmlspecialchars($checkout) ?></td></tr>
                <tr><th>Room Type</th><td><?= htmlspecialchars($room) ?></td></tr>
                <tr><th>Number of People</th><td><?= htmlspecialchars($people) ?></td></tr>
                <tr><th>Number of Days</th><td><?= $days ?></td></tr>
                <tr><th>Email</th><td><?= htmlspecialchars($email) ?></td></tr>
                <tr><th>Phone Number</th><td><?= htmlspecialchars($phone) ?></td></tr>
                <tr><th>Credit Card</th><td><?= strtoupper(htmlspecialchars($pay)) ?></td></tr>
                <tr><th>Card Number</th><td><?= htmlspecialchars($card) ?></td></tr>
                <tr><th>Special Request</th><td><?= nl2br(htmlspecialchars($req)) ?></td></tr>
                <tr class="table-total"><th>Total Charge</th><td>$<?= number_format($total, 2) ?></td></tr>
              </tbody>
            </table>
          </div>

        <?php else: ?>
          <h1>Reservation at The Montclair Resort</h1>

          <form method="post" action="reservation.php" class="form-flex" novalidate>
            <div class="row g-tight fields">
              <div class="col-3 label-col">First Name</div>
              <div class="col-9"><input name="first" class="form-control" required autofocus></div>

              <div class="col-3 label-col">Last Name</div>
              <div class="col-9"><input name="last" class="form-control" required></div>

              <div class="col-3 label-col">Number & Street</div>
              <div class="col-9"><input name="street" class="form-control" required></div>

              <div class="col-3 label-col">City</div>
              <div class="col-9"><input name="city" class="form-control" required></div>

              <div class="col-3 label-col">State</div>
              <div class="col-9"><input name="state" class="form-control" required></div>

              <div class="col-3 label-col">Zip Code</div>
              <div class="col-9"><input name="zip" class="form-control" required inputmode="numeric"></div>

              <div class="col-3 label-col">Check-in Date</div>
              <div class="col-9"><input type="date" name="checkin" class="form-control" required></div>

              <div class="col-3 label-col">Check-out Date</div>
              <div class="col-9"><input type="date" name="checkout" class="form-control" required></div>

              <div class="col-3 label-col">Number of People</div>
              <div class="col-9"><input type="number" name="people" class="form-control" min="1" value="1" required></div>

              <div class="col-3 label-col">Room Type</div>
              <div class="col-9">
                <select name="room" class="form-select" required>
                  <option value="King">King</option>
                  <option value="Queen">Queen</option>
                  <option value="Suite">Suite</option>
                </select>
              </div>

              <div class="col-3 label-col">Phone</div>
              <div class="col-9"><input name="phone" class="form-control" placeholder="(123) 456-7890" pattern="^\(\d{3}\)\s\d{3}-\d{4}$" required></div>

              <div class="col-3 label-col">E-mail Address</div>
              <div class="col-9"><input type="email" name="email" class="form-control" required></div>

              <div class="col-3 label-col">Payment Method</div>
              <div class="col-9">
                <select name="pay" class="form-select" required>
                  <option value="mc">MC</option>
                  <option value="visa">VISA</option>
                  <option value="amex">AMEX</option>
                  <option value="discover">Discover</option>
                </select>
              </div>

              <div class="col-3 label-col">Card Number</div>
              <div class="col-9"><input name="card" class="form-control" inputmode="numeric" pattern="^(?:\d{4}\s?){4}$" placeholder="1234 5678 9012 3456" required></div>

              <div class="col-3 label-col">Special Requests (optional)</div>
              <div class="col-9"><textarea name="req" class="form-control"></textarea></div>
            </div>

            <div class="row">
              <div class="col-3"></div>
              <div class="col-9 btn-row">
                <button class="btn btn-primary btn-sm" type="submit">Reserve a room</button>
                <a class="btn btn-success btn-sm" href="reservation.php">Clear</a>
              </div>
            </div>
          </form>
        <?php endif; ?>

      </div>
    </div>
  </main>

  <footer class="bg-dark text-white text-center footer-min">
    <p class="mb-0">Copyright © 2025 The Montclair Resort</p>
    <p class="mb-0">email: <a class="text-white" href="mailto:fakeemail@montclair.edu">email@montclair.edu</a></p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
