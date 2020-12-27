document.querySelector(".search-btn").addEventListener("click", function()
{
    document.querySelector(".search-txt").classList.toggle("active");
})

document.querySelector(".search-btn").addEventListener("click", function()
{
    document.querySelector(".shopping-cart").classList.toggle("disabled");
})

document.querySelector(".search-btn").addEventListener("click", function()
{
    document.querySelector(".user").classList.toggle("disabled2");
})

document.querySelector(".mob-nav-link1").addEventListener("click", function ()
{
    document.querySelector(".mob-dropdown1").classList.toggle("mob-drop1");
})

document.querySelector(".mob-nav-link2").addEventListener("click", function ()
{
    document.querySelector(".mob-dropdown2").classList.toggle("mob-drop2");
})

document.querySelector(".search-btn").addEventListener("click", function ()
{
    document.querySelector(".search-btn").classList.toggle("color");
})

document.querySelector(".search-txt").addEventListener("mouseup",function()
{
    document.querySelector(".search-box").classList.toggle("shadow");
})

document.querySelector(".burger").addEventListener("click",function()
{
    document.querySelector(".mob-nav-list").classList.toggle("mob-nav-active");
})
