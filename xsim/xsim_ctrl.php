  <html>
  <head>
  </head>
  <?php
  $now = date("Y-m-d H:i:s");
  echo("<body>");
  echo("<h1>XSIM Remote Control 2017-01-24</h1>");
  echo("$now <br>");
    
  if(isset($_GET['client']))
  {
    $client = $_GET['client'];
    $do = $_GET['do'];
    
    echo("
    <form action=\"xsim_ctrl.php\" method=\"post\">
          <input type=\"hidden\" name=\"client\" value=\"$client\" />
          <input type=\"text\" name=\"order\" />
          <button type=\"submit\">Execute $client</button>
    </form>
  ");
    if($do == 'show')
    {
    $file = $client.'.res';
    if(file_exists($file))
    {
      echo("<br>=====================<br>");
      $fh = fopen($file, 'r');
      while(!feof($fh)) 
      {
        $row = fgets($fh);
        $row = trim($row);
        $len = strlen($row);
        if($len >0)
        {
          echo $row;echo('<br>');
        }
      }
      fclose($fh);
      echo("=====================<br>");
    }
    }
    if ($do == 'delete')
    {
      $file = $client.'.res';
      unlink($file);
      $file = $client.'.poll';
      unlink($file);
    }
  }



  function saveOrder($id,$order)
  {
    $file = $id.'.order';
    $fh = fopen($file, 'w');
    fwrite($fh, $order);
    fclose($fh);
  }
  function listAllClients()
  {
    system("ls *.poll > pollList.work"); 
    $file = 'pollList.work';
    if(file_exists($file))
    {
      echo("<table>");
      $fh = fopen($file, 'r');
      while(!feof($fh)) 
      {
        $row = fgets($fh);
        $row = trim($row);
        $len = strlen($row);
        if($len >0)
        {
          $temp = explode(".",$row);
          $id = $temp[0];
          echo("<tr><td><a href=\"xsim_ctrl.php?client=$id&do=show\">$id</a></td>");
          if(file_exists($row))
          { 
            $fh2 = fopen($row, 'r');
            $row = fgets($fh2);
            
            $start   = strtotime( $row );
            $end     = strtotime( $now );
            $temp    = $end - $start;  
            $days    = floor($temp/86400);$rest = $temp%86400;
            $hours   = floor($rest/3600);$rest = $temp%3600;
            $minutes = floor($rest/60);$seconds = $temp%60;
            $nmin    = floor($temp/60); 
            
            fclose($fh2);
            if($temp < 10 )echo(" <td><p style=\"color:#000000\">[$row]</p></td>");
            if($temp > 10 )echo(" <td><p style=\"color:#CD0000\">[$row]</p></td>");
          }
          echo("<td><a href=\"xsim_ctrl.php?client=$id&do=delete\"> <i>delete</i> </a></td></tr>");
        }
      }
    fclose($fh);
    echo("</table>");
    }
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {
      $client = $_POST['client'];
      $order = $_POST['order'];
      saveOrder($client,$order);
  }


  // Create links får all polling clients

  listAllClients();
  ?>
  </body>
  </html>
