  <html>
  <head>
  </head>
  <?php
  echo("<body>");
  echo("<h1>XSIM Remote Control v1.0</h1>");

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
          echo("<a href=\"xsim_ctrl.php?client=$id&do=show\">$id</a>");
          if(file_exists($row))
          { 
            $fh2 = fopen($row, 'r');
            $row = fgets($fh2);
            fclose($fh2);
            echo(" [$row]<br>");
          }
          echo("<a href=\"xsim_ctrl.php?client=$id&do=delete\"> delete </a>");
        }
      }
    fclose($fh);
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
