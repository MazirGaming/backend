<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/46a24d346e.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css"/>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="nav-bar__mobile">
            <div class="button-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            
            <ul class="menu">
                <a href="#" class="menu-logo">
                    <div class="logo-img">
                        <img src="./img/logo.png" alt="">
                    </div>
                    <span class="page-title">
                        House
                    </span>
                </a>
                <li class="menu-item">
                    <a href="#">
                        About Us
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        Article
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        Property
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                    <div class="header-sub-menu">
                        <a href="" class="header-sub-item">Sub item 1</a>
                        <a href="" class="header-sub-item">Sub item 2</a>
                        <a href="" class="header-sub-item">Sub item 3</a>
                        <a href="" class="header-sub-item">Sub item 4</a>
                    </div>
                </li>
            </ul>
        </div>
        <header class="header">
            <div class="header-top">
                <a href="#" class="page-logo">
                    <div class="logo-img">
                        <img src="./img/logo.png" alt="">
                    </div>
                    <span class="page-title">
                        House
                    </span>
                </a>
                <nav class="nav-bar">
                    <ul class="menu">
                        <li class="menu-item">
                            <a href="#" class="button">
                                About Us
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="button">
                                Article
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="button">
                                Property
                                <i class="fa-solid fa-angle-down"></i>
                            </a>
                            <div class="header-sub-menu">
                                <a href="" class="header-sub-item">Sub item 1</a>
                                <a href="" class="header-sub-item">Sub item 2</a>
                                <a href="" class="header-sub-item">Sub item 3</a>
                                <a href="" class="header-sub-item">Sub item 4</a>
                            </div>
                        </li>
                    </ul>
                    <a href="#" class="button-signup button button-normal">
                        Sign Up!
                    </a>
                    <div class="button-menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </nav>
            </div>
            <div class="container">
                <div class="header-content">
                    <h2 class="header-heading">
                        find the place to <br> live 
                        <span class="header-heading-special">
                            your dreams
                        </span> <br>
                        easily here
                    </h2>
                    <p class="header-text">
                        Everything you need about finding your place to live will be here, where it will be easier for you
                    </p>
                    <div class="subcribe">
                        <form class="form-email" action="./Task2/send_email.php" method="post">
                            <input name="email" placeholder="Your email here" type="text" class="input-email">
                            <input class="btn-subcribe button button-primary" type="submit" value="Subscribe Now">
                        </form>
                    </div>
                    <span style="color:red" class="error">
                            <?php if (isset($_GET["emailErr"])) {
                            $emailErr = $_GET["emailErr"];
                            echo '<span class="error">' . $emailErr . '</span>';
                            } ?>
                        </span>
                </div>
            </div>
            <img src="./img/image6.png" alt="" class="retangle-head-right">
            <img src="./img/groupheader.png" alt="" class="retangle-head-left">
            <div class="modal"></div>
        </header>
        <main class="main">
            <section class="feature">
                <div class="container">
                    <div class="feature-recommend">
                        <div></div>
                        <span class="recommend-text">Our Recommendation</span>
                    </div>
                    <div class="feature-content">
                        <div class="feature-content-info">
                            <h2 class="feature-heading">Featured House</h2>
                            <ul class="feature-buttons">
                                <li class="button-item">
                                    <a class="button-item__active" href="#">
                                        <img src="./img/phhouse-fill.png" alt="">
                                        House 
                                    </a>
                                </li>
                                <li class="button-item">
                                    <a href="#">
                                        <img src="./img/icround-villa.png" alt="">
                                        Villa 
                                    </a>
                                </li>
                                <li class="button-item">
                                    <a href="#">
                                        <img src="./img/icround-apartment.png" alt="">
                                        Apartment 
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <ul class="feature-list">
                            <li class="feature-item">
                                <div class="feature-item-detail">
                                    <div class="feature-item-img">
                                        <img src="./img/Rectangle 15.png" alt="">
                                        <div class="feature-status popular">
                                            <img src="./img/ant-designfire-filled.svg" alt="">
                                            <p class="status-text">Popular</p>
                                        </div>
                                    </div>
                                    <p class="feature-item-title">Roselands House</p>
                                    <p class="feature-item-price">$ 35.000.000</p>
                                    <div class="feature-item-human">
                                        <img src="./img/photo-1507003211169-0a1dd7228f2d.avif" alt="">
                                        <div class="item-human-desc">
                                            <p class="item-human-name">Dianne Russell</p>
                                            <p class="item-human-text">Manchester, Kentucky</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="feature-item">
                                <div class="feature-item-detail">
                                    <div class="feature-item-img">
                                        <img src="./img/Rectangle16.png" alt="">
                                        <div class="feature-status new">
                                            <img src="./img/phhouse-fill.svg" alt="">
                                            <p class="status-text">New house</p>
                                        </div>
                                    </div>
                                    <p class="feature-item-title">Woodlandside</p>
                                    <p class="feature-item-price">$ 20.000.000</p>
                                    <div class="feature-item-human">
                                        <img src="./img/photo-1494790108377-be9c29b29330.avif" alt="">
                                        <div class="item-human-desc">
                                            <p class="item-human-name">Robert Fox</p>
                                            <p class="item-human-text">Dr. San Jose, South Dakota</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="feature-item">
                                <div class="feature-item-detail">
                                    <div class="feature-item-img">
                                        <img src="./img/Rectangle17.png" alt="">
                                        <div class="feature-status best">
                                            <img src="./img/entypowallet.svg" alt="">
                                            <p class="status-text">Best Deals</p>
                                        </div>
                                    </div>
                                    <p class="feature-item-title">The Old Lighthouse</p>
                                    <p class="feature-item-price">$ 44.000.000</p>
                                    <div class="feature-item-human">
                                        <img src="./img/photo-1543610892-0b1f7e6d8ac1.avif" alt="">
                                        <div class="item-human-desc">
                                            <p class="item-human-name">Ronald Richards</p>
                                            <p class="item-human-text">Santa Ana, Illinois</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="feature-item">
                                <div class="feature-item-detail">
                                    <div class="feature-item-img">
                                        <img src="./img/Rectangle18.png" alt="">
                                        <div class="feature-status popular">
                                            <img src="./img/ant-designfire-filled.svg" alt="">
                                            <p class="status-text">Popular</p>
                                        </div>
                                    </div>
                                    <p class="feature-item-title">Cosmo's House</p>
                                    <p class="feature-item-price">$ 22.000.000</p>
                                    <div class="feature-item-human">
                                        <img src="./img/photo-1580489944761-15a19d654956.avif" alt="">
                                        <div class="item-human-desc">
                                            <p class="item-human-name">Jenny Wilson</p>
                                            <p class="item-human-text">Preston Rd. Inglewood, Maine 98380</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="feature-item">
                                <div class="feature-item-detail">
                                    <div class="feature-item-img">
                                        <img src="./img/Rectangle18.png" alt="">
                                        <div class="feature-status popular">
                                            <img src="./img/ant-designfire-filled.svg" alt="">
                                            <p class="status-text">Popular</p>
                                        </div>
                                    </div>
                                    <p class="feature-item-title">Roselands House</p>
                                    <p class="feature-item-price">$ 35.000.000</p>
                                    <div class="feature-item-human">
                                        <img src="./img/photo-1580489944761-15a19d654956.avif" alt="">
                                        <div class="item-human-desc">
                                            <p class="item-human-name">Dianne Russell</p>
                                            <p class="item-human-text">Manchester, Kentucky</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>    
                    </div>
                </div>
            </section>
        </main>
        <footer class="footer">
            <div class="footer-info">
                <a href="#" class="footer-logo page-logo">
                    <div class="logo-img">
                        <img src="./img/logo.png" alt="">
                    </div>
                    <span class="page-title">
                        House
                    </span>
                </a>
                <p class="footer-desc">We provide information about properties such as houses, villas and apartments to help people find their dream home</p>
                <div class="footer-social">
                    <ul class="social-list">
                        <li class="social-item">
                            <a href="#">
                                <img src="./img/Group 4.png" alt="">
                            </a>
                        </li>
                        <li class="social-item">
                            <a href="#">
                                <img src="./img/Mask Group 3.png" alt="">
                            </a>
                        </li>
                        <li class="social-item">
                            <a href="#">
                                <img src="./img/Mask Group 2.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-menu">
                <ul class="footer-menu-list">
                    <li class="footer-menu-item">
                        <p class="footer-menu-title">Property</p>
                        <ul class="sub-menu">
                            <li class="sub-item">
                                <a href="">House</a>
                            </li>
                            <li class="sub-item">
                                <a href="">Apartment</a>
                            </li>
                            <li class="sub-item">
                                <a href="">Villa</a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer-menu-item">
                        <p class="footer-menu-title">Article</p>
                        <ul class="sub-menu">
                            <li class="sub-item">
                                <a href="">New Article</a>
                            </li>
                            <li class="sub-item">
                                <a href="">Popular Article</a>
                            </li>
                            <li class="sub-item">
                                <a href="">Most List</a>
                            </li>
                            <li class="sub-item">
                                <a href="">Tips & Tricks</a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer-menu-item">
                        <p class="footer-menu-title">Contact</p>
                        <ul class="sub-menu">
                            <li class="sub-item">
                                <a href="">112 Nguyen Huu Tho, Da Nang</a>
                            </li>
                            <li class="sub-item">
                                <a href="">(84)123456789</a>
                            </li>
                            <li class="sub-item">
                                <a href="">info@house.com</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
    <script src="./main/main.js"></script>
</body>
</html>