<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Imageography</title>
    <link rel="icon" href="images/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" href="images/favicon/favicon-96x96.png" sizes="48x48">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="main.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row wrap-up">
        <div class="col-md-3 commoncss">
          <h2 id="drop-area">
            Drag / Upload image!
            <div class="uploadimg">
              <form id="frmupload" enctype="multipart/form-data">
                <input type="file" multiple="multiple" name="image[]" id="image" style="display:none"/>
                <span id="btnupload" class="fa fa-cloud-upload"></span>
              </form>
            </div>
          </h2>
        </div>

        <?php

          include "dbconnect.php";

          displayimage();

          function displayimage(){
            global $con;
            $qry="select * from images";
            $result=mysql_query($qry,$con);
            $values = mysql_num_rows($result);
            echo '<ul class="col-md-8 col-md-offset-1 commoncss">';
            if ($values){
              if($result){
                while($row = mysql_fetch_array($result)){
                  echo '<li class="col-md-4">
                          <div class="imgCls">
                            <img class="img-responsive downloadable" id="'.$row[0].'" name="'.$row[1].'" src="data:image;base64,'.$row[2].'"/>
                            <div class="overlay">
                              <span><i class="fa fa-trash"></i></span>
                            </div>
                          </div>
                        </li>';
                }
              }
              echo '</ul>';
            }else{
              echo '<div class="msg">There is no image to display, Please upload image.</div>';
            }
            mysql_close($con);
          }
        ?>
      </div>
    </div>
  </body>
</html>