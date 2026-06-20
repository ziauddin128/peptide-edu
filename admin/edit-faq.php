<?php
require "top.php";

if (!isset($_GET['id']) || $_GET['id'] == "") {
    redirect('faq');
}

$id = $_GET['id'];

// get peptides details
$sql = "SELECT * FROM `faq` WHERE `id` = ?";
$res = $conn->prepare($sql);
$res->bind_Param('i', $id);
$res->execute();
$result = $res->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    redirect('faq');
}


?>

<div class="content-wrapper">
    <!-- Breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add FAQ</h1>
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

                            <input type="hidden" value="<?= $id ?>" name="id">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Question</label>
                                    <input type="text" class="form-control" value="<?= $row['question'] ?>" required name="question" placeholder="Question">
                                </div>

                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea class="form-control" required name="answer" placeholder="Answer"><?= $row['answer'] ?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    //  Add Form
    $("#data-form").submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        $.ajax({
            url: "api/update-faq.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                Swal.fire({
                    title: "Uploading...",
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