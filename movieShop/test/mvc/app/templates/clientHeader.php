<header>
    <div class="nav">
            <div class="header">
                <div class="left-header">
                    <a class="active" href="/test/mvc/public/home">Home</a>
                    <div class="dropdown">
                        <a href="#movies">Movies</a>
                        <div class="dropdown_menu">
                            <a href="/test/mvc/public/home">Arabic Movies</a>
                            <a href="/test/mvc/public/home">Animation Movies</a>
                            <a href="/test/mvc/public/home">Others</a>
                        </div>

                    </div>
                </div>
                <div class="right-header">
                    <div class="search-container">
                        <div>
                            <form action="/action_page.php">
                                <input type="text" placeholder="Search.." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <a href="/test/mvc/public/basket">
                        <img src="/test/mvc/public/img/shopping-basket-24.png" />
                    </a>

                    <div class=registry>
                        <?php
                        if (isset($_SESSION['auth'])) {
                            if ($_SESSION['auth']) {
                                echo (" <a href='/test/mvc/public/logout'>Logout</a>");
                            }
                        } else {
                            echo ("<a href='/test/mvc/public/login'>Login</a>
                                <a href='/test/mvc/public/sign_up'>Sign Up</a>"
                            );
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="logo">
                <a href="/test/mvc/public/home">Movies Land</a>
            </div>
        </div>
    </div>
</header>