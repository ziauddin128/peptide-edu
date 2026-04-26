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
  // Get data
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
          url: "api/delete-peptide.php",
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