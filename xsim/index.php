<?php
include('lib.php');
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
lib_unit_list();
lib_running_processes();
lib_command();
lib_result_window();
echo("</div>");

echo("</body>");
echo("</html>");

?>
