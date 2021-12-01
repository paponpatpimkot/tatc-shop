<?php
  include 'connect.php';
  $result=$con->query("SELECT * FROM user");
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa-address-card"></i> จัดการข้อมูลสมาชิก</h1>
  </div><!-- /.container-fluid -->
</section>
  <!-- Main content -->
  <section class="content container">            
    <div class="card">
      <div class="card-header card-navy card-outline">           
        <div align="right"> 
          <a href="index.php?page=add_member" class="btn btn-success btn-xs">                
              <i class="fa fa-user-plus"></i> เพิ่มข้อมูลสมาชิก          
          </a>          
        </div>
      </div>
      <br>
      <div class="card-body p-1">
        <div class="row">
          <div class="col-md-1"></div>                      
          <div class="col-md-10">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row" class="info">
                  <th class="text-center">ลำดับ</th>
                  <th class="text-center">ชื่อ</th>    
                  <th class="text-center">นามสกุล</th>                                    
                  <th class="text-center">อีเมล์</th>                  
                  <th class="text-center">ตำแหน่ง</th>
                  <th class="text-center">จัดการ</th>                  
                </tr>
              </thead>
              <tbody> 
                <?php 
                  $i=1;
                  while($row=mysqli_fetch_array($result)){ ?>
                <tr>
                  <td class="text-center"><?php echo $i;$i++;?></td>                  
                  <td><?php echo $row['fname']?></td>
                  <td><?php echo $row['lname']?></td>
                  <td><?php echo $row['email']?></td>
                  <td class="text-center"><?php echo $row['position']?></td>
                  <td class="text-center">                                                     
                    <a class="btn btn-warning btn-xs" href="index.php?page=edit_user&user_id=<?php echo $row['user_id']?>">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a class="btn btn-danger btn-xs" onclick="return confirm('ต้องการลบข้อมูล?')" href="index.php?page=del_user&user_id=<?php echo $row['user_id']?>">
                      <i class="fas fa-trash-alt"></i> 
                    </a>
                  </td>
                </tr> 
                <?php } ?>                                                                                  
              </tbody>
            </table>
            
          </div>
          <div class="col-md-1" ></div>
        </div>
      </div>      
    </div>            
  </div>
  <!-- /.col -->
</div>
</section>
<!-- /.content -->
<?php include('footer.php');?>
<script>
  $(function () {
    $(".datatable").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,      
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>