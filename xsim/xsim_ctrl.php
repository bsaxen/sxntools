<html>
<head>
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "xsim_ajax.php?id=" + str, true);
        xmlhttp.send();
    }
}
window.setTimeout(showHint("benny"),1000);
</script>
</head>
<body>


<p>Suggestions: <span id="txtHint"></span></p>

<?php

function saveOrder($id,$order)
{
  $file = $id.'.order';
  $fh = fopen($file, 'w') or die("saveOrder can't open file: $file");
  fwrite($fh, $order);
  fclose($fh);
}
function listAllClients()
{
  system("ls *.poll > pollList.work"); 
  $file = 'pollList.work';
  $fh = fopen($file, 'r') or die("no poll list");
  while(!feof($fh)) 
  {
     $row = fgets($fh);
     $row = trim($row);
     $len = strlen($row);
     if($len >0)
     {
      $temp = explode(".",$row);
      $id = $temp[0];
      echo("<a href=\"xsim_ctrl.php?client=$id\">$id</a>");
      $fh2 = fopen($row, 'r') or die("   Error! unable to open file: ($row) =$len");
      $row = fgets($fh2);
      fclose($fh2);
      echo(" [$row]<br>");
     }
  }
  fclose($fh);
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $client = $_POST['client'];
    $order = $_POST['order'];
    saveOrder($client,$order);
}


echo("<h1>XSIM Remote Control</h1>");

if(isset($_GET['client']))
{
  $client = $_GET['client'];
  echo("
  <form action=\"xsim_ctrl.php\" method=\"post\">
        <input type=\"hidden\" name=\"client\" value=\"$client\" />
        <input type=\"text\" name=\"order\" />
        <button type=\"submit\">Execute $client</button>
  </form>
");
}

// Create links får all polling clients


listAllClients();
?>
</body>
</html>
