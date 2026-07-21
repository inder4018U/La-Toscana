<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>La Toscana | Best Italian Restaurant in Chandigarh</title>

    <meta
      name="description"
      content="La Toscana is one of the best Italian restaurants in Chandigarh offering authentic Italian cuisine, wood-fired pizzas, freshly made pasta, lasagna, desserts and a premium dining experience."
    />

    <meta
      name="keywords"
      content="Best Italian Restaurant in Chandigarh, Italian Restaurant Chandigarh, Wood Fired Pizza Chandigarh, Pasta Chandigarh, Lasagna Chandigarh, Fine Dining Chandigarh, La Toscana"
    />

    <meta name="author" content="La Toscana" />
    <meta name="robots" content="index, follow" />

    <link rel="stylesheet" href="style.css">
  </head>

  <body>

<header id="home">
      <div class="top-buttons">

        <?php
        if(isset($_SESSION['userid']))
        {
        ?>

       <div class="nav-user">

<?php
if(isset($_SESSION['photo']) && $_SESSION['photo']!="")
{
?>
<img
src="uploads/<?php echo $_SESSION['photo']; ?>"
class="profile-photo">
<?php
}
?>

<span>
Welcome <?php echo $_SESSION['fullname']; ?>
</span>

</div>  

            <a href="logout.php">Logout</a>

        <?php
        }
        else
        {
        ?>

            <a href="login.php">Login</a>
            <a href="signup.php">Sign Up</a>

        <?php
        }
        ?>

      </div>

      <h1>La Toscana</h1>

      <p><i>Authentic Italian Dining Experience in Chandigarh</i></p>

    </header>
    <div class="main-nav">

<a href="#home">Home</a>

<a href="#about">About Us</a>

<a href="menu.php">Menu</a>

<a href="cart.php">Cart</a>

<a href="#contact">Contact</a>

</div>
    <section>

      <nav>

<h2 id="menu">Quick Menu</h2>
        <ul>
          <li>Wood Fired Pizza</li>
          <li>Fresh Pasta</li>
          <li>Italian Lasagna</li>
          <li>Italian Desserts</li>
          <li>Salads & Appetizers</li>
          <li>Garlic Bread</li>
        </ul>

        <h2>Why Choose Us?</h2>

        <ul>
          <li>Authentic Italian Recipes</li>
          <li>Premium Ingredients</li>
          <li>Freshly Prepared Food</li>
          <li>Experienced Chefs</li>
          <li>Elegant Ambience</li>
          <li>Exceptional Service</li>
        </ul>

        <h2>Popular Dishes</h2>

        <ul>
          <li>Margherita Pizza</li>
          <li>Four Cheese Pizza</li>
          <li>Alfredo Pasta</li>
          <li>Carbonara Pasta</li>
          <li>Lasagna</li>
          <li>Tiramisu</li>
          <li>Panna Cotta</li>
          <li>Gelato</li>
        </ul>

      </nav>

      <article>

<h2 id="about">About Us</h2>
        <img src="restaurant.webp" alt="La Toscana Restaurant" class="banner" />

        <p>
          La Toscana is one of the finest Italian restaurants in Chandigarh,
          offering an authentic Italian dining experience inspired by the rich
          culinary traditions of Italy. The restaurant is known for its gourmet
          cuisine, elegant interiors and exceptional hospitality.
        </p>

        <p>
          Whether you are planning a family dinner, romantic date, business
          lunch or a celebration with friends, La Toscana provides the perfect
          atmosphere to enjoy delicious Italian food.
        </p>

        <h2>Freshly Made Pasta</h2>

        <img src="i1.jpg" alt="Fresh Pasta" class="banner" />

        <p>
          Pasta is one of the most loved dishes in Italian cuisine and La
          Toscana proudly serves freshly prepared pasta made using authentic
          recipes and premium ingredients.
        </p>

        <p>
          Guests can enjoy Alfredo Pasta, Carbonara Pasta, Arrabbiata Pasta and
          Bolognese Pasta, each cooked with rich sauces and traditional Italian
          flavours.
        </p>

        <h2>Italian Lasagna</h2>

        <img src="i2.jpg" alt="Italian Lasagna" class="banner" />

        <p>
          Our delicious lasagna combines layers of pasta sheets, rich tomato
          sauce, cheese and carefully selected ingredients to create a
          comforting Italian classic loved by guests.
        </p>

        <h2>Authentic Wood Fired Pizza</h2>

        <img src="i3.jpg" alt="Wood Fired Pizza" class="banner" />

        <p>
          La Toscana serves authentic wood-fired pizzas prepared using fresh
          dough, premium toppings and traditional Italian baking methods.
        </p>

        <p>
          Popular choices include Margherita Pizza, Four Cheese Pizza and
          Vegetarian Pizza, all baked to perfection for a rich smoky flavour.
        </p>

        <h2>Italian Desserts</h2>

        <p>
          No Italian meal is complete without dessert. Guests can enjoy
          Tiramisu, Panna Cotta, Cheesecake, Gelato and Chocolate Lava Cake,
          making every meal truly memorable.
        </p>

        <h2>Quality Ingredients</h2>

        <p>
          One of the hallmarks of Italian cuisine is the quality of ingredients.
          At La Toscana, fresh vegetables, herbs, cheeses and sauces are
          carefully selected to ensure freshness, authenticity and exceptional
          taste.
        </p>

        <h2>Dining Experience</h2>

        <p>
          The elegant interiors, warm lighting and professional service create a
          welcoming atmosphere for every guest. Our commitment to quality and
          hospitality has made La Toscana a favourite destination for Italian
          food lovers in Chandigarh.
        </p>

        <h2>Visit La Toscana</h2>

        <p>
          Experience the authentic flavours of Italy right here in Chandigarh.
          From wood-fired pizzas and freshly made pasta to premium desserts,
          every dish is prepared with passion and dedication to Italian
          tradition.
        </p>

      </article>

    </section>

<footer id="contact">
<p>
La Toscana Restaurant<br>
Sector 35, Chandigarh<br>
Phone: +91 98765 43210<br>
Email: info@latoscana.com
</p>

<p>
© 2026 La Toscana | Authentic Italian Restaurant in Chandigarh
</p>    </footer>

  </body>
</html>