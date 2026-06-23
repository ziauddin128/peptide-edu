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
                                        <th>Date-Time</th>
                                        <th>Product</th>
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


<!-- Add Product -->
<div class="modal fade" id="addProductModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="product-add-form">

                <input type="hidden" name="product-id" id="productId" />

                <div class="modal-body">
                    <div class="form-group">
                        <label>Main Title</label>
                        <input type="text" class="form-control" required name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" required name="description" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" required name="image">
                    </div>
                    <div class="form-group">
                        <label>Delivery Fee</label>
                        <input type="number" class="form-control" required name="delivery-fee" placeholder="Delivery Fee">
                    </div>
                    <div class="form-group">
                        <label>Reference Link</label>
                        <input type="text" class="form-control" required name="ref-link" placeholder="Reference Link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Product -->
<div class="modal fade" id="updateProductModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="product-update-form">
                <input type="hidden" name="product-id" id="productUpdateId" />
                <div class="modal-body">
                    <div class="form-group">
                        <label>Main Title</label>
                        <input type="text" class="form-control" required name="title" id="productTitle" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" required name="description" id="productDescription" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                        <br>
                        <input type="hidden" class="form-control" name="old-image" id="productOldImage">
                        <img src="" id="showProductImage" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-group">
                        <label>Delivery Fee</label>
                        <input type="number" class="form-control" required name="delivery-fee" id="productDeliveryFee" placeholder="Delivery Fee">
                    </div>
                    <div class="form-group">
                        <label>Reference Link</label>
                        <input type="text" class="form-control" required name="ref-link" id="productRefLink" placeholder="Reference Link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
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

    // Add Product Modal
    $('#addProductModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        let productId = button.data("id");
        $("#productId").val(productId);
    })

    // Add Product 
    $("#product-add-form").submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "api/add-promotion-product.php",
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
            success: function(data) {
                let responseData = JSON.parse(data);
                if (responseData.success) {

                    $('#addProductModal').modal('hide');

                    Swal.fire({
                        title: "Success",
                        text: responseData.message,
                        icon: "success"
                    }).then((result) => {
                        getData();
                    });
                } else {
                    Swal.fire({
                        title: "Failed",
                        text: data.message,
                        icon: "error"
                    });
                }

            },
            error: function(xhr) {
                Swal.fire({
                    title: "Error",
                    text: "Something went wrong!",
                    icon: "error"
                });
            }
        });
    });


    // Update Product Modal
    $('#updateProductModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        let product = button.data("product");

        $("#productUpdateId").val(product['id']);
        $("#productTitle").val(product['title']);
        $("#productDescription").val(product['description']);
        $("#showProductImage").attr("src", `storage/${product['image']}`);
        $("#productOldImage").val(product['image']);
        $("#productDeliveryFee").val(product['deliveryFee']);
        $("#productRefLink").val(product['refLink']);
    })

    // Update Product
    $("#product-update-form").submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "api/update-promotion-product.php",
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
            success: function(data) {
                let responseData = JSON.parse(data);
                if (responseData.success) {
                    $('#updateProductModal').modal('hide');
                    Swal.fire({
                        title: "Success",
                        text: responseData.message,
                        icon: "success"
                    }).then((result) => {
                        getData();
                    });
                } else {
                    Swal.fire({
                        title: "Failed",
                        text: data.message,
                        icon: "error"
                    });
                }

            },
            error: function(xhr) {
                Swal.fire({
                    title: "Error",
                    text: "Something went wrong!",
                    icon: "error"
                });
            }
        });
    });

    // Delete Product
    $(document).on("click", "#delete-product-btn", function() {
        let pId = $(this).data("id");

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
                    url: "api/delete-promotion-product.php",
                    type: "POST",
                    data: {
                        pId
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