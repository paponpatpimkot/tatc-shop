<?php
  include 'connect.php';
  if(isset($_POST['add'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $position=$_POST['position'];
    if($email=="" || $password=="" || $fname=="" || $lname=="" || $position==""){
      echo "<script>alert('กรุณากรอกข้อมูลให้ครบ');window.history.back();</script>";
    }else{
      $sql="INSERT INTO user VALUES('','$email','$password','$fname','$lname','$position')";
      $result=$con->query($sql);
      if(!$result){
        echo "<script>alert('ผิดพลาด ไม่สามารถบันทึกข้อมูลได้')</script>";
      }else{
        echo "<script>window.location.href='index.php?page=user'</script>";
      }
    }
  }
?>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>    
<section class="content-header">
  <div class="container-fluid">
    <h1>เพิ่มข้อมูล user</h1>
  </div><!-- /.container-fluid -->
</section>
    <!-- Main content -->
<section class="content container">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h3 class="card-title">เพิ่มสมาชิก/h3>
    </div>    
    <div class="card-body p-1">
      <div class="row">        
          <div class="col-md-1"></div>                              
          <div class="col-md-10 mb-3">  
            <form role="form" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">                          
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Enter password" name="password">
                </div>
                <div class="form-group">
                  <label>FirstName</label>
                  <input type="text" class="form-control" placeholder="Enter firstname" name="fname">
                </div>
                <div class="form-group">
                  <label>LastName</label>
                  <input type="text" class="form-control" placeholder="Enter lastname" name="lname">
                </div>
                <div class="form-group">
                  <label>Position</label>
                  <select class="form-control" name="position">
                    <option value="">กรุณาเลือก</option>
                    <option value="admin">admin</option>
                    <option value="staff">staff</option>                    
                  </select>
                </div>
                <div class="custom-file">
                  <label for="" >รูปภาพ</label><label style="color: red;">*</label>                     
                  <input type="file" class="form-control" name="mc_img" id="mc_img" onchange="readURL(this);" /><br>
                  <!--<img id="blah" src="#" alt="your image" width="50%" />-->
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
  