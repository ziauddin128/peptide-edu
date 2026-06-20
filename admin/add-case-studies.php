<?php
require "top.php";
?>

<div class="content-wrapper">
    <!-- Breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Case Studies</h1>
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

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" required name="title" placeholder="Title">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Thumbnail</label>
                                            <input type="file" name="thumbnail" required class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Research Date Time</label>
                                            <input type="datetime-local" class="form-control" required name="research-date">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Summary</label>
                                            <textarea class="form-control" required name="summary"></textarea>
                                        </div>
                                    </div>

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
    $("#data-form").submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        $.ajax({
            url: "api/add-case-studies.php",
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
                    $("#data-form").trigger("reset");
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