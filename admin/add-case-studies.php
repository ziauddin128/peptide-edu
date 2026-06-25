<?php
require "top.php";

/* if (!isset($_GET['id']) || $_GET['id'] == "") {
    redirect('peptides');
}

$id = $_GET['id'];

// get sds details
$sql = "SELECT * FROM `sds` WHERE `peptide_id` = ?";
$res = $conn->prepare($sql);
$res->bind_param('i', $id);
$res->execute();

$result = $res->get_result();
$row = $result->fetch_assoc() ?? [];

// safe decode
$sds = [];

if (!empty($row['sds_data'])) {
    $decoded = json_decode($row['sds_data'], true);

    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        $sds = $decoded;
    }
} */

?>

<script src="assets/js/vendor.bundle.base.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>


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
                                            <label>Main Title</label>
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

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" required name="content-title">
                                            <br>
                                            <textarea class="form-control summernote" name="section_1"></textarea>
                                        </div>
                                    </div>

                                    <div class="dynamic-content-wrapper w-100">
                                    </div>

                                    <button class="btn btn-success" id="contentAddBtn">+ Add More</button>
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
    $(function() {
        $('.summernote').summernote({
            height: 80,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['para', ['ul', 'ol']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ],
            callbacks: {
                onPaste: function(e) {
                    e.preventDefault();

                    var text = (e.originalEvent || e).clipboardData.getData('text/plain');

                    document.execCommand('insertText', false, text);
                }
            }
        });

        // PHP → JS safe object
        /*
        let sds = <?= json_encode($sds, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?> || {};
        function get(obj, key) {
            return (obj && obj[key]) ? obj[key] : '';
        }

        $('.summernote[name="section_1"]').summernote('code', get(sds, 'section_1'));
        */
    });


    let count = 2; // section_1 already exists

    $('#contentAddBtn').on('click', function(e) {
        e.preventDefault();

        let html = `
            <div class="col-md-12 dynamic-item mt-3">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" required name="content-title[]">
                    <br>

                    <textarea class="form-control summernote-${count}" name="section_${count}"></textarea>
                    <br>

                    <button type="button" class="btn btn-danger remove-item">
                        Remove
                    </button>
                </div>
            </div>
        `;

        $('.dynamic-content-wrapper').append(html);

        // Initialize the newly added Summernote
        $(`.summernote-${count}`).summernote({
            height: 80,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['para', ['ul', 'ol']],
                ['table', ['table']],
                ['view', ['codeview']]
            ]
        });

        count++;
    });

    // Remove dynamic block
    $(document).on('click', '.remove-item', function() {
        $(this).closest('.dynamic-item').remove();
    });
</script>


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
            dataType: "json",

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

                if (data.success) {
                    Swal.fire({
                        title: "Success",
                        text: data.message,
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
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
</script>

<?php
require "footer.php";
?>