<!DOCTYPE html>
<html>

<head>
<style>
     body {font-family: Arial, Helvetica, sans-serif;}
	 * {box-sizing: border-box;}
	  .settings-button {
	   background-color: green;
	   color: white;
	   padding: 4px 4px;
	   border: none;
	   cursor: pointer;
	   opacity: 0.8;
	   position: absolute;
	   width: 70px;
	   border:2px ;border-radius: 25px;
	 } 
	 .settings-popup {
	   display: none;
	   position: absolute;
	   border: 1px solid #f1f1f1;
	   z-index: 9;
	 } 
	 .settings-container {
	   max-width: 400px;
	   padding: 10px;
	   background-color: white;
	   max-height: 200px;
	 }
	 .settings-container .btn {
	   background-color: #04AA6D;
	   color: white;
	   padding: 5px 4px;
	   border: none;
	   cursor: pointer;
	   width: 90%;
	   margin-bottom:5px;
	   opacity: 0.8;
	   border:2px ;
	   border-radius: 25px;
	 }
	 .settings-container .cancel {
	   background-color: burlywood;
	   margin-top: 10px;
	 }
	  .settings-container .btn:hover, .settings-button:hover {
	   border:2px ;border-radius: 25px;
	   opacity: 1;
	 }
	 </style>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

<div class="settings-popup " id="settings_button">
   <form   class="settings-container bg-dark">
<a   href="Logout/logout.php" style="color:yellow"  >Logout  <i class="fa fa-sign-out" style="font-size:20px;color:red"></i></a>
<br>
 
 
<button type="button" class="btn cancel" onclick="closeForm()">❌</button>
      </form>
      
   </div>
   
<button class="settings-button" onclick="openForm()"><span class="text-light">Settings</span></button>






<script>
   function openForm() {
  document.getElementById("settings_button").style.display = "block";
}

function closeForm() {
  document.getElementById("settings_button").style.display = "none";
}
</script>






</body>

</html>
