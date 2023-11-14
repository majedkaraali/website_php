<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    
</head>

<body>


  <?php
  if ($_SERVER["REQUEST_METHOD"]=="POST"){ 
  echo "merhaba";
    $ad=$_POST["ad"];
    $soyad=$_POST["sy"];
    $sifre=$_POST["sifre"];
    echo $ad;
}

    

    else{
        ?>
        
        <form action="index.php" method="post">
        <table border=1>
            <tr>
                <td><Label>Adi</Label></td>
                <td><input  name ="ad" type="text"></td>
               
            </tr>
    
            <tr>
                <td><Label>Soyadi</Label></td>
                <td><input  name ="sy" type="text"></td>
               
            </tr>
    
            <tr>
            <td><Label>Şifre</Label></td>
            <td><input name= "sifre" type="password"></td>
            </tr>
    
            <tr>
                <td></td>
                <td ><input type="reset"><input type="submit"></td>
            </tr>
    
      </table>
      </form>
      <?php
    }
    ?>

    

    
  
  
  




</body>



</html>