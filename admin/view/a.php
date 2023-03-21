<?php 
  function checkAction($pageName){
    if (isset($_GET['action'])){

    //   Kiểm tra action vì action bằng edit nên
      $action = $_GET['action'];
      switch ($action){
        case 'show':
          include './' .$pageName. '/list.php'; 
          break;
        case 'add':
          include './' .$pageName. '/add.php'; 
          break;
        case 'edit':
        //   vô đây nó sẽ ra là  include './product/edit.php' ==> hiện trang edit của product
          include './' .$pageName. '/edit.php'; 
          break;
        case 'delete':
          include './' .$pageName. '/delete.php'; 
          break;
        case 'show_detail':
          include './' .$pageName. '/detail.php'; 
          break;
      }
    }
  }

  if (isset($_GET['page'])){
    $page = $_GET['page'];

    // vd index?page=product&action=edit
    switch($page){
        case 'catergory':
            checkAction($page);
            break;
        case 'product':
            // vô trong đây
            checkAction($page);
            break;
        case 'user':
            checkAction($page);
            break;
    }
  }
?>