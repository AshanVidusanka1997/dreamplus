
function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
// Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function keyset(key, e) {

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function got_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000066";
}

function lost_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000000";
}



function newent() {

    newitem();
    clear_form();

}

function clear_form() {

    document.getElementById("Item_ID").value = "";
    document.getElementById("Category").value = "";
    document.getElementById("Sub_Category").value = "";
    document.getElementById("Model").value = "";
    document.getElementById("Name").value = "";
    document.getElementById("Size").value = "";
    document.getElementById("Description").value = "";
    document.getElementById("Features_Specifications").value = "";
    document.getElementById("amount").value = "";

}

function newitem() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "item_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = itemget_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function itemget_dt() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        document.getElementById("Item_ID").value = XMLAddress1[0].childNodes[0].nodeValue;
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("uniq");
        document.getElementById("uniq").value = XMLAddress1[0].childNodes[0].nodeValue;

    }
}


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "homeindex_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = get_dtt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function get_dtt() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        var myObj = [];

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id3");
        for (var i = 0; i < XMLAddress1.length; i++) {

            myObj.push(JSON.parse(XMLAddress1[i].childNodes[0].nodeValue));

        }

        sessionStorage.book = JSON.stringify(myObj);



    }
}


//
//
//var myApp = angular.module("myApp", ["ngRoute"]);
//
//myApp.config(function ($routeProvider) {
//    $routeProvider
//            .when("/books", {
//                templateUrl: "partials/book-list.html",
//                controller: "BookListCtrl"
//            })
//            .when("/kart", {
//                templateUrl: "partials/kart-list.html"
//            })
//            .otherwise({
//                redirectTo: "/books"
//            });
//});
//
//myApp.controller("HeaderCtrl", function ($scope) {
//    $scope.appDetails = {};
//    $scope.appDetails.title = "BooKart";
//    $scope.appDetails.tagline = "We have collection of 1 Million books";
//});
//
//
//myApp.controller("TopCtrl", function ($scope) {
//    var category = JSON.parse(sessionStorage.category);
//    var subcategory = JSON.parse(sessionStorage.subcategory);
//    // sessionStorage.clear();
//
//    $scope.category = category;
//    $scope.subcategory = subcategory;
//
//    $scope.gotoSubcat = function (subcategory) {
//
//        localStorage.setItem("itemid", subcategory);
//        var url = "buyitem.php";
//        url = url + "?itemid=" + subcategory;
//        window.open(url, '_blank');
//    }
//
//});
//
//myApp.controller("BookListCtrl", function ($scope) {
//    var books = JSON.parse(sessionStorage.book);
//    // sessionStorage.clear();
//    $scope.books = books;
//
//
//    $scope.addToKart = function (book) {
//
//        var url = "buyitem.php";
//        url = url + "?itemid=" + book;
//        window.open(url, '_blank');
//    }
//});


function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }


    var files = $('#file-3')[0].files; //where files would be the id of your multi file input
//or use document.getElementById('files').files;
    var name = document.getElementById('file-3');

    var t = 0;
    var data = new FormData();
    for (var i = 0, f; f = files[i]; i++) {
        var alpha = name.files[0];
        if (alpha == "") {
            t = 0;
        } else {
            t = 1;
        }
        data.append('id', document.getElementById('uniq').value);
        data.append('file', alpha);
    }

//    if (t == 0) {
//        data.append('img', document.getElementById('doldimg').value);
//        data.append('id', document.getElementById('uniq').value);
//
//    }


    data.append('Command', "imgsave");

    $.ajax({
        url: 'item_data.php',
        data: data,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (msg) {

        }
    });
 
    var url = "item_data.php";
    url = url + "?Command=" + "save_item";
    url = url + "&Item_ID=" + document.getElementById("Item_ID").value;
    url = url + "&Category=" + document.getElementById("Category").value;
    url = url + "&Sub_Category=" + document.getElementById("Sub_Category").value;
    url = url + "&Model=" + document.getElementById("Model").value;
    url = url + "&Name=" + document.getElementById("Name").value;
    url = url + "&Size=" + document.getElementById("Size").value;
    url = url + "&Description=" + document.getElementById("Description").value;
    url = url + "&Features_Specifications=" + document.getElementById("Features_Specifications").value;
    url = url + "&id=" + document.getElementById('uniq').value;
    url = url + "&amount=" + document.getElementById('amount').value;


    xmlHttp.onreadystatechange = saveitem;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function saveitem() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
            
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";

            setTimeout(function () {
                location.reload();
        }, 250);
        }
    }
}

function getSub() {


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "item_data.php";
    url = url + "?Command=" + "getsub";

    url = url + "&Category=" + document.getElementById("Category").value;

    xmlHttp.onreadystatechange = sub;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function sub() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("subcat");
        document.getElementById('sub').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

    }
}

function goto(book) {
    var url = "buyitem.php";
    url = url + "?itemid=" + book;
    window.open(url, '_blank');
}