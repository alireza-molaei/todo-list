<?php
function getCurrentUserId() {
    return 1;
}
function getFolders() {
    global $pdo;
   $currentUserId = getCurrentUserId();
    $stmt = $pdo->prepare("SELECT * FROM folders WHERE user_id= $currentUserId");
    $stmt->execute();   
    return $stmt->fetchAll(PDO::FETCH_OBJ);

    
}
function getTasks() {
    global $pdo;
    $folder = $_GET['folder_id'] ?? null;  
    $folderCondition = 1;
  if(isset($folder)and is_numeric($folder)){
    $folderCondition = "folder_id = $folder";
  }

    $currentUserId = getCurrentUserId();
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id= $currentUserId and $folderCondition");
    $stmt->execute();   
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    
}

function addFolder($folder_name) {
    global $pdo;
    $currentUserId = getCurrentUserId();
    $stmt = $pdo->prepare("INSERT INTO folders (name, user_id) VALUES (:folder_name, :user_id)");
    $stmt->execute( ['folder_name'=>$folder_name,'user_id'=>$currentUserId]);   
    return true;
    
}
function deleteFolder($folder_id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM folders WHERE id = ?");    
    $stmt->execute([$folder_id]);   
    return $stmt->rowCount();
    
}
function deleteTask($task_id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");    
    $stmt->execute([$task_id]);   
    return $stmt->rowCount();
    
}

