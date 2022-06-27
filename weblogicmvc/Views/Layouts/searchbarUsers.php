<input style="margin-left: 0rem!important" id="searchBarUsers" class="form-control mr-sm-2 mx-4" type="search" placeholder="Search" aria-label="Search" />

<script>
    $("#searchBarUsers").keyup(search);

    $("#searchBarUsers").on('search', function() 
    {
        var searchQuery = $(this).val().toUpperCase();
        var listUsers = $(".listUsers").children("tr");
        
        if(searchQuery == "")
        {
            listUsers.show();
        }
    });

    function search(e)
    {
        $(e.target)[0] != null ? searchQuery = $(e.target).val().toUpperCase() : searchQuery = $(e).val().toUpperCase();

        var listUsers = $(".listUsers").children("tr");

        listUsers.hide();

        for(var user of listUsers)
        {
            if(user.innerText.toUpperCase().includes(searchQuery))
            {
                $(user).toggle();
            }
        }
    }
</script>