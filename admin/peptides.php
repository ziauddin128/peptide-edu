<?php
require "top.php";
?>

<div class="card">
  <div class="card-body">
    <h4>Peptides</h4>

    <a href="add-peptide" class="btn btn-primary py-2">Add New Peptide</a>

    <div class="row mt-4">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                <th>SL #</th>
                <th>Name</th>
                <th>Category</th>
                <th>Thumbnail</th>
                <th>CoA</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>BPC-157</td>
                <td>Regenerative</td>
                <td>
                  <img src="http://localhost/peptideedu/assets/images/images.jpg" style="width: 80px; height: 80px; border-radius: 0px; object-fit: contain"/>
                </td>
                <td>
                  <a href="#" target="_blank" class="btn btn-primary py-2">View CoA</a>
                </td>
                <td>
                  <div class="d-flex" style="gap: 5px">
                    <button class="btn btn-warning py-2">Edit</button>
                    <button class="btn btn-danger py-2">Delete</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require "footer.php";
?>