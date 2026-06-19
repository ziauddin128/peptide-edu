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

<div class="content-wrapper">
    <!-- Breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Profile</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form id="data-form">

                            <input type="hidden" name="id" value="<?= $row['id'] ?>">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email"
                                        value="<?= $row['email'] ?>" class="form-control" required placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" required placeholder="Password">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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