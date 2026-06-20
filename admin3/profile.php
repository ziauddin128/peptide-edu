 <?php
  require "top.php";

  $user_id = $_SESSION['USER_ID'];

  // get peptides details
  $sql = "SELECT * FROM `admin` WHERE `id` = ?";
  $res = $conn->prepare($sql);
  $res->bind_Param('i', $user_id);
  $res->execute();
  $result = $res->get_result();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  } else {
    redirect('peptides');
  }

  ?>
 <div class="row p-4 p-md-0">
   <h1 class="card-title ml10">Manage Profile</h1>
   <div class="col-12 grid-margin stretch-card">
     <div class="card">
       <div class="card-body">
         <form id="data-form" class="forms-sample">

           <input type="hidden" name="id" value="<?= $row['id'] ?>">

           <div class="row">

             <div class="col-md-6">
               <div class="form-group">
                 <label>Email</label>
                 <input type="text" class="form-control" name="email" value="<?= $row['email'] ?>" placeholder="Email">
               </div>
             </div>

             <div class="col-md-6">
               <div class="form-group">
                 <label>Password</label>
                 <input type="text" class="form-control"  name="password" placeholder="Password">
               </div>
             </div>

           </div>

           <div class="mt-5">
             <button type="submit" class="btn btn-primary w-50">Update</button>
           </div>
         </form>
       </div>
     </div>
   </div>

 </div>


 <script>
   //  Update Form
   $("#data-form").submit(function(e) {
     e.preventDefault();

     let formData = new FormData(this);
     $.ajax({
       url: "api/update-profile.php",
       type: "POST",
       data: formData,
       processData: false,
       contentType: false,
       beforeSend: function() {
         Swal.fire({
           title: "updating...",
           text: "Please wait",
           allowOutsideClick: false,
           didOpen: () => {
             Swal.showLoading();
           }
         });
       },
       success: function(result) {
         let data = JSON.parse(result);
         if (data.success) {
           Swal.fire({
             title: "Success",
             text: data.message,
             icon: "success"
           });
         } else {
           Swal.fire({
             title: "Failed",
             text: data.message,
             icon: "error"
           });
         }
       }
     })
   })
 </script>

 <?php
  require "footer.php";
  ?>