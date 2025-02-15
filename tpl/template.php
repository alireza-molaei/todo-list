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
        <li class="<?=isset($_GET['folder_id'] ) ? '':'active' ?>">
          <a href="<?= site_url()?>">     <i class="fa fa-folder"></i>All</li></a>
   
       
          <?php
foreach ($folders as $folder):?>
    <li class="<?= $_GET['folder_id']== $folder->id ? 'active':''?>"> 
      <a href="?folder_id=<?= $folder->id?>"> <i class="fa fa-folder"></i><?= $folder->name?></a>
      <a class="remove-folder" href="?delete_folder=<?= $folder->id?>" > <i class="fa fa-trash-o" onclick="return confirm('Are you sure to delete this item')  "></i></a>
  </li>
   <?php endforeach; ?>
         

       
     
        </ul>
      </div>
      <div>
          <input type="text" placeholder="Add new folder" id="addFolderInput"/>
          <button id="addFolderBtn">+</button>
        </div>
    </div>
    <div class="view">
      <div class="viewHeader">
        <div class="title">
        <input type="text" placeholder="Add new task" id="taskNameInput"/>
      
        </div>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button">Completed</div>
      
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Today</div>
          <ul>
          <?php if(sizeof($tasks) > 0):?>
          <?php
foreach ($tasks as $task):?>
      <li class=" <?= $task->is_done ? 'checked': '';?>">
        <i data-taskId="<?= $task->id?>" class="isDone fa <?= $task->is_done ? 'fa-check-square-o': 'fa fa-square-o';?> "></i>
      <span><?=$task->title?></span>
              <div class="info">
              <span class="create_at">created At <?=$task->created_at?></span>
              <a class="remove-folder" href="?delete_task=<?= $task->id?>"> <i class="fa fa-trash-o" onclick="return confirm('Are you sure to delete this item') "></i></a>
              </div>
            </li>
   <?php endforeach; ?>
        <?php else: ?>
          <li >
            No tasks here...
        </li>
   <?php endif ?>
            
         
    
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
  $j('.isDone').click(function(e){
  let taskId = $j(this).data('taskid');
  $j.ajax({
    url : "process/ajaxHandler.php",
    method : "POST",
    data : {
      action : "toggleTask",taskId:taskId
    },
    success : function(response){
      if( response == true){ 
        location.reload();
      }else{
        alert(response);
      };
    }
  });

});
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
  };
  }
 });
});

});
$j(window).keypress(function(e){
  if(e.key == "Enter"){
    let input = $j('#addTaskInput').val();
    $j.ajax({
      url : "process/ajaxHandler.php",
      method : "POST",
      data : {
        action : "addTask",folderId:<?=$_GET['folder_id'] ?? 0?> ,taskTitle:$j('#taskNameInput').val()
      },
      success : function(response){
        if( response == true){ 
          location.reload();
        }else{
          alert(response);
        };
      }
    });
  }
});


</script>
</body>
</html>

