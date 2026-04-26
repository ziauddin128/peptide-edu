 <?php
  require "top.php";
  ?>
 <div class="row p-4 p-md-0">
   <h1 class="card-title ml10">Add new peptide</h1>
   <div class="col-12 grid-margin stretch-card">
     <div class="card">
       <div class="card-body">
         <form id="data-form" class="forms-sample">

           <h3 class="text-primary mb-3">General Information</h3>
           <div class="row">

             <!-- Name -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Name(English)</label>
                 <input type="text" class="form-control" required name="name1" placeholder="Name">
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                 <label>Name(Spanish)</label>
                 <input type="text" class="form-control" required name="name2" placeholder="Name">
               </div>
             </div>

             <!-- Category -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Category(English)</label>
                 <input type="text" class="form-control" required name="category1" placeholder="Category">
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                 <label>Category(Spanish)</label>
                 <input type="text" class="form-control" required name="category2" placeholder="Category">
               </div>
             </div>

             <!-- Short Desc -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Short Description(English)</label>
                 <input type="text" class="form-control" required name="short_desc1" placeholder="Short Description">
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                 <label>Short Description(Spanish)</label>
                 <input type="text" class="form-control" required name="short_desc2" placeholder="Short Description">
               </div>
             </div>

             <!-- Long Desc -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Long Description(English)</label>
                 <textarea class="form-control" rows="5" name="long_desc1" placeholder="Long Description"></textarea>
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                 <label>Long Description(Spanish)</label>
                 <textarea class="form-control" rows="5" name="long_desc2" placeholder="Long Description"></textarea>
               </div>
             </div>

             <!-- Appearance -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Appearance(English)</label>
                 <input type="text" class="form-control" name="appearance1" placeholder="Appearance">
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                 <label>Appearance(Spanish)</label>
                 <input type="text" class="form-control" name="appearance2" placeholder="Appearance">
               </div>
             </div>

             <!-- Storage -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Storage(English)</label>
                 <input type="text" class="form-control" name="storage1" placeholder="Storage">
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                 <label>Storage(Spanish)</label>
                 <input type="text" class="form-control" name="storage2" placeholder="Storage">
               </div>
             </div>

             <!-- Thumbnail -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Thumbnail</label>
                 <input type="file" name="thumbnail" required class="form-control">
               </div>
             </div>

             <!-- CoA -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>CoA</label>
                 <input type="file" name="coa" required class="form-control">
               </div>
             </div>

           </div>

           <h3 class="text-primary mb-3">Chemical Information</h3>
           <div class="row">

             <!-- Sequence -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Sequence</label>
                 <input type="text" class="form-control" name="sequence" placeholder="Sequence">
               </div>
             </div>
             <!-- Formula -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Formula</label>
                 <input type="text" class="form-control" name="formula" placeholder="Formula">
               </div>
             </div>

             <!-- Mol. Weight -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Mol. Weight</label>
                 <input type="text" class="form-control" name="mole_wight" placeholder="Mol. Weight">
               </div>
             </div>

             <!-- Pubchem Id -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Pubchem Id</label>
                 <input type="text" class="form-control" name="pubchem_id" placeholder="Pubchem Id">
               </div>
             </div>

             <!-- Cas Number -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Cas Number</label>
                 <input type="text" class="form-control" name="cas_number" placeholder="Cas Number">
               </div>
             </div>

             <!-- Chemical Structure -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Chemical Structure</label>
                 <input type="file" name="chemical_structure" class="form-control">
               </div>
             </div>

           </div>

           <h3 class="text-primary mb-3">Lab testing result & CoA</h3>
           <div class="row">

             <!-- Current Batch -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Current Batch</label>
                 <input type="text" class="form-control" name="current_batch" placeholder="Current Batch">
               </div>
             </div>
             <!-- Test Date -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Test Date</label>
                 <input type="date" class="form-control" name="test_date" placeholder="Test Date">
               </div>
             </div>

             <!-- Avg. Purity -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Avg. Purity</label>
                 <input type="number" class="form-control" name="purity" placeholder="Avg. Purity">
               </div>
             </div>

             <!-- Avg. Weight -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Avg. Weight</label>
                 <input type="text" class="form-control" name="avg_weight" placeholder="Avg. Weight">
               </div>
             </div>

             <!-- Endotoxins (Usp85) -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Endotoxins (Usp85)</label>
                 <input type="file" class="form-control" name="endotoxins">
               </div>
             </div>

             <!-- Sterility (Usp61) -->
             <div class="col-md-6">
               <div class="form-group">
                 <label>Sterility (Usp61)</label>
                 <input type="file" name="sterility" class="form-control">
               </div>
             </div>

           </div>

           <h3 class="text-primary mb-3">Previous Batch</h3>
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


           <div class="prev_batch_wrapper_new"></div>
           <div class="mt-1">
             <button type="button" class="btn btn-secondary" onclick="addBatchRow()">
               <i class="mdi mdi-plus menu-icon"></i>
               Add More
             </button>
           </div>


           <h3 class="text-primary my-3">Media Files</h3>
           <div class="row">
             <div class="col-md-10">
               <div class="form-group">
                 <label>Image/Video</label>
                 <input type="file" class="form-control" name="media[]">
               </div>
             </div>
           </div>

           <div class="media_file_wrapper_new"></div>

           <div class="mt-1">
             <button type="button" class="btn btn-secondary" onclick="addMediaRow()">
               <i class="mdi mdi-plus menu-icon"></i>
               Add Media File
             </button>
           </div>

           <div class="mt-5">
             <button type="submit" class="btn btn-primary w-50">Submit</button>
           </div>
         </form>
       </div>
     </div>
   </div>

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
             <input type="file" required class="form-control" name="media[]">
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
       url: "api/add-peptide.php",
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