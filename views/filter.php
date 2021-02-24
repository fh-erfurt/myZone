<form method="get">
    <input name="c" value="products" hidden>
    <input name="a" value="search" hidden>
    <section class="filter-bar">
        <div class="filter-main">
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
                            $brands = \dwp\models\Brand::select();
                            if(isset($brands)) :
                                foreach ($brands as $brand) :
                                    ?>
                                    <option class="filter-option" value="<?=$brand->id?>"><?=$brand->name?></option>
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
                <div class="filter-submit-box">
                    <button class="filter-submit-btn" type="submit">
                        Anwenden
                    </button>
                </div>
            </div>

        </div>
    </section>

</form>
<form method="get">
    <input name="c" value="products" hidden>
    <input name="a" value="search" hidden>
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
                            <select class="mob-sort-by_f" name="sortBy">
                                <option class="filter-option">-</option>
                                <option class="filter-option" value="price_asc">Preis aufsteigend</option>
                                <option class="filter-option" value="price_desc">Preis absteigend</option>
                                <option class="filter-option" value="alph_asc">Alphabetisch aufsteigend</option>
                                <option class="filter-option" value="alph_desc">Alphabetisch absteigend</option>
                            </select>
                        </div>
                    </div>
                </li>
                <li class="mob-filter">
                    <div class="mob-filter-name">Marke:
                        <div class="mob-filter-box">
                            <select class="mob-brand_f" name="brand">
                                <option class="filter-option" value="">Alle</option>
                                <?
                                    if(isset($brands)) :
                                    foreach ($brands as $brand) :
                                ?>
                                    <option class="filter-option" value="<?=$brand->id?>"><?=$brand->name?></option>
                                <? endforeach; endif;?>
                            </select>
                        </div>
                    </div>
                </li>
                <li class="mob-filter">
                    <div class="mob-filter-name">Farbe:
                        <div class="mob-filter-box">
                            <select class="mob-color_f" name="color">
                                <option class="filter-option" value="">Alle</option>
                                <?
                                    if(isset($colors)) :
                                    foreach ($colors as $color) :
                                ?>
                                    <option class="filter-option" value="<?=$color->id?>"><?=$color->name?></option>
                                <? endforeach; endif;?>
                            </select>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="filter-submit-box">
                <button class="filter-submit-btn" type="submit">
                    Anwenden
                </button>
            </div>
        </nav>

    </section>

</form>