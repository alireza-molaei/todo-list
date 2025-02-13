<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Task manager UI</title>
  <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe </span><img src="" width="40" height="40"/></div>
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">Folders</div> 
        <ul class="folderList">
          <?php
foreach ($folders as $folder):?>
    <li> 
      <a href="?folder_id=<?= $folder->id?>"> <i class="fa fa-folder"></i><?= $folder->name?></a>
      <a class="remove-folder" href="?delete_folder=<?= $folder->id?>"> <i class="fa fa-trash-o"></i></a>
  </li>
   <?php endforeach; ?>
         
          <li class="active"> <i class="fa fa-folder"></i>CurrentFolder</li>
       
     
        </ul>
      </div>
      <div>
          <input type="text" placeholder="Add new folder" id="addFolderInput"/>
          <button id="addFolderBtn">+</button>
        </div>
    </div>
    <div class="view">
      <div class="viewHeader">
        <div class="title">Manage Tasks</div>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button">Completed</div>
          <div class="button inverz"><i class="fa fa-trash-o"></i></div>
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Today</div>
          <ul>
            <li class="checked"><i class="fa fa-check-square-o"></i><span>Update team page</span>
              <div class="info">
                <div class="button green">In progress</div><span>Complete by 25/04/2014</span>
              </div>
            </li>
            <li><i class="fa fa-square-o"></i><span>Design a new logo</span>
              <div class="info">
                <div class="button">Pending</div><span>Complete by 10/04/2014</span>
              </div>
            </li>
            <li><i class="fa fa-square-o"></i><span>Find a front end developer</span>
              <div class="info"></div>
            </li>
          </ul>
        </div>
        <div class="list">
          <div class="title">Tomorrow</div>
          <ul>
            <li><i class="fa fa-square-o"></i><span>Find front end developer</span>
              <div class="info"></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="
  assets/js/script.js"></script>
<script>
$j = jQuery.noConflict();
$j().ready(function(){
$j('#addFolderBtn').click(function(e){
  e.preventDefault();
  var input = $j('#addFolderInput').val();
 $j.ajax({
  url : "process/ajaxHandler.php",
  method : "POST",
  data : {
action : "add_folder",folderName:input},
  success : function(response){
if( response == true){ 
  alert("Folder added successfully");
  }else{
    alert(response);
  }
  } 
 })
})  
})

</script>
</body>
</html>

