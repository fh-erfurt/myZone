document.addEventListener('DOMContentLoaded', function()
{
    //search
    var searchBox = document.getElementById('search-box');

    searchBox.addEventListener('click',function()
    {
        searchBox.style.border = '1px solid white';
        searchBox.style.boxShadow = '0 0.05rem 1rem white';
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
});