<input style="margin-left: 0rem!important" id="searchBarProdutos" class="form-control mr-sm-2 mx-4" type="search" placeholder="Search" aria-label="Search" />

<script>
    $("#searchBarProdutos").keyup(search);

    $("#searchBarProdutos").on('search', function() 
    {
        var searchQuery = $(this).val().toUpperCase();
        var listProdutos = $(".listProdutos").children("tr");
        
        if(searchQuery == "")
        {
            listProdutos.show();
        }
    });

    function search(e)
    {
        $(e.target)[0] != null ? searchQuery = $(e.target).val().toUpperCase() : searchQuery = $(e).val().toUpperCase();

        var listProdutos = $(".listProdutos").children("tr");
        
        listProdutos.hide();

        for(var produto of listProdutos)
        {
            if(produto.innerText.toUpperCase().includes(searchQuery))
            {
                $(produto).toggle();
            }
        }
    }
</script>