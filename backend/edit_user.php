<?php
    include 'connect.php';
    $user_id=$_GET['user_id'];
    $row=mysqli_fetch_array($con->query("SELECT * FROM user WHERE user_id='$user_id'"));
    if(isset($_POST['edit'])){
        $email=$_POST['email'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $password=$_POST['password'];
        $position=$_POST['position'];
        $upd_data=$con->query("UPDATE user SET email='$email',fname='$fname',lname='$lname',password='$password',position='$position' WHERE user_id='$user_id'");
        if(!$upd_data){
            echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
        }else{
            echo "<script>window.location.href='index.php?page=user'</script>";
        }
    }
?>
<section class="content container">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">edit user</h3>
    </div>    
    <div class="card-body p-1">
      <div class="row">        
          <div class="col-md-1"></div>                              
          <div class="col-md-10 mb-3">  
            <form role="form" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">                          
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value=<?php echo $row['email']?>>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" value=<?php echo $row['password']?>>
                </div>
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="fname" value=<?php echo $row['fname']?>>
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="lname" value=<?php echo $row['lname']?>>
                </div>
                <div class="form-group">
                  <label>Position</label>
                  <select class="form-control" name="position">
                    <option value="<?php echo $row['position']?>"><?php echo $row['position']?></option>
                    <option value="admin">admin</option>
                    <option value="staff">staff</option>                    
                  </select>
                </div>
                <div class="custom-file">
                  <label for="" >รูปภาพ</label><label style="color: red;">*</label>                     
                  <input type="file" class="form-control" name="mc_img" id="mc_img" onchange="readURL(this);" /><br>
                  <!--<img id="blah" src="#" alt="your image" width="50%" />-->
                </div>                                  
                <button type="submit" class="btn btn-success btn-block" name="edit">Edit</button>        
              </div> <!-- md-10-->                            
            </form>            
          <div class="col-md-1"></div>        
      </div><!-- row-->    
    </div>  <!-- card-body-->               
  </div> <!-- card-->                             
</section> 