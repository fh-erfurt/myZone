document.addEventListener('DOMContentLoaded', function()
{
    //search
    var searchBox = document.getElementById('search-box');

    searchBox.addEventListener('click',function()
    {
        searchBox.style.boxShadow = '0 0.05rem 1rem #808080';
    });

    document.addEventListener('click',function(event)
    {
        var isClicked = searchBox.contains(event.target);     // clicked outside of searchBox
        if(!isClicked)
        {
            searchBox.style.border = 'none';
            searchBox.style.boxShadow = 'none';
        }
    });


    //popUp
/*
PopUp Container ist leider auch geblured trotz versuchen ihn von Header zu separieren
Kommentar entfernen und der Hintergrund wird beim aufrufen des Login PopUps geblured
*/

/*
    var openPopUp = document.getElementsByClassName('pop-icon')[0];
    var closePopUp = document.getElementsByClassName('x-icon')[0];
    var footer = document.getElementsByClassName('footer')[0];
    var navbar = document.getElementsByClassName('menu')[0];

    if(window.location.search === '' || window.location.search === 'index.php' && document.body.offsetWidth >= 500)
    {
        var home = document.getElementsByClassName('home')[0];
        openPopUp.addEventListener('click',function()
        {
            setStyle(home,navbar,footer)
        });
        closePopUp.addEventListener('click',function()
        {
            unsetStyle(home,navbar,footer)
        });
    }
    else if(window.location.search === '?c=products&a=all' && document.body.offsetWidth >= 500)
    {
        var products = document.getElementsByClassName('content')[0];
        openPopUp.addEventListener('click',function()
        {
            setStyle(products,navbar,footer)
        });
        closePopUp.addEventListener('click',function()
        {
            unsetStyle(products,navbar,footer)
        });
    }
    else if(window.location.search === '?c=products&a=shoppingCart' && document.body.offsetWidth >= 500)
    {
        var cart = document.getElementsByClassName('shopping-cart-box')[0];
        openPopUp.addEventListener('click',function()
        {
            setStyle(cart,navbar,footer)
        });
        closePopUp.addEventListener('click',function()
        {
            unsetStyle(cart,navbar,footer)
        });
    }

    function setStyle(page,navbar,footer)
    {
        page.style.webkitFilter = 'blur(2px)';
        navbar.style.webkitFilter = 'blur(2px)';
        footer.style.webkitFilter = 'blur(2px)';
    }

    function unsetStyle(page,navbar,footer)
    {
        page.style.webkitFilter = 'blur(0px)';
        navbar.style.webkitFilter = 'blur(0px)';
        footer.style.webkitFilter = 'blur(0px)';
    }
*/
});