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
});