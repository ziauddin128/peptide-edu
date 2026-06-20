<?php
require "top.php";


if (!isset($_GET['id']) || $_GET['id'] == "") {
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
}
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
                    <h1>Manage Safety Data Sheet (SDS)</h1>
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

                            <input type="hidden" name="id" value="<?= $id ?>">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 1: Identification</label>
                                            <textarea class="form-control summernote" name="section_1"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 2: Hazard Identification</label>
                                            <textarea class="form-control summernote" name="section_2"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 3: Composition/ Information on Ingredients</label>
                                            <textarea class="form-control summernote" name="section_3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 4: First-Aid Measures</label>
                                            <textarea class="form-control summernote" name="section_4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 5: Fire-Fighting Measures</label>
                                            <textarea class="form-control summernote" name="section_5"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 6: Accidental Release Measures</label>
                                            <textarea class="form-control summernote" name="section_6"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 7: Handling and Storage</label>
                                            <textarea class="form-control summernote" name="section_7"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 8: Exposure Controls/Personal Protection</label>
                                            <textarea class="form-control summernote" name="section_8"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 9: Physical and Chemical Properties</label>
                                            <textarea class="form-control summernote" name="section_9"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 10: Stability and Reactivity</label>
                                            <textarea class="form-control summernote" name="section_10"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 11: Toxicological Information</label>
                                            <textarea class="form-control summernote" name="section_11"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 12-15: Ecological, Disposal Transport, Regulatory</label>
                                            <textarea class="form-control summernote" name="section_12"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section 16: Other Information</label>
                                            <textarea class="form-control summernote" name="section_16"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>PDF</label>
                                            <input type="file" name="pdf" class="form-control">

                                            <?php
                                            if (isset($row['pdf']) && $row['pdf'] != "") {
                                            ?>
                                                <br>
                                                <input type="hidden" name="old-pdf" value="<?= $row['pdf'] ?>" class="form-control">

                                                <a href="storage/<?= $row['pdf'] ?>" target="_blank">View PDF</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>

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
    /* $('.summernote').summernote({
     height: 80,

     toolbar: [
       ['style', ['bold', 'italic', 'underline']],
       ['para', ['ul', 'ol']],
       ['view', ['codeview']]
     ]
   }); */

    $(function() {
        $('.summernote').summernote({
            height: 80,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['para', ['ul', 'ol']],
                ['view', ['codeview']]
            ]
        });

        // PHP → JS safe object
        let sds = <?= json_encode($sds, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?> || {};

        // safe helper
        function get(obj, key) {
            return (obj && obj[key]) ? obj[key] : '';
        }

        // set data
        $('.summernote[name="section_1"]').summernote('code', get(sds, 'section_1'));
        $('.summernote[name="section_2"]').summernote('code', get(sds, 'section_2'));
        $('.summernote[name="section_3"]').summernote('code', get(sds, 'section_3'));
        $('.summernote[name="section_4"]').summernote('code', get(sds, 'section_4'));
        $('.summernote[name="section_5"]').summernote('code', get(sds, 'section_5'));
        $('.summernote[name="section_6"]').summernote('code', get(sds, 'section_6'));
        $('.summernote[name="section_7"]').summernote('code', get(sds, 'section_7'));
        $('.summernote[name="section_8"]').summernote('code', get(sds, 'section_8'));
        $('.summernote[name="section_9"]').summernote('code', get(sds, 'section_9'));
        $('.summernote[name="section_10"]').summernote('code', get(sds, 'section_10'));
        $('.summernote[name="section_11"]').summernote('code', get(sds, 'section_11'));
        $('.summernote[name="section_12"]').summernote('code', get(sds, 'section_12'));
        $('.summernote[name="section_16"]').summernote('code', get(sds, 'section_16'));

    });
</script>

<script>
    //  Add Form
    $("#data-form").submit(function(e) {
        e.preventDefault();

        $('.summernote[name="section_1"]').summernote('code');

        $('.summernote').each(function() {
            $(this).val($(this).summernote('code'));
        });


        let formData = new FormData(this);
        $.ajax({
            url: "api/manage-sds.php",
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
            success: function(result) {
                let data = result;
                if (data.success) {
                    Swal.fire({
                        title: "Success",
                        text: data.message,
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });;
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