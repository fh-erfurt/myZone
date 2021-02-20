document.addEventListener('DOMContentLoaded', function() {

  var shoppingCart = document.getElementsByClassName('shopping-cart')[0];
  var cartContent = document.getElementById('cart-content');

  if(window.location.search != '?c=products&a=shoppingCart')
  {
    shoppingCart.addEventListener('mouseover', function()
    {
      cartContent.style.visibility = 'visible';
    })

    shoppingCart.addEventListener('mouseout', function()
    {
      cartContent.style.visibility = 'hidden';
    })
  }

});

