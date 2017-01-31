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
        margin-bottom: 100px;
    }
    #d_container{
        position: relative;
        background: purple;
        border: 1px solid #AAAAAA;
        padding: 10px;
        color: #fff0;
        width: 100%;
    }
    #d_center{
        position: relative;
        background: grey;
        border: 1px solid #AAAAAA;
        padding: 10px;
        color: #fff0;
        width: 100%;
    }
    #d_left{
        display: inline-block;
        float: left;
        background: green;
        border: 1px solid #AAAAAA;
        padding: 10px;
        color: #fff0;
        width: 30%;
    }
    #d_middle{
        display: inline-block;
        background: yellow;
        border: 1px solid #AAAAAA;
        padding: 10px;
        color: #ff0f;
        width: 30%;
    }
    #d_right{i
        display: inline-block;
        float: right;
        background: red;
        border: 1px solid #AAAAAA;
        padding: 10px;
        color: #f0ff;
        width: 30%;
    }
    #d_header{
        position:relative;
        background: cornsilk;
        border: 1px solid #AAAAAA;
        padding: 10px;
        color: #0000;
        height: 10%
        width: 100%;
    }
    #d_footer{
        position:fixed;
        bottom: 0;
        left: 0;
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
echo("<div id=\"d_container\">");
  echo("<a href=index.php?action=clear> Clear </a>");
  echo("<div id=\"d_header\">");
    echo("This is header");
  echo("</div>");
  echo("<div id=\"d_center\">");
  echo("center");
  echo("<div id=\"d_left\">");
   echo("left");
    echo("<span id=\"list\"></span>");
  echo("</div>");
  echo("<div id=\"d_middle\">");
    echo("middle");
    echo("<span id=\"response\"></span>");
  echo("</div>");
  echo("<div id=\"d_right\">");
    echo("right");
    echo("<span id=\"history\"></span>");
  echo("</div>");
  echo("</div>");
  echo("<div id=\"d_footer\">");
    echo("This is footer");
  echo("</div>");
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
