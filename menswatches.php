<?php include 'includes/header.php' ?>
<?php include 'login.php' ?>
<?php include 'includes/navbar-carousel.php' ?>

<div class="topSection">
    <h1>Men's Watches</h1>
    <p>Our men’s watch collection features thousands of timepieces from the world’s top watch brands, including Casio, Fossil, Citizen and Hugo. Choose from our <strong>designer watches</strong> to complete that sophisticated look, find your perfect fitness and outdoor companion with our range of <strong>sports watches</strong> or stay connected wherever you are with our <strong>smart watches</strong>.</p>
</div>

<div class="listWatches">
    <?php
        $mysqli = require __DIR__ . "./includes/database.php";
        $sql = "SELECT * FROM watches WHERE gender = 'male'";
        $result = $mysqli -> query($sql);
    ?>
    <h1><strong><?php print_r(mysqli_num_rows($result)); ?></strong> products found</h1>
    <div class="watchesContainer">
        
        <?php
            if($result -> num_rows > 0){
                while($watch = $result -> fetch_assoc()){ ?>
                    <form action="productview.php" method="POST" class="productView">
                        <input type="hidden" name="productId" value="<?php echo $watch["id"]; ?>">
                        <div class="displayWatches">
                            <div class="watchImg"><img src="./images/watches/<?php echo $watch["image"]; ?>" alt="Watch image"></div>     
                            <button class="addToCartBtn">view product</button>
                            <div class="watchInfo">
                                <span><?php print_r($watch["brand"]); ?></span>
                                <span><strong>&euro;<?php print_r($watch["price"]); ?></strong></span>
                                <div class="rating">
                                    <?php
                                        if($watch["rating"] != NULL){
                                            for($i=1; $i<$watch["rating"]; $i++){
                                                ?>
                                                <i class="fa fa-star"></i>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                }
            }
        ?>
    </div>
</div>

<?php include 'includes/footer.php' ?>