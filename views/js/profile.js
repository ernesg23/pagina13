const writtenPosts = document.querySelector(".writtenPosts")
const editArticle = document.querySelector(".editArticle") 
$(editArticle).click (()=>{
    $.ajax({
        method: "GET",
        url: "../../modules/users/creator.php",
        success: (data) => {
            $("#content").html(data)
        } 
        // data: {
        //     module: module,
        //     action: action
        // }
    })
})
$(writtenPosts).click (()=>{
    $.ajax({
        method: "GET",
        url: "../../modules/posts/reader.php",
        success: (data) => {
            $("#content").html(data)
        } 
        // data: {
        //     module: module,
        //     action: action
        // }
    })
})