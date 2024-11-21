<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <style>
        .contact {
        padding-bottom: 130px;
        }

        .contact .info {
        padding: 30px;
        background: #fff;
        width: 100%;
        box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
        }

        .contact .info i {
        font-size: 20px;
        color: #149ddd;
        float: left;
        width: 44px;
        height: 44px;
        background: #dff3fc;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50px;
        transition: all 0.3s ease-in-out;
        }

        .contact .info h4 {
        padding: 0 0 0 60px;
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 5px;
        color: #050d18;
        }

        .contact .info p {
        padding: 0 0 10px 60px;
        margin-bottom: 20px;
        font-size: 14px;
        color: #173b6c;
        }

        .contact .info .email p {
        padding-top: 5px;
        }

        .contact .info .social-links {
        padding-left: 60px;
        }

        .contact .info .social-links a {
        font-size: 18px;
        display: inline-block;
        background: #333;
        color: #fff;
        line-height: 1;
        padding: 8px 0;
        border-radius: 50%;
        text-align: center;
        width: 36px;
        height: 36px;
        transition: 0.3s;
        margin-right: 10px;
        }

        .contact .info .social-links a:hover {
        background: #149ddd;
        color: #fff;
        }

        .contact .info .email:hover i,
        .contact .info .address:hover i,
        .contact .info .phone:hover i {
        background: #149ddd;
        color: #fff;
        }

        .contact .php-email-form {
        width: 100%;
        padding: 30px;
        background: #fff;
        box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
        }

        .contact .php-email-form .form-group {
        padding-bottom: 8px;
        }

        .contact .php-email-form .validate {
        display: none;
        color: red;
        margin: 0 0 15px 0;
        font-weight: 400;
        font-size: 13px;
        }

        .contact .php-email-form .error-message {
        display: none;
        color: #fff;
        background: #ed3c0d;
        text-align: left;
        padding: 15px;
        font-weight: 600;
        }

        .contact .php-email-form .error-message br+br {
        margin-top: 25px;
        }

        .contact .php-email-form .sent-message {
        display: none;
        color: #fff;
        background: #18d26e;
        text-align: center;
        padding: 15px;
        font-weight: 600;
        }

        .contact .php-email-form .loading {
        display: none;
        background: #fff;
        text-align: center;
        padding: 15px;
        }

        .contact .php-email-form .loading:before {
        content: "";
        display: inline-block;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        margin: 0 10px -6px 0;
        border: 3px solid #18d26e;
        border-top-color: #eee;
        animation: animate-loading 1s linear infinite;
        }

        .contact .php-email-form .form-group {
        margin-bottom: 15px;
        }

        .contact .php-email-form label {
        padding-bottom: 8px;
        }

        .contact .php-email-form input,
        .contact .php-email-form textarea {
        border-radius: 0;
        box-shadow: none;
        font-size: 14px;
        }

        .contact .php-email-form input {
        height: 44px;
        }

        .contact .php-email-form textarea {
        padding: 10px 15px;
        }

        .contact .php-email-form button[type=submit] {
        background: #149ddd;
        border: 0;
        padding: 10px 24px;
        color: #fff;
        transition: 0.4s;
        border-radius: 4px;
        }

        .contact .php-email-form button[type=submit]:hover {
        background: #37b3ed;
        }

        @keyframes animate-loading {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
        }
        #contact {
           
            margin-left: 20px; /* Décale le contenu à droite pour éviter la sidebar */
            padding: 20px; /* Optionnel : ajoute un peu de marge intérieure */
        }
        .section-title h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 20px;
            position: relative;
        }


        .section-title h2:after {
            content: "";
            position: absolute;
            display: block;
            width: 50px;
            height: 3px;
            background: var(--accent-color); /* Assurez-vous que cette couleur est définie */
            left: 0;
            bottom: -5px; /* Ajustez cette valeur pour placer la ligne exactement sous le texte */
        }



    </style>

</head>
<body>

    <!-- Sidebar -->
    @include('sidebar')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>07 Chemin du Paradou, Hydra 16035</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>exal.dg@exal.dz</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+213 (0)23 53 41 54
                </p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.2348782963372!2d3.0334605000000003!3d36.7409329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fadf5cc8ad6e5%3A0x21f062896418bd5c!2s7%20Imp.%20du%20Paradou%2C%20Hydra%2016035!5e0!3m2!1sfr!2sdz!4v1732179261438!5m2!1sfr!2sdz" width="100%" height="290px" style="border:0;" allowfullscreen="" ></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

</body>
</html>
