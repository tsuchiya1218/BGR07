<link rel="stylesheet" type="text/css" href="./css/banner.css">
<header class="header">
    <div class="header_inner">
        <div class="header_row">
            <div class="header_brand">
                <a href="./index.php">
                    <!-- BannerIMG -->
                    <img src="./img/Banner.png" width="150" height="45">
                </a>
            </div>
            <div class="header_spacer">
                <div class="search_bar">
                    <form action="" method="POST">
                        <input type="text" class="search_text" placeholder="検索">
                        <div class="search_button">
                            <input type="image" src="./img/search.png" class="search_button" width="20" height="20">
                        </div>
                    </form>
                </div>
            </div>
            <div class="cart">
                <a href="./cart.php">
                    <img src="./img/cart.png" width="45" height="45">
                </a>
            </div>
            <?php
            if (isset($_SESSION['cCode'])) {
                echo <<<EOM
                        <div class="header_login_now">
                        ようこそ<br>
                        $_SESSION[cName]さん
                    </div>
                    <div class="header_registration">
                        <a href="./logout.php">
                            <img src="./img/logout.png" width="45" height="45">
                        </a>
                    </div>
                EOM;
            } else if (!isset($_SESSION['cName'])) {
                echo <<<EOM
                        <div class="header_login">
                        <a href="./login.php">
                            <img src="./img/login.png" width="45" height="45">
                        </a>
                    </div>
                    <div class="header_registration">
                        <a href="./register_customer.php">
                            <img src="./img/registration.png" width="45" height="45">
                        </a>
                    </div>
                EOM;
            }
            ?>
        </div>
        <nav>
            <div class="category_navigation">
                <div class="category_navigation_inner">
                    <div class="category_navigation_list">
                        <ul>
                            <li><a href="campaign.php">キャンペーン中</a></li>
                            <li><a href="">セール中</a></li>
                            <?php
                            require_once 'db_connect.php';
                            $sql = "SELECT CategoryID,CategoryName
                                    FROM Category
                                    ORDER BY CategoryID ASC";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            while (($rec = $stmt->FETCH(PDO::FETCH_ASSOC)) != null) {
                                echo <<<EOM
                            <li><a href="search.php?catID=$rec[CategoryID]">$rec[CategoryName]</a></li>\n
                            EOM;
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header><?= "\n" ?>