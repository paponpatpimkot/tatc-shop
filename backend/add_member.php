<?php
  include 'connect.php';
  if(isset($_POST['add'])){
    $mem_id=$_POST['mem_id'];
    $citizen_id=$_POST['citizen_id'];
    $mem_name=$_POST['mem_name'];
    $level=$_POST['level'];
    $major_id=$_POST['major_id'];
    $grp=$_POST['grp'];
    if($mem_id=="" || $citizen_id=="" || $mem_name=="" || $level=="" || $major_id=="" || $grp==""){        
      echo "<script>alert('กรุณากรอกข้อมูลให้ครบ');window.history.back();</script>";
    }else{
      $sql="INSERT INTO member VALUES('$mem_id','$citizen_id','$mem_name','$level','$major_id','$grp')";      
      $result=$con->query($sql);
      if(!$result){
        echo "<script>alert('ผิดพลาด ไม่สามารถบันทึกข้อมูลได้')</script>";
      }else{
        echo "<script>window.location.href='index.php?page=member'</script>";
      }
    }
  }
?>
<section class="content-header">
  <div class="container-fluid">
    
  </div><!-- /.container-fluid -->
</section>
    <!-- Main content -->
<section class="content container">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h3 class="card-title">เพิ่มข้อมูลสมาชิก</h3>
    </div>    
    <div class="card-body p-1 mt-3">
      <div class="row">        
          <div class="col-md-1"></div>                              
          <div class="col-md-10 mb-3">  
            <form role="form" action="<?php $_SERVER['PHP_SELF']?>" method="post">                          
                <div class="form-group">
                  <label>รหัสประจำตัวนักศึกษา</label>
                  <input type="text" class="form-control" name="mem_id" placeholder="ระบุรหัสประจำตัวนักศึกษา 11 หลัก">
                </div>
                <div class="form-group">
                  <label>รหัสประจำตัวประชาชน</label>
                  <input type="text" class="form-control" name="citizen_id" placeholder="ระบุรหัสประจำตัวประชาชน 13 หลัก ไม่ต้องมีขีด(-)">
                </div>
                <div class="form-group">
                  <label>ชื่อ-นามสกุล</label>
                  <input type="text" class="form-control" name="mem_name" placeholder="ระบุกลุ่ม">
                </div>                
                <div class="form-group">
                  <label>ระดับชั้น</label>
                  <select class="form-control" name="level">
                    <option value="0">กรุณาเลือกระดับชั้น</option>
                    <option value="1">ปวช.1</option>
                    <option value="2">ปวช.2</option>
                    <option value="3">ปวช.3</option>                    
                    <option value="4">ปวส.1</option>                    
                    <option value="5">ปวส.2</option>                    
                  </select>
                </div>
                <?php 
                    $major=$con->query("SELECT * FROM major");
                ?>
                <div class="form-group">
                  <label>สาขาวิชา</label>
                  <select class="form-control" name="major_id">
                    <?php 
                        while($major_array=mysqli_fetch_array($major)){
                            echo "<option value=".$major_array['major_id'].">".$major_array['major_name']."</option>";
                        }
                    ?>                    
                  </select>
                </div>
                <div class="form-group">
                  <label>กลุ่มที่</label>
                  <input type="number" class="form-control" name="grp">
                </div>                                  
                <button type="submit" class="btn btn-success btn-block" name="add">บันทึกข้อมูล</button>        
              </div> <!-- md-10-->                            
            </form>            
          <div class="col-md-1"></div>        
      </div><!-- row-->    
    </div>  <!-- card-body-->               
  </div> <!-- card-->                             
</section>        
<?php include('footer.php'); ?>

<script>
  $(function () {
    $(".datatable").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // http://fordev22.com/
    // });
  });
</script>
  