<?php include 'includes/header.php' ?>
<?php include 'login.php' ?>


<?php include 'includes/navbar-carousel.php' ?>
<?php if($is_invalid) : ?>
    <em style="color: red;">Invalid login</em>
<?php endif; ?>

<!-- Hero Section -->
<div class="heroSection">
    <div class="headerTxt">
        <div>
            <h1>Elegant designs, carefully curated.</h1>
            <p>Shop <strong>Jules Watches</strong> curated selection of Designer</br>watches built for any occasion.</p>
            <div></div>
            <a href="#">buy now</a>
        </div>
    </div>
    <div class="carouselButtons">
        <input type="radio" name="heroImg" value="img1" class="radioBtn" checked="checked">
        <input type="radio" name="heroImg" value="img2" class="radioBtn">
        <input type="radio" name="heroImg" value="img3" class="radioBtn">
        <input type="radio" name="heroImg" value="img4" class="radioBtn">
    </div>
</div>

<!-- Main Content -->

<div class="content">
    <div class="watchesPicks">
        <h1>top picks</h1>
        <div class="watchesContainer">
            <button id="scrollLeft"><i class="fas fa-chevron-left"></i></button>
                <div class="watches">
                    <?php
                        $mysqli = require __DIR__ . "./includes/database.php";
                        $sql = "SELECT id, brand, image, price FROM watches ORDER BY sold DESC LIMIT 10";
                        $result = $mysqli -> query($sql);

                        if($result -> num_rows > 0){
                            while($watch = $result -> fetch_assoc()){ ?>
                                <form action="productview.php" method="POST" class="productView">
                                    <input type="hidden" name="productId" value="<?php echo $watch["id"]; ?>">
                                    <div class="displayWatches">
                                        <div class="watchImg"><img src="./images/watches/<?php echo $watch["image"]; ?>" alt="Watch image"></div>
                                        <div class="watchInfo">
                                            <span><?php print_r($watch["brand"]); ?></span>
                                            <span><strong>&euro;<?php print_r($watch["price"]); ?></strong></span>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            }
                        }
                    ?>
                </div>
            <button id="scrollRight"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
    <div class="parallax"></div>
</div>

<?php include 'includes/footer.php' ?>