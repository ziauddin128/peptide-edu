<?php
require "top.php";

if (!isset($_GET['id']) || $_GET['id'] == "") {
    redirect('case-studies');
}

$id = $_GET['id'];

// get case study details
$sql = "SELECT * FROM `case-studies` WHERE `id` = ?";
$res = $conn->prepare($sql);
$res->bind_param('i', $id);
$res->execute();

$result = $res->get_result();
$row = $result->fetch_assoc() ?? [];


if (empty($row['content'])) {
    $contents = [];
} else {
    $contents = json_decode($row['content'], true);
    if (!$contents) {
        $contents = [];
    }
}



?>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>


<div class="content-wrapper">
    <!-- Breadcrumb -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Case Studies</h1>
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
                                            <label>Main Title</label>
                                            <input type="text" class="form-control" required name="title"
                                                value="<?= $row['title'] ?>" placeholder="Title">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Thumbnail</label>
                                            <input type="file" name="thumbnail" class="form-control">

                                            <br>
                                            <img src="storage/<?= $row['thumbnail'] ?>" class="img-fluid img-thumbnail w-50" alt="">
                                            <input type="hidden"
                                                value="<?= $row['thumbnail'] ?>" name="old-thumbnail">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Research Date Time</label>
                                            <input type="datetime-local" class="form-control" required name="research-date" value="<?= $row['research-date'] ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Summary</label>
                                            <textarea class="form-control" required name="summary"><?= $row['summary'] ?></textarea>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" required name="content-title">
                                            <br>
                                            <textarea class="form-control summernote" name="section_1"></textarea>
                                        </div>
                                    </div> -->

                                    <div class="dynamic-content-wrapper w-100">
                                        <?php
                                        $i = 1;
                                        foreach ($contents as $key => $item) {
                                        ?>

                                            <div class="col-md-12 dynamic-item mt-3">
                                                <div class="form-group">

                                                    <label>Title</label>

                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        name="content_title[]"
                                                        required
                                                        value="<?= htmlspecialchars($item['title']) ?>">

                                                    <br>

                                                    <textarea
                                                        class="form-control summernote"
                                                        name="content[]"><?= htmlspecialchars($item['content']) ?></textarea>

                                                    <br>

                                                    <button type="button" class="btn btn-danger remove-item">
                                                        Remove
                                                    </button>

                                                </div>
                                            </div>

                                        <?php
                                            $i++;
                                        }
                                        ?>
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
    });


    let count = $('.dynamic-item').length + 1;

    $('#contentAddBtn').click(function(e) {

        e.preventDefault();

        let html = `
        <div class="col-md-12 dynamic-item mt-3">

            <div class="form-group">

                <label>Title</label>

                <input
                    type="text"
                    class="form-control"
                    name="content_title[]"
                    required
                >

                <br>

                <textarea
                    class="form-control summernote-${count}"
                    name="content[]"
                ></textarea>

                <br>

                <button
                    type="button"
                    class="btn btn-danger remove-item"
                >
                    Remove
                </button>

            </div>

        </div>`;

        $('.dynamic-content-wrapper').append(html);

        $(`.summernote-${count}`).summernote({
            height: 80,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['para', ['ul', 'ol']],
                ['table', ['table']],
                ['insert', ['link']],
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

        // Summernote content sync
        $('.summernote').each(function() {
            $(this).val($(this).summernote('code'));
        });
        let formData = new FormData(this);
        $.ajax({
            url: "api/update-case-studies.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",

            success: function(res) {
                if (res.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Updated Successfully"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });;
                } else {
                    Swal.fire({
                        icon: "error",
                        title: res.message
                    });
                }
            }
        });
    });
</script>

<?php
require "footer.php";
?>