<!-- http://fordev22.com/ -->
<?php include ("head.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include ("navbar.php"); ?>
  <?php include ("menu_l.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php
          switch (@$_GET['page']){
            case "user":
              include "user.php";
              break;            
            case "add_user":
               include "add_user.php";
               break;
            case "edit_user":
               include "edit_user.php";
               break;
            case "del_user":
               include "del_user.php";
               break;
            case "member":
              include "member.php";
              break;
            case "add_member":
                include "add_member.php";
                break;
            case "add_manymember":
                include "add_manymember.php";
                break;
            case "edit_member":
                include "edit_member.php";
                break;
            case "del_member":
                include "del_member.php";
                break;
            default:
              include "user.php";
          }
      ?>
  </div>
</div>