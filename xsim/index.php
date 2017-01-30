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
