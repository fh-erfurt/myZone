document.addEventListener('DOMContentLoaded', function()
{
    //search
    var searchBox = document.getElementById('search-box');

    if(searchBox)
    {
        searchBox.addEventListener('click',function()
        {
            searchBox.style.border = '1px solid white';
            searchBox.style.boxShadow = '0 0.05rem 1rem white';
        })
    }
})