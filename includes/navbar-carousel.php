<body class="loading">
    <!-- Loading Screen -->
    <div id="loadingScreen"><div></div><div></div></div>
    
    <header>
        <!-- Navigation Bar -->

            <div class="logo">
                <a href="index.php"><img src="./images/logo.png" alt="Logo">Jules Watches</a>
            </div>
            <div class="navLinks" id="linkContainer">
                <a href="index.php"><i class="fas fa-home"></i></a>
                <a href="menswatches.php">mens</a>
                <a href="womenswatches.php">womens</a>
                <a href="#">brand</a>
                <a href="cartview.php">cart <i class="fa fa-shopping-cart"></i></a>
            </div>
            
            <div class="navRightSide">
                <?php if(isset($_SESSION["email"])) : ?>
                    <div class="showUser">
                        <?php if($_SESSION["image"] !== NULL) : ?>
                            <img src="./images/user_content/<?php echo $_SESSION["image"]; ?>" alt="User Picture">
                        <?php else : ?>
                            <i class="fa fa-user-circle-o"></i>                        
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <div id="openModal">
                        <i class="fa fa-user-circle-o"></i>
                        <span>Sign in</span>
                    </div>
                <?php endif; ?>
                <a href="javascript:void(0);" class="icon" onclick="showLinks()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
    </header>

    <!-- Registration & Sign In Form -->

    <div class="registrationModal">
        <button id="closeRegModal"><i class="fa fa-close"></i></button>
        <div class="modal-Left">
            <div class="signInForm">
                <h1>welcome back!</h1>
                <h2>To keep connected with us please login with your personal info</h2>
                <button id="signInBtn">sign in</button>
            </div>
            <div class="signInFormContent">
                <h1>sign in</h1>
                <div class="line"></div>
                <div class="signInOption google">
                    <i class="fa fa-google"></i>
                    <span>Sign in with Google</span>
                </div>
                <div class="signInOption facebook">
                    <i class="fa fa-facebook"></i>
                    <span>Sign in with Facebook</span>
                </div>
                <div class="orDivider">
                    <div class="line"></div>
                    <span>or</span>
                    <div class="line"></div>
                </div>
                <span>Jules Watches</span>
                <form method="post">
                    <i class="fa fa-envelope"></i><input type="email" class="txtInputStyles" placeholder="Email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
                    <i class="fa fa-lock"></i><input type="password" class="txtInputStyles" placeholder="Password" name="password" required>
                    <div class="rememberMe">
                        <input type="checkbox" id="rememberChkBox">
                        <label for="rememberChkBox">Remember me</label>
                    </div>
                    <input type="submit" value="sign in">
                </form>
            </div>
        </div>
        <div class="modal-Right">
            <h1>create account</h1>
            <div class="line"></div>
            <form method="post" action="process-signup.php" enctype="multipart/form-data">
                <i class="fa fa-user"></i>
                <div>
                    <input type="text" name="fname" placeholder="First Name" class="txtInputStyles" required>
                    <input type="text" name="lname" placeholder="Last Name" class="txtInputStyles" required>
                </div>
                <i class="fa fa-envelope"></i>
                <div>
                    <input type="email" placeholder="Email" name="email" class="txtInputStyles" required>
                </div>
                <i class="fa fa-map-marker"></i>
                <div>
                    <input type="text" placeholder="Address" name="address" class="txtInputStyles" required>
                    <input type="text" class="txtInputStyles" name="city" placeholder="City" required>
                </div>
                <i class="fa fa-phone"></i>
                <div>
                    <input type="text" class="txtInputStyles" name="phone" placeholder="Phone">
                </div>
                <i class="fa fa-birthday-cake"></i>
                <div>
                    <input type="text" placeholder="YYYY" name="year" class="txtInputStyles" maxlength="4">
                    <input type="text" class="txtInputStyles" name="month" placeholder="MM" maxlength="2">
                    <input type="text" class="txtInputStyles" name="day" placeholder="DD" maxlength="2">
                </div>
                <i class="fa fa-lock"></i>
                <div>
                    <input type="password" placeholder="Password" name="password" class="txtInputStyles" required>
                    <input type="password" class="txtInputStyles" name="password_repeat" placeholder="Repeat Password" required>
                </div>
                <div class="uploadFile">
                    <label for="profileImg">
                        <i class="fa fa-upload"></i>
                        <span id="labelTxt">Upload profile picture</span>
                        <input type="file" id="profileImg" name="image" class="hideDefaultFileInput">
                    </label>
                </div>
                <div class="termsDiv">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">I accept the <span>terms and conditions<i class="fa fa-external-link"></i></span></label>
                </div>
                <input type="submit" value="create account">
            </form>
        </div>
    </div>

    <!-- Displaying User Data -->

    <div class="user-data">
        <div class="userPicture">
            <?php if($_SESSION["image"] !== NULL) : ?>
                <img src="./images/user_content/<?php echo $_SESSION["image"]; ?>" alt="User Picture" class="showUserImg">
            <?php else : ?>
                <i class="fa fa-user-circle-o"></i>
            <?php endif; ?>
            <div class="changeImg"><i class='fas fa-camera'></i></div>
        </div>
        <h1><?php print_r($_SESSION["first_name"]); echo " "; print_r($_SESSION["last_name"]); ?></h1>    
        <h2><?php print_r($_SESSION["email"]); ?></h2>
        <div class="userDetails">
            <div class="line">
                <span>first name</span><span class="floatRight"><?php print_r($_SESSION["first_name"]); ?></span><i class="fas fa-chevron-right"></i>
            </div>
            <div class="line">
                <span>last name</span><span class="floatRight"><?php print_r($_SESSION["last_name"]); ?></span><i class="fas fa-chevron-right"></i>
            </div>
            <div class="line">
                <span>birthday</span>
                <span class="floatRight">
                    <?php if($_SESSION["birth_date"] !== NULL) : print_r($_SESSION["birth_date"]); ?>
                    <?php else : ?>
                        <i>undefined</i>
                    <?php endif; ?>
                </span>
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="line">
                <span>phone</span>
                <span class="floatRight">
                    <?php if($_SESSION["phone"] !== NULL) : print_r($_SESSION["phone"]); ?>
                    <?php else : ?>
                        <i>undefined</i>
                    <?php endif; ?>
                </span>
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="line">
                <span>address</span><span class="floatRight"><?php print_r($_SESSION["address"]); ?></span><i class="fas fa-chevron-right"></i>
            </div>
            <div class="line last">
                <span>city</span><span class="floatRight"><?php print_r($_SESSION["city"]); ?></span><i class="fas fa-chevron-right"></i>
            </div>
        </div>
        <a href="logout.php">sign out</a>
        <button class="closeUserBtn"><i class="fa fa-close"></i></button>
    </div>

    <?php
        if(isset($_SESSION["account_created"])){
            ?>
                <div class="accountCreated">
                    <span>account created successfully!</span>
                    <button id="closeCreated"><i class="fa fa-close"></i></button>
                </div>
            <?php
            unset($_SESSION["account_created"]);
        }
    ?>