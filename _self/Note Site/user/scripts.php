<script>
   function star_task(task_id) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/func.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        } else {
            console.error("Request failed: " + xhr.status);
        }
    };
    let operation = "star_task";
    xhr.send("task_id=" + encodeURIComponent(task_id) + "&operation=" + encodeURIComponent(operation));
    setTimeout(function () {
    location.reload();}, 200);
}

function complete_task(task_id) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/func.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        } else {
            console.error("Request failed: " + xhr.status);
        }
    };
    let operation = "complete_task";
    xhr.send("task_id=" + encodeURIComponent(task_id) + "&operation=" + encodeURIComponent(operation));
    setTimeout(function () {
    location.reload();}, 200);
}
function re_complete_task(task_id) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/func.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        } else {
            console.error("Request failed: " + xhr.status);
        }
    };
    let operation = "re_complete_task";
    xhr.send("task_id=" + encodeURIComponent(task_id) + "&operation=" + encodeURIComponent(operation));
    setTimeout(function () {
    location.reload();}, 200);
}


    function submitForm(event) {
    event.preventDefault();

    fetch('../php/insert.php', {
        method: 'POST',
        body: new FormData(event.target),
    })
    .then(response => {
        console.log(response);
        if (response.ok) {
            
            
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
    setTimeout(function () {
    location.reload();}, 200);
}

    
    function toggle_new() {
        var form = document.getElementById("new");
        var button = document.getElementById("new_btn");

        if (form.style.display === "none" || form.style.display === ""){
        form.style.display = "flex";
        button.style.display="none"
       } 

      else {
        form.style.display = "none";
      }
    }
  
    function canceltogg() {
        var form = document.getElementById("new");
        var button = document.getElementById("new_btn");

        if (form.style.display === "none" || form.style.display === ""){
            form.style.display = "flex";
        } 
        else {
            form.style.display = "none";
            button.style.display="block"
        }
    }


    function toggleDateInput() {
        var tdate_lbl = document.getElementById('tdate_lbl');
        var tlist = document.getElementById('tlist');
        var tdate = document.getElementById('tdate');
        
       
        tdate_lbl.style.display = tlist.value === 'planned' ? 'block' : 'none';

        if (tlist.value === 'planned') {
            tdate.style.display = 'block';
            tdate.required = true;
        } else {
            tdate.style.display = 'none';
            tdate.required = false;
        }
    

    }


    window.onload = function () {
    window.scrollTo (0, 0);
  }



</script>