<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="menu">
    
        <ul>
            <li class="profile" >
                <div class="img-box">
                    <img src="../res/img/default.png" alt="user photo " width="50px" height= "50px"> 
                    <?php
                    session_start();


                    $user_name=$_SESSION['user_name'];
            
                    {
                        
                        ?>
                        <h2><?=$user_name ?></h2>
                        <?php
                    }?>
                   
                </div> 

            </li>

            <li>
              
                    <a  class="labl" href="dashboard.php" >
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>
                    </a>
              
            </li>


            <li>
               
                    <a class="labl" href="important.php" >
                        <i class="fa fa-star"></i>
                        <span>Important</span>
                    </a>
                
            </li>


            <li>
                    <a class="labl" href="planned.php" >
                        <i class="fa fa-calendar"></i>
                        <span>Planned</span>
                    </a>
                
            </li>


            <li>
              
                    <a class="labl" href="tasks.php" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                        <span>Tasks</span>
                    </a>
                
            </li>

      
            
            <?php
            require("../php/func.php");
         
            $user_id = $_SESSION['user_id'];
            $qr="SELECT * FROM user_lists WHERE user_id=$user_id";
            $qr_run=mysqli_query($conn,$qr);
            

            if (mysqli_num_rows($qr_run)>0){
                foreach ($qr_run as $val){
                    ?>
                    
                <li>
                    <div class="labl-user">
                    <a href="user_list.php?list_name=<?=$val['list_name']?>">
                    <i class="fa fa-th-list" aria-hidden="true"></i>
                    <span><?=$val['list_name']?></span>
                    </a> 
                    <i id='trash' class="fa fa-trash-o" aria-hidden="true" onclick="del_list('<?=$val['list_name']?>')"></i>
                    </div>
                    
                </li>


                    <?php
                }
            }
                    ?>

            <li class="input-list" id="input-list">
                <div class="labl-new">
                <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                    
                <input placeholder="List name" id="create_list" type="text">
                <button class="create" id="create" onclick="createlist()">Create</button>
                </div>
            </li>

            <li class="new-list" id="new-list">
                <button  id="new_list" onclick="toggleForm()"> 
                    <i class="fa fa-calendar-plus-o" aria-hidden="true"> 
                        
                    </i>
                    <span>New List</span>
                </button>
            </li>

            <li class="log-out">
                <button  onclick="logout()"> 
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                        
               
                    <span>Log out</span>
                </button>
            </li>
        </ul>
    </div>



<script>
    function toggleForm() {
      var form = document.getElementById("input-list");

      var button = document.getElementById("new_list");


      if (form.style.display === "none" || form.style.display === ""){
        form.style.display = "block";
        button.innerHTML = '<i class="fa fa-calendar-minus-o" aria-hidden="true"></i> Cancel';
      } else {
        form.style.display = "none";
        button.innerHTML = '<i class="fa fa-calendar-plus-o" aria-hidden="true"></i> New List';
  
      }
    }


    function logout() {
      window.location.href = '../logut.php';
    }


  </script>

<script>
  

  function createlist() {
        let input = document.getElementById("create_list");
        let listName = input.value;
        let xhr = new XMLHttpRequest();

        xhr.open("POST", "../php/func.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
        if (xhr.status === 200) {
        console.log(xhr.responseText);
        

   
        }
           
        else {
        console.error("Request failed: " + xhr.status);
        }};

    xhr.send("listName=" + encodeURIComponent(listName));
    setTimeout(function () {
    location.reload();}, 200);




    
  }
  



  function del_list(del_listName) {
    alert("Are you sure you want to delete"+del_listName);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/func.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
    if (xhr.status === 200) {
        console.log(xhr.responseText);
    }
    else {
        console.error("Request failed: " + xhr.status);
    }};

    xhr.send("del_listName=" + encodeURIComponent(del_listName));
    
    window.location.replace('..\\user\\dashboard.php');

    setTimeout(function () {
    location.reload();}, 200);


  
  }

</script>



