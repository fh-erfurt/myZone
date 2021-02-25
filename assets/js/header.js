document.addEventListener('DOMContentLoaded', function()
{
    //search
    var searchBox = document.getElementById('search-box');

    searchBox.addEventListener('click',function()
    {
        searchBox.style.boxShadow = '0 0.05rem 1rem #808080';
    })

    document.addEventListener('click',function(event)
    {
        var isClicked = searchBox.contains(event.target);
        if(!isClicked)
        {
            searchBox.style.border = 'none';
            searchBox.style.boxShadow = 'none';
        }
    })


    //popUp
/*
PopUp Container ist leider auch geblured trotz versuchen ihn zu separieren
Kommentar entfernen und der Hintergrund wird beim aufrufen des Login PopUps geblured

Versuche PopUp vom Header zu separieren und nicht mit zu stylen:
1.
    var header1 = document.getElementsByClassName('header')[0];
    var header = header1.querySelectorAll('div:not(.pop-up)');
    header.style.webkitFilter = 'blur(2px)';

2.
    var header1 = document.getElementsByClassName('header')[0];
    var header = header1.query('div');
    var del = header[6]     --PopUp Element in array
    header1.splice(del,1);
    header1.style.webkitFilter = 'blur(2px)';

3.
   var header = document.getElementsByClassName('header')[0];
   var popup = document.getElementsByClassName('pop-up')[0];
   header.style.webkitFilter = 'blur(2px)';
   popup.style.webkitFilter = 'blur(0px)';
*/

    //Entkommentieren zum Testen!
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
        console.log('here')

    }

    function unsetStyle(page,navbar,footer)
    {
        page.style.webkitFilter = 'none';
        navbar.style.webkitFilter = 'none';
        footer.style.webkitFilter = 'none';

    }
*/
});