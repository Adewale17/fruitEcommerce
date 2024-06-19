<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Daily</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variabless.css" rel="stylesheet">
  <link href="assets/css/mains.css" rel="stylesheet">
</head>
<body>
<style>
    p {
        text-align: center;
        padding: 2%;
    }
    /* Basic styling for the alert */
.alert {
  background-color: #f8d7da; /* Background color for the alert */
  color: #721c24; /* Text color for the alert */
  padding: 10px; /* Padding around the content */
  border: 1px solid #f5c6cb; /* Border color */
  border-radius: 4px; /* Rounded corners */
  font-size: medium;
}

/* Add styles for different types of alerts */
.alert.success {
  background-color: #d4edda;
  color: #155724;
  border-color: #c3e6cb;
}

.alert.info {
  background-color: #d1ecf1;
  color: #0c5460;
  border-color: #bee5eb;
}

.alert.warning {
  background-color: #fff3cd;
  color: #856404;
  border-color: #ffeeba;
}

.alert.error {
  background-color: #f8d7da;
  color: #721c24;
  border-color: #f5c6cb;
}

</style>
<?php if(count($error_message) > 0):  ?>
<?php foreach ($error_message as $errors): ?>
    <p  class=" alert alert error"> <?php echo "$errors"; ?> </p>
<?php endforeach ?>
<?php endif ?>

<?php if(count($success_message) > 0):  ?>
<?php foreach ($success_message as $success): ?>
    <p class=" alert alert success"> <?php echo "$success"; ?> </p>
<?php endforeach ?>
<?php endif ?>

<!-- Bootstrap JavaScript -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
