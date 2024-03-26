<?php include_once 'header_admin.php'?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
      <li class="breadcrumb-item">Update Staff</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section profile">
  <div class="row">
    <div class="col-xl-4">
              <?php 
               $target_dir = "layout/images/avatas/";
               $avatar_path = $target_dir . $staff['avatar'];
               if (file_exists($avatar_path)) {
                $avatar = "<img src='" . $avatar_path . "' alt='Profile' class='rounded-circle'>";
                $avatar_old ="<img src='" . $avatar_path . "' alt='Profile' id='previewImage'>";
                } else {
                    $avatar = "error img";
                }
              ?>
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          
          <?=$avatar?>
          <h2><?=$staff['fullname']?></h2>
          <h3>Quản trị viên</h3>
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>
          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">About</h5>
              <p class="small fst-italic">Được thành lập vào năm 2002 bởi một bộ đôi tín đồ thời trang, Evo Milana đã nhanh chóng trở thành một trong những công ty phân phối thời trang lớn nhất trong việc giới thiệu các thương hiệu thời trang cao cấp và sang trọng tại Việt Nam. Sau thành công ngoài mong đợi của cửa hàng đầu tiên, hiện Evo Milana đang là ngôi nhà chung của hơn 21 thương hiệu đình đám thế giới, thổi vào thị trường Việt Nam những giấc mơ thời trang bất tận.</p>

              <h5 class="card-title">Profile Details</h5>
              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8"><?=$staff['fullname']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Company</div>
                <div class="col-lg-9 col-md-8">Thể thao store </div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Job</div>
                <div class="col-lg-9 col-md-8">Nhân viên quản trị </div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Country</div>
                <div class="col-lg-9 col-md-8">Việt Nam </div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8"><?=$staff['address']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8"><?=$staff['phone']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8"><?=$staff['email']?></div>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
              
              <!-- Profile Edit Form -->
              <form action="?act=edit_staff" id="profileForm" enctype="multipart/form-data" method="post">
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                      <?=$avatar_old?>
                      <input type="file" name="profileImage" style="display: none;" id="profileImage" >
                      <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image" id="uploadImageBtn"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" id="removeImageBtn"><i class="bi bi-trash"></i></a>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="hidden" name="id_staff" value="<?=$staff['id']?>">
                    <input name="fullName" type="text" class="form-control" id="fullName" value="<?=$staff['fullname']?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="about" disabled class="form-control" id="about" style="height: 100px"></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="company" disabled type="text" class="form-control" id="company" value="Thể thao store">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="job" disabled type="text" class="form-control" id="Job" value="Nhân viên quản trị">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="country" disabled type="text" class="form-control" id="Country" value="Vietnamese">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="address" type="text" class="form-control" id="Address" value="<?=$staff['address']?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="Phone" value="<?=$staff['phone']?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="<?=$staff['email']?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="twitter" disabled type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="facebook" disabled type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="instagram" disabled type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="linkedin" disabled type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                  </div>
                </div>

                <div class="text-center">
                  <input type="submit" name="edit_staff" class="btn btn-primary" value="Save Changes">
                </div>
              </form><!-- End Profile Edit Form -->

            </div>
          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
<?php include_once 'footer_admin.php'?>