 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">
   <div class="copyright">
     &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
   </div>
   <div class="credits">
     <!-- All the links in the footer should remain intact. -->
     <!-- You can delete the links only if you purchased the pro version. -->
     <!-- Licensing information: https://bootstrapmade.com/license/ -->
     <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
     Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
   </div>
 </footer><!-- End Footer -->

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files -->
 <script src="views/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
 <script src="views/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="views/admin/assets/vendor/chart.js/chart.umd.js"></script>
 <script src="views/admin/assets/vendor/echarts/echarts.min.js"></script>
 <script src="views/admin/assets/vendor/quill/quill.min.js"></script>
 <script src="views/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
 <script src="views/admin/assets/vendor/tinymce/tinymce.min.js"></script>
 <script src="views/admin/assets/vendor/php-email-form/validate.js"></script>

 <!-- Template Main JS File -->
 <script src="views/admin/assets/js/main.js"></script>
 <script>
   document.addEventListener('DOMContentLoaded', function() {
     var fileInput = document.querySelector('input[type=file]');
     var uploadButton = document.querySelector('.file-upload-browse');

     uploadButton.addEventListener('click', function() {
       fileInput.click();
     });
   });
 </script>
 <script>
   // Function to handle the "Upload new profile image" button
   document.getElementById("uploadImageBtn").addEventListener("click", function(event) {
     event.preventDefault();
     document.getElementById("profileImage").click();
   });

   // Function to handle the image preview when selected for upload
   document.getElementById("profileImage").addEventListener("change", function(event) {
     const fileInput = event.target;
     if (fileInput.files && fileInput.files[0]) {
       const reader = new FileReader();
       reader.onload = function(e) {
         document.getElementById("previewImage").src = e.target.result;
       };
       reader.readAsDataURL(fileInput.files[0]);
     }
   });

   // Function to handle the "Remove my profile image" button
   document.getElementById("removeImageBtn").addEventListener("click", function(event) {
     event.preventDefault();
     document.getElementById("profileImage").value = ""; // Clear the selected image
     document.getElementById("previewImage").src = "views/admin/assets/img/profile-img.jpg"; // Reset to default image
   });
 </script>
 <script>
   function change_password() {
     var oldPassword = document.getElementById("currentPassword").value;
     var newPassword = document.getElementById("newPassword").value;
     var renewPassword = document.getElementById("renewPassword").value;
     var userId = document.getElementById("id_user").value;

     // Perform client-side validation
     if (currentPassword === '' || newPassword === '' || renewPassword === '') {
       showErrorMessage("Vui lòng điền đầy đủ thông tin.");
       return;
     }

     // Kiểm tra nếu mật khẩu mới và xác nhận mật khẩu mới khớp nhau
     if (newPassword !== renewPassword) {
       showErrorMessage("Mật khẩu mới và xác nhận mật khẩu mới không khớp nhau.");
       return;
     }

     // Send AJAX request
     var xhr = new XMLHttpRequest();
     xhr.open("POST", "model/change_pass.php", true);
     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhr.onreadystatechange = function() {
       if (xhr.readyState === XMLHttpRequest.DONE) {
         if (xhr.status === 200) {
           var response = JSON.parse(xhr.responseText);
           var successMessage = document.getElementById("successMessage");
           if (response.success) {
             successMessage.style.display = "block";
             successMessage.innerHTML = response.message;
           } else {
             alert(response.message); // Display error message
           }
         } else {
           alert("An error occurred while processing your request.");
         }
       }
     };
     var data = "old_password=" + oldPassword + "&new_password=" + newPassword + "&id_user=" + userId; // Use 'id_user'
     xhr.send(data);
   }

   function showErrorMessage(message) {
     const errorMessageElement = document.createElement("div");
     errorMessageElement.textContent = message;
     errorMessageElement.classList.add("error-message", "animate__animated", "animate__shakeX");
     const form = document.getElementById("passwordChangeForm");
     form.appendChild(errorMessageElement);

     setTimeout(function() {
       errorMessageElement.remove();
     }, 3000);
   }
 </script>

 </body>

 </html>