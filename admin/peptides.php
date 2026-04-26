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
            <tbody class="tableBody"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  function getData() {
    $.ajax({
      url: "api/get-peptide.php",
      type: "GET",
      success: function(res) {
        $(".tableBody").html(res);
      }
    })
  }

  getData();
</script>

<?php
require "footer.php";
?>