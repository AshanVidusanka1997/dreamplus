

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




function goToCat(cat_id) {
   var url = "store.php";
   // url = url + "?Command=" + "save";
   url = url + "?FILTER_F=" + cat_id;
   window.open(url, "_blank");
}

function goToPro(pro_id) {
   var url = "product.php";
   // url = url + "?Command=" + "save";
   url = url + "?FILTER_F=" + pro_id;
   window.open(url, "_blank");
}


function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "message_data.php";
    url = url + "?Command=" + "save_message";
    url = url + "&name=" + document.getElementById("name").value;
    url = url + "&email=" + document.getElementById("email").value;
    url = url + "&subject=" + document.getElementById("subject").value;
    url = url + "&message=" + document.getElementById("message").value;
   
    xmlHttp.onreadystatechange = saveitem;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function saveitem() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            document.getElementById("sendmessage").style.display = "-webkit-box";
            document.getElementById("errormessage").style.display = "none";
        } else {
            document.getElementById("errormessage").style.display = "-webkit-box";
            document.getElementById("sendmessage").style.display = "none";
        }
    }
}

function savefeed() {
     xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById('name1').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Enter Your Name</span></div>";
        return false;
    }
    if (document.getElementById('feed').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Enter the Feedback</span></div>";
        return false;
    }


    var url = "feed_data.php";
    url = url + "?Command=" + "save_feed";
    url = url + "&name=" + document.getElementById("name1").value;
    url = url + "&feed=" + document.getElementById("feed").value;


    xmlHttp.onreadystatechange = savefeedmsg;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function savefeedmsg() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") { 
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved Successfully</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);

            setTimeout(function () {
            location.reload();
        }, 1000);
            
        } else { 
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";

            setTimeout(function () {
            location.reload();
        }, 250);
        }
    }
}