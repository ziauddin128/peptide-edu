<?php
require "top.php";

if (!isset($_GET['id']) || $_GET['id'] == "") {
    redirect('peptides');
}

$id = $_GET['id'];

// get peptides details
$sql = "SELECT * FROM `peptides` WHERE `id` = ?";
$res = $conn->prepare($sql);
$res->bind_Param('i', $id);
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
                    <h1>Manage Peptide</h1>
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
                                <h3 class="text-primary mb-3">General Information</h3>
                                <div class="row">

                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name(English)</label>
                                            <input type="text" class="form-control" required name="name1" value="<?= $row['name1'] ?>" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name(Spanish)</label>
                                            <input type="text" class="form-control" required name="name2" value="<?= $row['name2'] ?>" placeholder="Name">
                                        </div>
                                    </div>

                                    <!-- Category -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category(English)</label>
                                            <select required name="category1" class="form-control">
                                                <option value="">Select</option>
                                                <option value="All" <?= ($row['category1'] == "All" ? "selected" : "") ?>>All</option>
                                                <option value="Peptide Blends" <?= ($row['category1'] == "Peptide Blends" ? "selected" : "") ?>>Peptide Blends</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category(Spanish)</label>
                                            <select required name="category2" class="form-control">
                                                <option value="">Select</option>
                                                <option value="All" <?= ($row['category2'] == "All" ? "selected" : "") ?>>All</option>
                                                <option value="Peptide Blends" <?= ($row['category2'] == "Peptide Blends" ? "selected" : "") ?>>Peptide Blends</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Short Desc -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Short Description(English)</label>
                                            <input type="text" class="form-control" required name="short_desc1" value="<?= $row['short_desc1'] ?>" placeholder="Short Description">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Short Description(Spanish)</label>
                                            <input type="text" class="form-control" required name="short_desc2" value="<?= $row['short_desc2'] ?>" placeholder="Short Description">
                                        </div>
                                    </div>

                                    <!-- Long Desc -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Long Description(English)</label>
                                            <textarea class="form-control" rows="5" name="long_desc1" placeholder="Long Description"><?= $row['long_desc1'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Long Description(Spanish)</label>
                                            <textarea class="form-control" rows="5" name="long_desc2" placeholder="Long Description"><?= $row['long_desc2'] ?></textarea>
                                        </div>
                                    </div>

                                    <!-- Appearance -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Appearance(English)</label>
                                            <input type="text" class="form-control" name="appearance1" value="<?= $row['appearance1'] ?>" placeholder="Appearance">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Appearance(Spanish)</label>
                                            <input type="text" class="form-control" name="appearance2" value="<?= $row['appearance2'] ?>" placeholder="Appearance">
                                        </div>
                                    </div>

                                    <!-- Storage -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Storage(English)</label>
                                            <input type="text" class="form-control" name="storage1" value="<?= $row['storage1'] ?>" placeholder="Storage">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Storage(Spanish)</label>
                                            <input type="text" class="form-control" name="storage2" value="<?= $row['storage2'] ?>" placeholder="Storage">
                                        </div>
                                    </div>

                                    <!-- Thumbnail -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Thumbnail</label>
                                            <input type="file" name="thumbnail" class="form-control">

                                            <br>
                                            <input type="hidden" name="old-thumbnail" value="<?= $row['thumbnail'] ?>" class="form-control">
                                            <a href="storage/<?= $row['thumbnail'] ?>" target="_blank">View Thumbnail</a>
                                        </div>
                                    </div>

                                    <!-- CoA -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CoA</label>
                                            <input type="file" name="coa" class="form-control">

                                            <br>
                                            <input type="hidden" name="old-coa" value="<?= $row['coa'] ?>" class="form-control">
                                            <a href="storage/<?= $row['coa'] ?>" target="_blank">View CoA</a>
                                        </div>
                                    </div>

                                </div>

                                <h3 class="text-primary mb-3">Chemical Information</h3>
                                <div class="row">

                                    <!-- Sequence -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sequence</label>
                                            <input type="text" class="form-control" name="sequence" value="<?= $row['sequence'] ?>" placeholder="Sequence">
                                        </div>
                                    </div>
                                    <!-- Formula -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Formula</label>
                                            <input type="text" class="form-control" name="formula" value="<?= $row['formula'] ?>" placeholder="Formula">
                                        </div>
                                    </div>

                                    <!-- Mol. Weight -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mol. Weight</label>
                                            <input type="text" class="form-control" name="mole_wight" value="<?= $row['mole_wight'] ?>" placeholder="Mol. Weight">
                                        </div>
                                    </div>

                                    <!-- Pubchem Id -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pubchem Id</label>
                                            <input type="text" class="form-control" name="pubchem_id" value="<?= $row['pubchem_id'] ?>" placeholder="Pubchem Id">
                                        </div>
                                    </div>

                                    <!-- Cas Number -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cas Number</label>
                                            <input type="text" class="form-control" name="cas_number" value="<?= $row['cas_number'] ?>" placeholder="Cas Number">
                                        </div>
                                    </div>

                                    <!-- Chemical Structure -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Chemical Structure</label>
                                            <input type="file" name="chemical_structure" class="form-control">

                                            <?php
                                            if ($row['chemical_structure'] != "") {
                                            ?>
                                                <br>
                                                <input type="hidden" name="old-chemical_structure" value="<?= $row['chemical_structure'] ?>" class="form-control">
                                                <a href="storage/<?= $row['chemical_structure'] ?>" target="_blank">View Chemical Stracture</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>

                                <h3 class="text-primary mb-3">Lab testing result & CoA</h3>
                                <div class="row">

                                    <!-- Current Batch -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Current Batch</label>
                                            <input type="text" class="form-control" name="current_batch" value="<?= $row['current_batch'] ?>" placeholder="Current Batch">
                                        </div>
                                    </div>
                                    <!-- Test Date -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Test Date</label>
                                            <input type="date" class="form-control" name="test_date" value="<?= $row['test_date'] ?>" placeholder="Test Date">
                                        </div>
                                    </div>

                                    <!-- Avg. Purity -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Avg. Purity</label>
                                            <input type="number" class="form-control" name="purity" value="<?= $row['purity'] ?>" placeholder="Avg. Purity">
                                        </div>
                                    </div>

                                    <!-- Avg. Weight -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Avg. Weight</label>
                                            <input type="text" class="form-control" name="avg_weight" value="<?= $row['avg_weight'] ?>" placeholder="Avg. Weight">
                                        </div>
                                    </div>

                                    <!-- Endotoxins (Usp85) -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Endotoxins (Usp85)</label>
                                            <input type="file" class="form-control" name="endotoxins">

                                            <?php
                                            if ($row['endotoxins'] != "") {
                                            ?>
                                                <br>
                                                <input type="hidden" name="old-endotoxins" value="<?= $row['endotoxins'] ?>" class="form-control">
                                                <a href="storage/<?= $row['endotoxins'] ?>" target="_blank">View Endotoxins</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <!-- Sterility (Usp61) -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sterility (Usp61)</label>
                                            <input type="file" name="sterility" class="form-control">

                                            <?php
                                            if ($row['sterility'] != "") {
                                            ?>
                                                <br>
                                                <input type="hidden" name="old-sterility" value="<?= $row['sterility'] ?>" class="form-control">
                                                <a href="storage/<?= $row['sterility'] ?>" target="_blank">View Sterility</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>

                                <h3 class="text-primary mb-3">Previous Batch</h3>

                                <?php
                                if (!empty($row['prev_batch'])) {

                                    $prev_batches = json_decode($row['prev_batch'], true);
                                ?>

                                    <?php foreach ($prev_batches as $batch): ?>
                                        <div class="row align-items-center prev-batches-wrapper">

                                            <div class="col-md-4 col-lg-5">
                                                <div class="form-group">
                                                    <label>Batch</label>
                                                    <input type="text" class="form-control" name="prev_batch[]" value="<?= htmlspecialchars($batch['batch']) ?>" placeholder="Batch">
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-lg-5">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" class="form-control" name="prev_batch_date[]" value="<?= $batch['date'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-lg-2">
                                                <button type="button" class="btn btn-danger" onclick="removeBatchRow(this)">
                                                    <i class="mdi mdi-minus menu-icon"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php
                                } else {
                                ?>
                                    <div class="row align-items-center prev-batches-wrapper">

                                        <div class="col-md-4 col-lg-5">
                                            <div class="form-group">
                                                <label>Batch</label>
                                                <input type="text" class="form-control" name="prev_batch[]" placeholder="Batch">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-lg-5">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="date" class="form-control" name="prev_batch_date[]">
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="prev_batch_wrapper_new"></div>
                                <div class="mt-1">
                                    <button type="button" class="btn btn-secondary" onclick="addBatchRow()">
                                        <i class="mdi mdi-plus menu-icon"></i>
                                        Add More
                                    </button>
                                </div>


                                <h3 class="text-primary my-3">Media Files</h3>

                                <?php
                                if (!empty($row['media_files'])) {
                                    $media_files = json_decode($row['media_files'], true);

                                    foreach ($media_files as $media) {
                                ?>
                                        <div class="row media-file-wrapper mb-3">
                                            <div class="col-md-8 col-lg-10">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" value="<?= $media ?>" name="old_media[]">
                                                    <a href="storage/<?= $media ?>" target="_blank">View media</a>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-lg-2">
                                                <button type="button" class="btn btn-danger" onclick="removeMediaRow(this)">
                                                    <i class="mdi mdi-minus menu-icon"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                <?php
                                } else {
                                ?>
                                    <div class="row media-file-wrapper">
                                        <div class="col-md-8 col-lg-10">
                                            <div class="form-group">
                                                <label>Image/Video</label>
                                                <input type="file" class="form-control" name="new_media[]">
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="media_file_wrapper_new"></div>

                                <div class="mt-1">
                                    <button type="button" class="btn btn-secondary" onclick="addMediaRow()">
                                        <i class="mdi mdi-plus menu-icon"></i>
                                        Add Media File
                                    </button>
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
    // Previous batch er field dynamically baracci 
    function addBatchRow() {
        const wrapper = document.querySelector('.prev_batch_wrapper_new');

        const newRow = document.createElement('div');
        newRow.className = 'row align-items-center prev-batches-wrapper';
        newRow.innerHTML = `
        <div class="col-md-4 col-lg-5">
          <div class="form-group">
            <label>Batch</label>
            <input type="text" required class="form-control" name="prev_batch[]" placeholder="Batch">
          </div>
        </div>
        <div class="col-md-4 col-lg-5">
          <div class="form-group">
            <label>Date</label>
            <input type="date" required class="form-control" name="prev_batch_date[]">
          </div>
        </div>
        <div class="col-md-4 col-lg-2">
          
          <button type="button" class="btn btn-danger" onclick="removeBatchRow(this)">
            <i class="mdi mdi-minus menu-icon"></i> Remove
          </button>
        </div>
      `;
        wrapper.appendChild(newRow);
    }

    function removeBatchRow(btn) {
        const wrapper = btn.closest('.prev-batches-wrapper').parentElement;
        btn.closest('.prev-batches-wrapper').remove();
    }

    //  Media file dynamically add
    function addMediaRow() {
        const wrapper = document.querySelector('.media_file_wrapper_new');

        const newRow = document.createElement('div');
        newRow.className = 'row align-items-center media-file-wrapper';
        newRow.innerHTML = `
        <div class="col-md-8 col-lg-10">
          <div class="form-group">
            <label>Image/Video</label>
             <input type="file" required class="form-control" name="new_media[]">
          </div>
        </div>
        <div class="col-md-4 col-lg-2">
          <button type="button" class="btn btn-danger" onclick="removeMediaRow(this)">
            <i class="mdi mdi-minus menu-icon"></i> Remove
          </button>
        </div>
      `;
        wrapper.appendChild(newRow);
    }

    function removeMediaRow(btn) {
        const wrapper = btn.closest('.media-file-wrapper').parentElement;
        btn.closest('.media-file-wrapper').remove();
    }

    //  Add Form
    $("#data-form").submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        $.ajax({
            url: "api/update-peptide.php",
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