<html lang="en">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merhaba</title>
    <link rel="stylesheet" href="style2.css">
    

    

</header>

<body>

    <div class="test1">
        <?php
        $is_prime=TRUE;

        $sayi=14;

       for ($i=2 ; $i<17; $i++){
    

            if ($sayi % $i == 0){
                $is_prime=FALSE;
                echo $is_prime;
                break;
            }

            else{
                $is_prime=TRUE;
                
                    
            }

       
       }
       echo $is_prime;
        



            
        ?>
    </div>

</body>


</html>


