<?php
    include 'connect.php';  
    if(isset($_POST['submit'])){
        move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
        $CSV = fopen($_FILES["fileCSV"]["name"], "r");
        while (($row = fgetcsv($CSV, 1000, ",")) !== FALSE) {
            $mem_id=$row[0];
            $citizen_id=$row[1];
            $prename=$row[2];
            $fname=$row[3];
            $lname=$row[4];
            $level=$row[5];
            $major=$row[6];
            $grp=$row[7];
            $sql="INSERT INTO member VALUES('$mem_id','$citizen_id','$prename','$fname','$lname','$level','$major','$grp')";
            $result=$con->query($sql);
        }
        fclose($CSV);
        echo "<script>window.location.href='index.php?page=member'</script>";
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
    <h1><i class="nav-icon fas fa-address-card"></i> จัดการข้อมูลสมาชิก</h1>
  </div><!-- /.container-fluid -->
</section>
    <!-- Main content -->
<section class="content container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">เพิ่มสมาชิกทีละหลายคน</h3>
        </div>    
        <div class="card-body p-3 mb-3">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                <div class="custom-file">
                    <label for="mc_img" >Upload ไฟล์ CSV เท่านั้น </label><label style="color: red;">*</label>                     
                    <div class="row">
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="fileCSV" id="mc_img" onchange="readURL(this);" />
                        </div>
                        <div class="col-md-3">
                            <input name="submit" type="submit" class="btn btn-success" value="Submit">                    
                        </div>                    
                </div>                
            </form>
        </div>
    </div>
</section>


