<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="home.html"> <i class="fas fa-arrow-right"></i> home</a>
            <a href="shop.html"> <i class="fas fa-arrow-right"></i> shop</a>
            <a href="about.html"> <i class="fas fa-arrow-right"></i> about</a>
            <a href="review.html"> <i class="fas fa-arrow-right"></i> review</a>
            <a href="blog.html"> <i class="fas fa-arrow-right"></i> blog</a>
            <a href="contact.html"> <i class="fas fa-arrow-right"></i> contact</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> my order </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> my favorite </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> my wishlist </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> my account </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> terms or use </a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
        </div>

        <div class="box">
            <h3>newsletter</h3>
            <p>subscribe for latest updates</p>
            <form action="">
                <input type="email" placeholder="enter your email">
                <input type="submit" value="subscribe" class="btn">
            </form>
            <img src="image/payment.png" class="payment" alt="">
        </div>

    </div>

</section>

<section class="credit">Created by  Dev Mautin  | all rights reserved!</section>

<!-- footer section ends -->


<!-- custom css file link  -->
<script src="http://localhost/fruits/js/script.js"></script>
    
  <script src="http://localhost/fruits/js/jquery-3.3.1.min.js"></script>
  <script src="http://localhost/fruits/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="http://localhost/fruits/js/jquery-ui.js"></script>
  <script src="http://localhost/fruits/js/popper.min.js"></script>
  <script src="http://localhost/fruits/js/bootstrap.min.js"></script>
  <script src="http://localhost/fruits/js/owl.carousel.min.js"></script>
  <script src="http://localhost/fruits/js/mediaelement-and-player.min.js"></script>
  <script src="http://localhost/fruits/js/jquery.stellar.min.js"></script>
  <script src="http://localhost/fruits/js/jquery.countdown.min.js"></script>
  <script src="http://localhost/fruits/js/jquery.magnific-popup.min.js"></script>
  <script src="http://localhost/fruits/js/bootstrap-datepicker.min.js"></script>
  <script src="http://localhost/fruits/js/aos.js"></script>
  

  <script src="http://localhost/fruits/js/main.js"></script>
 

  <script>
    document.getElementById("registerForm").addEventListener("submit", function(event) {
      event.preventDefault();
      
      // Perform form validation and registration logic here
      
      // Reset the form after registration
      document.getElementById("registerForm").reset();
    });
  </script>

  <script>
  function toggleDropdown() {
  const dropdownContent = document.getElementById("dropdownContent");
  dropdownContent.classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches(".dropdown-btn")) {
    const dropdownContent = document.getElementById("dropdownContent");
    if (dropdownContent.classList.contains("show")) {
      dropdownContent.classList.remove("show");
    }
  }
};

  </script>
  


</body>
</html>