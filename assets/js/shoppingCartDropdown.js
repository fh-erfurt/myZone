document.addEventListener('DOMContentLoaded', function()
{

    var shoppingCart = document.getElementsByClassName('shopping-cart')[0];
    var cartContent = document.getElementById('cart-content');
    var cartCount = document.getElementById('cart-count');
    var screenWidth = document.body.offsetWidth;

    // dont show Dropdown Content on Cart- and Checkoutpage
    // to prevent errors Dropdown musst have items and no use of Dropdown on mobile
    if(window.location.search !== '?c=products&a=shoppingCart' && window.location.search !== '?c=products&a=checkout' && screenWidth >= 500 && cartCount != null)
    {
      shoppingCart.addEventListener('mouseover', function()
      {
        cartContent.style.visibility = 'visible';
      });

      shoppingCart.addEventListener('mouseout', function()
      {
        cartContent.style.visibility = 'hidden';
      });
    }

});

