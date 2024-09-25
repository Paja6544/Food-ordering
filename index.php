<?php
session_start();

// Include database connection file
include 'db_connection.php';

// Check if database connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Prepare query to fetch popular items
$sql = "SELECT itemName, image, price FROM menuitem WHERE is_popular = 1";

// Check if query was successful
if ($result = $conn->query($sql)) {
  // Initialize array to store popular items
  $popularItems = [];

  // Fetch and store query results
  while ($row = $result->fetch_assoc()) {
    $popularItems[] = $row;
  }

  // Close query result
  $result->close();
} else {
  // Display error message if query fails
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!--poppins-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!--Icon-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Chewy Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">
  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="index.css">
  <title>Home</title>
</head>

<body>
  <?php
  if (isset($_SESSION['userloggedin']) && $_SESSION['userloggedin']) {
    include 'nav-logged.php';
  } else {
    include 'navbar.php';
  }
  ?>

  <div class="main">
    <section>
      <div class="container mt-3">
        <div class="row d-flex justify-content-start align-items-start main-container">
          <div class="col-md-5 col-sm-12 col-lg-5 reveal main-text mb-4 text-align-justify mt-5" data-aos="fade-up">
            <h2>Welcome to <span style = "color:green">Pavan Restro & Cafe</span></h2>
            <h4 style="color: gray; font-weight: 450;">"Savor the Taste, Feel the Comfort."</h4>
            <p style="font-size: 18px; text-align: justify;">
              Step into Pavan Restro & Cafe, where delicious flavors and cozy ambiance blend seamlessly. 
              We are dedicated to crafting a delightful dining experience that caters to every occasion. 
              From our chef's special delicacies to our warm, inviting atmosphere, we ensure that every moment 
              you spend here is filled with comfort, flavor, and a dash of happiness.
            </p>
            <div class="buttondiv">
              <div>
                <a class="button1" href="menu.php">
                  <span class="button__icon-wrapper">
                    <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 15">
                      <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                    </svg>
                    <svg class="button__icon-svg button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">
                      <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                    </svg>
                  </span>
                  Explore Our Menu
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-7 col-sm-12 col-lg-7 d-flex justify-content-center align-items-start slide-in-right main-image">
            <img src="images/Pizza.png" class="img" style=" width: 85%; height: 80%;">
          </div>
        </div>
        <div class="row">
          <!-- Menu Section -->
          <section>
            <div class="menu-section">
              <div class="container-fluid">
                <div class="row">
                  <div class="row d-flex justify-content-center align-items-center mb-4 font-weight-bold" id="text">
                    <h1>OUR <span>MENU</span></h1>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card" style="background-image: url('images/appe-index.avif');" data-aos="fade-up">
                      <div class="card-overlay">
                        <div class="overlay-content">
                          <h3>Appetizer</h3>
                          <p>Kick off your dining adventure with our mouthwatering appetizers, each crafted to excite your taste buds and prepare you for the feast ahead.</p>
                          <a href="menu.php#appetizer">
                            <button class="explore-btn">Explore Variety</button></a>
                        </div>
                      </div>
                      <div class="card-bottom">
                        <h3>Appetizer</h3>
                        <a href="menu.php#appetizer">
                          <button class="explore-btn">Explore Variety</button></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card" style="background-image: url('images/index-pizza.jpg');" data-aos="fade-up">
                      <div class="card-overlay">
                        <div class="overlay-content">
                          <h3>Pizza</h3>
                          <p>Dive into our assortment of pizzas, each one a masterpiece with a perfect blend of fresh ingredients, baked to golden, cheesy perfection.</p>
                          <a href="menu.php#pizza">
                            <button class="explore-btn">Explore Variety</button></a>
                        </div>
                      </div>
                      <div class="card-bottom">
                        <h3>Pizza</h3>
                        <a href="menu.php#pizza">
                          <button class="explore-btn">Explore Variety</button></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card" style="background-image: url('images/index-burger.avif');" data-aos="fade-up">
                      <div class="card-overlay">
                        <div class="overlay-content">
                          <h3>Burger</h3>
                          <p>Sink your teeth into our gourmet burgers, each one packed with bold flavors, fresh ingredients, and pure satisfaction in every bite.</p>
                          <a href="menu.php#burger">
                            <button class="explore-btn">Explore Variety</button></a>
                        </div>
                      </div>
                      <div class="card-bottom">
                        <h3>Burger</h3>
                        <a href="menu.php#burger">
                          <button class="explore-btn">Explore Variety</button></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card" style="background-image: url('images/bev-index.jpeg');" data-aos="fade-up">
                      <div class="card-overlay">
                        <div class="overlay-content">
                          <h3>Beverage</h3>
                          <p>Refresh and relax with our diverse range of beverages, carefully selected to complement your meal and elevate your dining experience.</p>
                          <a href="menu.php#beverage">
                            <button class="explore-btn">Explore Variety</button></a>
                        </div>
                      </div>
                      <div class="card-bottom">
                        <h3>Beverage</h3>
                        <a href="menu.php#beverage">
                          <button class="explore-btn">Explore Variety</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>

  <!-- Why Choose Us Section  -->
  <section class="why-choose-us" id="why-choose-us">
    <div class="container">
      <div class="row why-us-content">
        <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12 mt-5 reveal d-flex justify-content-start align-items-start" data-aos="fade-up">
          <img src="images/Why-Us.png" width="100%" height="auto" loading="lazy" alt="delivery boy" class="w-100 delivery-img" data-delivery-boy>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 d-flex flex-column justify-content-center reveal" data-aos="fade-up">
          <h1>WHY <span>CHOOSE US?</span></h1>
          <p class="content">
            At Pavan Restro & Cafe, we take pride in offering not just food, but a delightful dining experience crafted with love and care. 
            Here’s why our customers keep coming back for more:
          </p>
          <ul class="why-choose-us-list">
            <li data-aos="fade-up">
              <div class="image-wrapper mt-1">
                <img src="icons/delivery-man.png" alt="Quick Service">
              </div>
              <div class="feature-content">
                <h4>Quick Service</h4>
                <p>Enjoy swift and hassle-free delivery or dine-in service, ensuring you get your meal right when you need it.</p>
              </div>
            </li>
            <li data-aos="fade-up">
              <div class="image-wrapper">
                <img src="icons/vegetables.png" alt="Locally Sourced Ingredients">
              </div>
              <div class="feature-content">
                <h4>Locally Sourced Ingredients</h4>
                <p>We carefully select fresh, locally sourced ingredients to ensure every dish bursts with flavor.</p>
              </div>
            </li>
            <li data-aos="fade-up">
              <div class="image-wrapper">
                <img src="icons/waiter (1).png" alt="Warm Hospitality" class="why-us-image">
              </div>
              <div class="feature-content">
                <h4>Warm Hospitality</h4>
                <p>Our team is committed to making you feel right at home with friendly, attentive service.</p>
              </div>
            </li>
            <li data-aos="fade-up">
              <div class="image-wrapper">
                <img src="icons/tasty.png" alt="Unmatched Flavors">
              </div>
              <div class="feature-content">
                <h4>Unmatched Flavors</h4>
                <p>Each dish is a culinary masterpiece, crafted to tantalize your taste buds and leave you craving more.</p>
              </div>
            </li>
          </ul>
        </div>

      </div>

      <!-- Top picks section -->
      <div class="popular reveal" data-aos="fade-up">
        <h1 class="text-center mt-3">TODAY'S <span>TOP PICKS</span></h1>
        <P class="text-center" style="font-size: 1.3rem;">~Handpicked meals that are a hit with everyone.</P>

        <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="8000" data-aos="fade-up">
          <div class="carousel-inner">

            <div id="toast" class="toast">
              <button class="toast-btn toast-close">&times;</button>
              <span class="pt-3"><strong>You should logged in order to add items in cart.</strong></span>
              <button class="toast-btn toast-ok">Okay</button>
            </div>
            <?php
            $chunkedItems = array_chunk($popularItems, 3); // Group items into chunks of 3
            $isActive = true; // To set the first carousel item as active

            foreach ($chunkedItems as $items) {
              echo '<div class="carousel-item' . ($isActive ? ' active' : '') . '" >';
              echo '<div class="d-flex justify-content-center">';

              foreach ($items as $item) {
                echo '<div class="card" >';
                echo '<img src="uploads/' . $item['image'] . '" class="card-img-top" alt="' . $item['itemName'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title text-center">' . $item['itemName'] . '</h5>';
                echo '<p class="card-text text-center">Rs ' . $item['price'] . '</p>';
                echo '<a class="button-cart" onclick="addToCart()">Add to Cart</a>';
                echo '</div>';
                echo '</div>';
              }

              echo '</div>';
              echo '</div>';
              $isActive = false; // Only the first item should be active
            }
            ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- About Us section -->
  <div class="aboutus" id="About-Us" style="background-image: url(images/about-bg.png); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <section class="our-story-section p-5">
      <div class="container ">
        <div class="row" data-aos="fade-up">
          <h1 style="text-align: center;"><span style="color: #fb4a36;">ABOUT </span>US</h1>
          <h4 style="text-align: center;" class="mb-5">Crafting Memorable Meals!</h4>
        </div>
        <div class="story-content row mb-2">
          <div class="story-text col-lg-6 col-md-6 col-sm-12 reveal mt-2" data-aos="fade-up" data-os-interval="300">
            <p>At <strong>Pavan Restro & Cafe</strong>, we are passionate about bringing people together over great food. Our chefs infuse creativity and care into every dish, ensuring that each meal is a delightful experience for the senses.</p>
            <p>Founded in [2024], Pavan Restro & Cafe has quickly become a favorite among food lovers. Our dedication to using the finest, freshest ingredients, along with the expertise of our culinary team, has earned us a reputation for delivering exceptional quality. Dining with us is more than just a meal; it's an experience that celebrates the love of food.</p>
            <p>Whether you're joining us for a cozy dinner, a family gathering, or a celebration, Pavan Restro & Cafe offers the perfect setting. We also offer a convenient <strong>Order from Home</strong> system, allowing you to enjoy our exquisite dishes from the comfort of your home, with quick and reliable delivery. Our warm ambiance and mouth-watering cuisine promise to make every visit memorable. Come and savor the joy of dining with us!</p>
            <a href="menu.php" class="about_btn">
              <i class="fa-solid fa-burger"></i>Order Now
            </a>
          </div>
          <div class="story-image col-lg-6 col-md-6 col-sm-12 d-flex justify-content-end align-items-start slide-in-right" data-aos="fade-up">
            <img src="images/Burger.png" alt="Crafting Memorable Meals" style="width: 100%; height: auto;">
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Table Reservation -->
  <section class="table-reservation" id="Reservation">
    <div class="row text-center ms-4" data-aos="fade-up">
      <h1 class="mb-2">TABLE <span style="color: #fb4a36;">RESERVATION</span></h1>
      <h5 class="mb-5">Book your dining experience with us and enjoy a delightful meal.</h5>
    </div>
    <div class="table ms-4 me-5" data-aos="fade-up">
      <div class="reservation row reveal">
        <div class="reservation-image col-lg-7 col-md-6 col-sm-12" style="background: none !important; padding: 0 !important;">
          <img src="images/table.jpg" alt="Reservation" style="background: none ; width: 100%; height: 100%; padding: 0 !important;" class=" w-100 h-100">
        </div>
        <div class="reservation-section col-lg-5 col-md-6 col-sm-12">
          <h2 style="background-color: #feead4;">Reserve Now!</h2>
          <form id="reservation-form" action="reservations.php" method="POST">
            <div class="form-row">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="phone">Contact:</label>
                <input type="tel" id="phone" name="contact" required>
              </div>
              <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="reservedDate" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="reservedTime">Time:</label>
                <input type="time" id="time" name="reservedTime" required>
              </div>
              <div class="form-group">
                <label for="guests">Numbers of Guest:</label>
                <input type="number" id="guests" name="noOfGuests" required min="1">
              </div>
            </div>
            <button type="submit" value="submit">Reserve Now</button>
          </form>
        </div>
      </div>
    </div>
  </section>

<!-- Review -->
<section class="testimonial" id="review">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
        <div class="text-center mb-5" data-aos="fade-up">
          <h1>What Our <span>Customers Are Saying!</span></h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="clients-carousel owl-carousel" data-aos="fade-up">
        <div class="single-box">
          <div class="img-area"><img alt="" class="img-fluid" src="uploads/user-girl.png"></div>
          <div class="content">
            <p>"The food was fresh, and the flavors were incredible. I loved the variety on the menu. A great place for family dinners."</p>
            <h4>-Shristy</h4>
          </div>
        </div>
        <div class="single-box">
          <div class="img-area"><img alt="" class="img-fluid" src="uploads/user-boy.jpg"></div>
          <div class="content">
            <p>"The online ordering process was seamless and easy to navigate. My food arrived hot and on time. The delivery service was very professional."</p>
            <h4>-Sujjan</h4>
          </div>
        </div>
        <div class="single-box">
          <div class="img-area"><img alt="" class="img-fluid" src="uploads/user-boy.jpg"></div>
          <div class="content">
            <p>"Fantastic place! The burgers are juicy, and the pizzas are loaded with toppings. The staff is super friendly, and the service is quick. A new favorite spot!"</p>
            <h4>-Christan</h4>
          </div>
        </div>
        <div class="single-box">
          <div class="img-area"><img alt="" class="img-fluid" src="uploads/user-girl.png"></div>
          <div class="content">
            <span class="rating-star"><i class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i></span>
            <p>"The online ordering system is fantastic. It’s easy to customize my order, and the delivery is always prompt. The food arrives hot and tasty every time."</p>
            <h4>-Samitha</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-row">
        <div class="footer-col" id="contact">
          <h4>Contact Us</h4>
          <p>Melbourne, Australia</p>
          <p>Email: info@pavanrestaurant.com</p>
          <p>Phone: +61 4234567890</p>
        </div>
        <div class="footer-col">
          <h4>Follow Us</h4>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="footer-col">
          <h4>Subscribe</h4>
          <form action="#">
            <input type="email" placeholder="Your email address" required style="background-color: #f9f9f9; color: #333; margin-top: 12px;">
            <button type="submit">Subscribe</button>
          </form>
        </div>
      </div>
      <div class="footer-bottom">
        <h4>&copy; All Rights Reserved @Pavan 2024.</h4>
      </div>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js">
  </script>
  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $(document).ready(function() {
      console.log('Page is ready. Calling load_cart_item_number.');
      load_cart_item_number();

      function load_cart_item_number() {
        $.ajax({
          url: 'action.php',
          method: 'get',
          data: {
            cartItem: "cart_item"
          },
          success: function(response) {
            $("#cart-item").html(response);
          }
        });
      }
    });
  </script>
  <script>
    $('.clients-carousel').owlCarousel({
      loop: true,
      nav: false,
      autoplay: true,
      autoplayTimeout: 5000,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      smartSpeed: 450,
      margin: 30,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        991: {
          items: 2
        },
        1200: {
          items: 2
        },
        1920: {
          items: 2
        }
      }
    });
  </script>
  <script>
    function addToCart() {
      var userLoggedIn = <?php echo isset($_SESSION['userloggedin']) ? 'true' : 'false'; ?>;

      if (!userLoggedIn) {
        showToast();
      } else {
        // Add to cart logic goes here
      }
    }

    function showToast() {
      var toast = document.getElementById("toast");
      toast.className = "toast show";

      // Handle "Okay" button click
      document.querySelector('.toast-ok').onclick = function() {
        window.location.href = 'login.php'; // Redirect to login page
      };

      // Handle "Close (X)" button click
      document.querySelector('.toast-close').onclick = function() {
        toast.className = toast.className.replace("show", "hide");
      };
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const elements = document.querySelectorAll('.animate-on-scroll');
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('reveal');
          }
        });
      }, {
        threshold: 0.1
      });

      elements.forEach(element => {
        observer.observe(element);
      });
    });
  </script>


</body>
</html>