

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



function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "search_sample_joborder_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function custno(code)
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "search_item_data.php";
    url = url + "?Command=" + "pass_quot";
    url = url + "&custno=" + code;

    xmlHttp.onreadystatechange = passcusresult_quot;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function passcusresult_quot()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("OBJ");
        var json = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);
        // console.log(json);
        // alert(json.Category);
        opener.document.getElementById('Item_ID').value = json.Item_ID;
        opener.document.getElementById('Category').value = json.Category;
        // opener.document.getElementById('Category').value = json.Sub_Category;    
        opener.document.getElementById('Model').value = json.Model;    
        opener.document.getElementById('Name').value = json.Name;    
        opener.document.getElementById('Size').value = json.Size;    
        opener.document.getElementById('Description').value = json.Description;    
        opener.document.getElementById('Features_Specifications').value = json.Features_Specifications;
           // XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_customername8");
        // opener.document.getElementById('getImg').value = json.   // alert(XMLAddress1[0].childNodes[0].nodeValue);
        opener.document.getElementById('getImg').innerHTML = "<img width=\"300\" src=\"img\/" + json.img + "\" alt=\"\">";


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_customername9");
        opener.document.getElementById('amount').value = json.amount;     





         setTimeout(function () {
            self.close();
        }, 250);
    }
}
