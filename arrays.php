<html lang="en">
<head>
    <meta charset="UTF-8">
   
</head>
<body>



    <?php

    $names=array('ali','senol','Tarsus','Uni');

    echo $names[0];
    echo"<br>";

    for ($i=0; $i <count($names);$i++)
    {
        if ($names[$i]=="senol"){
            echo $names[$i]." index=".$i."<br>";
        }
       
    }


    echo "-------------------------Example 2 --------------------------<br>";

    $namesAge=array('ali'=>'20','veli'=>'3','ahmet'=>'25');


    foreach ($namesAge as $i=>$value){
        echo"Key= ".$i." Value= ".$value."<br>";
    }

    ?>

    
</body>
</html>