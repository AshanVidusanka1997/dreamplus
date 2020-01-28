
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

    getdt()
}



function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "sub_category_data.php";
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
        

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        document.getElementById("Sub_Category_ID").value = XMLAddress1[0].childNodes[0].nodeValue;


   


    }
}



function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }



    var url = "sub_category_data.php";
    url = url + "?Command=" + "save_item";
    url = url + "&Sub_Category_ID=" + document.getElementById("Sub_Category_ID").value;
    url = url + "&Category=" + document.getElementById("Category").value;
    url = url + "&uniq=" + document.getElementById("uniq").value;
    url = url + "&Sub_Category=" + document.getElementById("Sub_Category").value;
   
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
        }
    }
}

