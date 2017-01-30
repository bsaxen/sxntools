<?php
//=========================================
//
// 2017-01-30
//=========================================
include('lib.php');

$action = $_GET['action'];
$p1 = $GET_['p1'];
$p2 = $GET_['p2'];
$p3 = $GET_['p3'];

if($action) do_action($action,$p1,$p2,$p3);

//=========================================
echo("<!doctype html>");
echo("<html>");
echo("<head>");
    echo("<title>XSIM Remote Control</title>");
    echo("<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />");
    echo("<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js\"></script>");
    echo("<style>");
    echo("body {
        text-align: center;
    }");
    echo("</style>");
echo("</head>");
echo("<body>");

window.onload = function(){

    $.ajax({
        url:		'index.php',
        dataType:	'json',
        success:	initXsim,
        type:		'GET',
        data:		{
        place: '<?php echo("$place")?>'
        }
    });
    
    function initXsim(result) {
        console.log(result['0']['1']);
        console.log(result['0']['2']);
        var rr = result['0']['1']; // Number of items
        //var cc = result['0']['2']; // Number of parameters in each item
        var count;
        var metertype;
        for(count=1; count <= rr; count++)
        {
            var div = document.createElement('div');
            document.body.appendChild(div);
            var msgtype = result[count][3];
            var mt = msgtype.toString();
            var temp1 = "g";
            var did = temp1.concat(count);
            div.id = did;
            div.style.float = 'left';
            //div.style.backgroundColor = 'red';
            div.style.width  = '200px';
            div.style.height = '160px';
            //div.style.position = 'relative';
            //div.style.display = 'inline-block';
            console.log(msgtype);
            var title = "";
            //title = title.concat(' ');
            //title = title.concat(result[count]['1'])


        }

    }


    var tid = setInterval(getData, 5000);
    function getData() {
        console.log("Getting  data");
        $.ajax({
            url:		'ajax.php',
            dataType:	'json',
            success:	setData,
            type:		'GET',
            data:		{
            place: '<?php echo("$place")?>'
            }
        });
    }

    function setData(result)
    {
        //console.log("data!");
        //console.log(result);
        console.log(result['0']['1']);
        console.log(result['0']['2']);
        var rr = result['0']['1']; // Number of items
        //var cc = result['0']['2']; // Number of parameters in each item
        var count;
        for(count=1; count <= rr; count++)
        {
            //console.log(result[count]['3']);
            //var intvalue = Math.round(result[count]['2']);
            var intvalue = result[count]['2'];
            g[count].refresh(intvalue);
        }
    }
}
</script>


echo("<div id=\"container\">");
echo("<a href=index.php?action=clear> Clear </a>");
echo("<div id=\"d_header\">");
    echo("This is header");
echo("</div>");
echo("<div id=\"d_left\">");
    lib_display("UNIT_LIST");
echo("</div>");
echo("<div id=\"d_middle\">");
    lib_display("COMMAND");
echo("</div>");
echo("<div id=\"d_right\">");
    lib_display("HISTORY");
echo("</div>");
echo("<div id=\"d_footer\">");
    echo("This is footer");
echo("</div>");

echo("</body>");
echo("</html>");
?>
