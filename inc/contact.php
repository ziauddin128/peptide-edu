 <section class="contact">
     <div class="container">
         <div class="section-header">
             <h2>Get in Touch</h2>
             <h1>Contact Us</h1>
             <p>
                 Have questions or need assistance? Our team is here to help. Reach
                 out to us anytime, and we’ll get back to you as soon as possible.
             </p>
         </div>

         <div class="mt-4 form-wrapper">
             <form id="contact-form">
                 <div class="row">
                     <div class="col-sm-6">
                         <div class="input-wrapper">
                             <label>Your name</label>
                             <input type="text" name="name" id="name" placeholder="Your name" />
                             <p class="error-msg" id="name-error"></p>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="input-wrapper">
                             <label>Your email</label>
                             <input type="email" name="email" id="email" placeholder="Your email" />
                             <p class="error-msg" id="email-error"></p>
                         </div>
                     </div>
                     <div class="col-sm-12">
                         <div class="input-wrapper">
                             <label>Your message</label>
                             <textarea
                                 type="text"
                                 name="message"
                                 id="message"
                                 placeholder="Your message"></textarea>
                             <p class="error-msg" id="message-error"></p>
                         </div>
                     </div>
                 </div>
                 <button class="contact-submit-btn">
                     <span>Send</span>
                     <i class="fa-regular fa-paper-plane"></i>
                 </button>
             </form>
         </div>
     </div>
 </section>

 <script>
     $("#contact-form").submit(function(e) {
         e.preventDefault();

         let is_valid = true;
         let name = $("#name").val();
         let email = $("#email").val();
         let message = $("#message").val();

         $(".error-msg").hide();

         if (name == "") {
             $("#name-error").show().html('Name is required');
             is_valid = false;
         }

         if (email == "") {
             $("#email-error").show().html('Email is required');
             is_valid = false;
         }

         if (message == "") {
             $("#message-error").show().html('Message is required');
             is_valid = false;
         }

         if (is_valid) {
             $.ajax({
                 url: "api/send-email.php",
                 type: "POST",
                 data: $("#contact-form").serializeArray(),
                 success: function(result) {
                     let data = JSON.parse(result);

                     if (data.success) {
                         Swal.fire({
                             title: "Success",
                             text: data.message,
                             icon: "success"
                         });
                         $("#contact-form").trigger("reset");
                     } else {
                         Swal.fire({
                             title: "Login Failed",
                             text: data.message,
                             icon: "error"
                         });
                     }
                 }
             })
         }

     })
 </script>