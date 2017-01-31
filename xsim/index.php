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

if($action) lib_do_action($action,$p1,$p2,$p3);

//=========================================
echo("<!doctype html>");
echo("<html>");
echo("<head>");
    echo("<title>XSIM Remote Control</title>");
    echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />");
    echo("<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js\"></script>");
    echo("<style>");
    echo("
    body {
        text-align: center;
    }
    #d_left{
        background: green;
        border: 1px solid #AAAAAA;
        padding: 10px;
        color: #fff0;
        width: 30%;
    }
    #d_middle{
        background: yellow;
        border: 1px solid #AAAAAA;
        padding: 10px;
        color: #ff0f;
        width: 30%;
    }
    #d_right{
        background: red;
        border: 1px solid #AAAAAA;
        padding: 10px;
        color: #f0ff;
        width: 30%;
    }
    #d_header{
        background: black;
        border: 1px solid #AAAAAA;
        padding: 10px;
        color: #0000;
        height: 10%
        width: 100%;
    }
    #d_footer{
        background: white;
        border: 1px solid #AAAAAA;
        padding: 10px;
        color: #aaaa;
        height: 10%
        width: 100%;
    }
    ");
echo("</style>");
echo("</head>");
echo("<body>");
echo("<div id=\"container\">");
echo("<a href=index.php?action=clear> Clear </a>");
echo("<div id=\"d_header\">");
    echo("This is header");
echo("</div>");
echo("<div id=\"d_left\">");
    //echo(lib_display("UNIT_LIST"));
    echo("<span id=\"list\"></span>");
echo("</div>");
echo("<div id=\"d_middle\">");
    echo("<span id=\"response\"></span>");
echo("</div>");
echo("<div id=\"d_right\">");
    echo("<span id=\"history\"></span>");
echo("</div>");
echo("<div id=\"d_footer\">");
    echo("This is footer");
echo("</div>");
/*echo("
<script type=\"text/javascript\">

window.setTimeout(function(){
location.reload();
},2000);
//document.getElementById("d_left").innerHTML = result[i];
//alert( 'value number ' + result[i] );
//         document.write(result[i]);
");*/

echo("
<script type=\"text/javascript\">
window.onload = function(){

    var tid = setInterval(getData, 2000);
    function getData() {
        console.log(\"Update page \");
        $.ajax({
            url:		'ajax.php',
            dataType:	'json',
            success:	setResponse,
            type:		'GET',
            data:		{
            action: 'RESPONSE'
            }
        });
        $.ajax({
            url:		'ajax.php',
            dataType:	'json',
            success:	setList,
            type:		'GET',
            data:		{
            action: 'UNIT_LIST'
            }
        });
    }

    function setResponse(result)
    {
       console.log(result);
       document.getElementById(\"response\").innerHTML = result;
    }

    function setList(result)
    {
      console.log(result);
      document.getElementById(\"list\").innerHTML = result;
    }
}
</script>
 ");



echo("</body>");
echo("</html>");
?>
