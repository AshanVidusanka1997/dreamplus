
function gotoCategory(id){

    var url = "cat.php";
    url = url + "?catid=" + id;
    window.open(url, '_blank');
    
}

function gotoSubCategory(id){

     var url = "subcat.php";
    url = url + "?subcatid=" + id;

    window.open(url, '_blank');
}

function gotoItem(id){
     var url = "showitem.php";
    url = url + "?id=" + id;

    window.open(url, '_blank');
}