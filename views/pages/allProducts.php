<section class="menu">
    <nav class="navbar">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="#" class="nav-link1">Men</a>
                <ul class="dropdown1">
                    <li class="dropdown-item">
                        <a href="#" class="dropdown-link">Schuhe</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#" class="dropdown-link">Streetwear</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#" class="dropdown-link">Sale</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link2">Women</a>
                <ul class="dropdown2">
                    <li class="dropdown-item">
                        <a href="#" class="dropdown-link">Schuhe</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#" class="dropdown-link">Streetwear</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#" class="dropdown-link">Sale</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</section>
<section class="mob-menu">
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <nav class="mob-nav">
        <ul class="mob-nav-list">
            <li class="mob-nav-item">
                <a href="#" class="mob-nav-link1">Men <div class="angle"> <i class="fas fa-angle-down"></i> </div></a>
                <ul class="mob-dropdown1">
                    <li class="mob-dropdown-item">
                        <a href="#" class="mob-dropdown-link">Schuhe</a>
                    </li>
                    <li class="mob-dropdown-item">
                        <a href="#" class="mob-dropdown-link">Streetwear</a>
                    </li>
                    <li class="mob-dropdown-item">
                        <a href="#" class="mob-dropdown-link">Sale</a>
                    </li>
                </ul>
            </li>
            <li class="mob-nav-item">
                <div href="#" class="mob-nav-link2">Women <div class="angle"> <i class="fas fa-angle-down"></i> </div>
                </div>
                </a>
                <ul class="mob-dropdown2">
                    <li class="mob-dropdown-item">
                        <a href="#" class="mob-dropdown-link">Schuhe</a>
                    </li>
                    <li class="mob-dropdown-item">
                        <a href="#" class="mob-dropdown-link">Streetwear</a>
                    </li>
                    <li class="mob-dropdown-item">
                        <a href="#" class="mob-dropdown-link">Sale</a>
                    </li>
                </ul>
            </li>
            <li class="mob-filter">
                <div class="mob-filter-name">Sortieren:
                    <div class="mob-filter-box">
                        <select class="mob-sort-by_f">

                        </select>
                    </div>
                </div>
            </li>
            <li class="mob-filter">
                <div class="mob-filter-name">Marke:
                    <div class="mob-filter-box">
                        <select class="mob-brand_f">

                        </select>
                    </div>
                </div>
            </li>
            <li class="mob-filter">
                <div class="mob-filter-name">Farbe:
                    <div class="mob-filter-box">
                        <select class="mob-color_f">

                        </select>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</section>
<section class="filter-bar">
    <div class="inset-filter">
        <div class="filter">Sortieren:
            <div class="filter-box">
                <select class="sort-by_f">

                </select>
            </div>
        </div>
        <div class="filter">Marke:
            <div class="filter-box">
                <select class="brand_f">

                </select>
            </div>
        </div>
        <div class="filter">Farbe:
            <div class="filter-box">
                <select class="color_f">

                </select>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <h1 class="title">Schuhe Men:</h1>
    <div class="row">
        <? $sql = 'SELECT * FROM `products`';
           $products = $GLOBALS['db']->query($sql)->fetchAll();
        foreach($products as $product): ?>
            <a class="link" href="#">
                <div class="product">
                    <div class="upper">
                        <img class="img" src="<?=ROOTPATH?>assets/img/products/product_<?=$product['id']?>.jpg">
                    </div>
                    <div class="lower">
                        <h1 class="brand"><?=$product['brand']?></h1>
                        <h2 class="model"><?=$product['name']?></h2>
                        <h3 class="price"><?=$product['price']?>€</h3>
                    </div>
                </div>
            </a>
        <? endforeach;?>
    </div>
</section>