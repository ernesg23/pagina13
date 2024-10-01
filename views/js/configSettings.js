
    $("#users-configPosts").click (()=>{
        $.ajax({
            method: "POST",
            url: "./modules/users/configPostsContent.php",
        }).done(function(html){
            $(".contentPage").html(html);
        })
    })
    $("#users-configSettings").click (()=>{
        $.ajax({
            method: "POST",
            url: "./modules/users/configSettingsContent.php",
        }).done(function(html){
            $(".contentPage").html(html);
        })
    })

