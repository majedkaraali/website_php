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
                <a href="dashboard.php" >
                <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="important.php" >
                    <i class="fa fa-star"></i>
                    
                    <span>Important</span>
                </a>
            </li>
            <li>
                <a href="planned.php" >
                    <i class="fa fa-calendar"></i>
                    
                    <span>Planned</span>
                </a>
            </li>
            <li>
                <a href="tasks.php" >
                <i class="fa fa-sticky-note" aria-hidden="true"></i>
                    
                    <span>Tasks</span>
                </a>
            </li>


            <li class="new-list">
                <a href="#" >
                <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>

                    
                    <span>Create new List</span>
                </a>
            </li>

            <li class="log-out">
                
                <a href="#" >
                    <i class="fa fa-sign-out" aria-hidden="true"></i>

                    <span>Log Out</span>
                </a>
            </li>


            

        </ul>
    </div>