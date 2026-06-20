<?php
require "top.php";
?>

<div class="content-wrapper">
    <!-- breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Case Studies</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <a href="add-case-studies" class="btn btn-primary mb-3">+ Add Case Studies</a>


            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL #</th>
                                        <th>Title</th>
                                        <th>Thumbnail</th>
                                        <th>Date - Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="tableBody"></tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


<script>
    // Get data
    function getData() {
        $.ajax({
            url: "api/get-case-studies.php",
            type: "GET",
            success: function(res) {
                $(".tableBody").html(res);
            }
        })
    }

    getData();

    // Delete data
    $(document).on("click", "#delete-btn", function() {
        let id = $(this).data("id");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "api/delete-case-studies.php",
                    type: "POST",
                    data: {
                        id
                    },
                    success: function(res) {
                        let data = JSON.parse(res);
                        if (data.success) {
                            Swal.fire({
                                title: "Success",
                                text: data.message,
                                icon: "success"
                            });
                            getData();
                        } else {
                            Swal.fire({
                                title: "Failed",
                                text: data.message,
                                icon: "error"
                            });
                        }
                    }
                })
            };
        });


    })
</script>

<?php
require "footer.php";
?>