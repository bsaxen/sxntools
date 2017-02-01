<?php
//=========================================
//
// 2017-01-30
//=========================================
include('lib.php');
system("ls *.poll > UNIT_LIST.xsim");
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $unit = $_POST['unit'];
    $order = $_POST['order'];
    lib_saveOrder($unit,$order);
}

$action = $_GET['action'];

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
        background: black;
        font-family: monospace;
    }
    #d_container{
        position: relative;
        background: black;
        border: 0px solid #AAAAAA;
        padding: 0px;
        color: white;
        width: 100%;
        height: 100%;
    }
    #d_center{
        position: relative;
        background: black;
        border: 0px solid #AAAAAA;
        padding: 0px;
        color: white;
        width: 100%;
        height: 100%;
    }
    #d_left{
        display: inline-block;
        float: left;
        background: black;
        border: 0px solid #AAAAAA;
        padding: 0px;
        color: blue;
        width: 15%;
        text-align: left;
    }

    #d_right{i
        display: inline-block;
        float: left;
        background: black;
        border: 0px solid #AAAAAA;
        padding: 0px;
        color: red;
        width: 100%;
        text-align: left;
    }
    #d_header{
        position:inline-block;
        background: black;
        border: 0px solid #AAAAAA;
        padding: 0px;
        color: green;
        height: 10%
        width: 100%;
    }

    ");
echo("</style>");
echo("</head>");
echo("<body>");
echo("<div id=\"d_container\">");

echo("<div id=\"d_left\">");
 echo("RPi List");
 lib_display_list("UNIT_LIST.xsim");
  //echo("<span id=\"list\"></span>");
echo("</div>");
  echo("<div id=\"d_header\">");
    //echo("This is header");
    echo("<h1>XSIM Remote Control 2017-02-01</h1>");
    echo("$now <br>");
    echo("<a href=index.php?action=refresh> Refresh </a>");

    if(isset($_GET['unit']))
    {
      $unit  = $_GET['unit'];
      $order = $_GET['order'];
      //$do = $_GET['do'];

      echo("
      <form action=\"index.php\" method=\"post\">
            <input type=\"hidden\" name=\"unit\" value=\"$unit\" />
            <input type=\"text\" name=\"order\" value=\"$order\" />
            <button type=\"submit\">Execute $unit</button>
      </form>
      ");
    }
  echo("</div>");
  echo("<div id=\"d_center\">");
  //echo("center");

  echo("<div id=\"d_right\">");
    //echo("Response");
    echo("<span id=\"response\"></span>");
  echo("</div>");
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
            action: 'UNIT_RESPONSE',
            unit: '$unit'
            }
        });
    }

    function setResponse(result)
    {
       console.log(result);
       document.getElementById(\"response\").innerHTML = result;
    }

}
</script>
 ");



echo("</body>");
echo("</html>");
?>
