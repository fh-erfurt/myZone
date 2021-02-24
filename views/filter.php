<form class="search-pop-up" method="get">
    <input name="c" value="products" hidden>
    <input name="a" value="search" hidden>
    <section class="filter-bar">
        <div class="inset-filter">
            <div class="filter">Sortieren:
                <div class="filter-box">
                    <select class="sort-by_f" name="sortBy">
                        <option class="filter-option">-</option>
                        <option class="filter-option" value="price_asc">Preis aufsteigend</option>
                        <option class="filter-option" value="price_desc">Preis absteigend</option>
                        <option class="filter-option" value="alph_asc">Alphabetisch aufsteigend</option>
                        <option class="filter-option" value="alph_desc">Alphabetisch absteigend</option>
                    </select>
                </div>
            </div>
            <div class="filter">Marke:
                <div class="filter-box">
                    <select class="brand_f" name="brand">
                        <option class="filter-option" value="">Alle</option>
                        <?
                            $colors = \dwp\models\Brand::select();
                            if(isset($colors)) :
                            foreach ($colors as $color) :
                        ?>
                            <option class="filter-option" value="<?=$color->id?>"><?=$color->name?></option>
                        <? endforeach; endif;?>
                    </select>
                </div>
            </div>
            <div class="filter">Farbe:
                <div class="filter-box">
                    <select class="color_f" name="color">
                        <option class="filter-option" value="">Alle</option>
                        <?
                            $colors = \dwp\models\Color::select();
                            if(isset($colors)) :
                            foreach ($colors as $color) :
                        ?>
                            <option class="filter-option" value="<?=$color->id?>"><?=$color->name?></option>
                        <? endforeach; endif;?>
                    </select>
                </div>
            </div>
        </div>
    </section>
    <button type="submit">
        TODO TODO TODO DNA!!!!!!!!
    </button>
</form>
<section class="mob-menu">
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn">
        <span class="nav-icon"></span>
    </label>
    <nav class="mob-nav">
        <ul class="mob-nav-list">
            <li class="mob-filter">
                <div class="mob-filter-name">Sortieren:
                    <div class="mob-filter-box">
                        <select class="mob-sort-by_f">
                            <option class="filter-option">Preis aufsteigend</option>
                            <option class="filter-option">Preis absteigend</option>
                            <option class="filter-option">Alphabetisch aufsteigend</option>
                            <option class="filter-option">Alphabetisch absteigend</option>
                        </select>
                    </div>
                </div>
            </li>
            <li class="mob-filter">
                <div class="mob-filter-name">Marke:
                    <div class="mob-filter-box">
                        <select class="mob-brand_f">
                            <option class="filter-option">Adidas</option>
                            <option class="filter-option">Nike</option>
                            <option class="filter-option">Reebok</option>
                        </select>
                    </div>
                </div>
            </li>
            <li class="mob-filter">
                <div class="mob-filter-name">Farbe:
                    <div class="mob-filter-box">
                        <select class="mob-color_f">
                            <option class="filter-option">Weiß</option>
                            <option class="filter-option">Schwarz</option>
                            <option class="filter-option">Rot</option>
                        </select>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</section>
