<?php include_once "header_admin.php" ?>
<!-- Header -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Thêm danh mục </h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body"> 
                    <h5 class="card-title">Thêm danh mục sản phẩm </h5>
                    <!-- Vertical Form -->
                        <form action="?act=edit_category" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="iddm" class="form-label">Id</label>
                                <input type="hidden" name="id_cate" value="<?= $category['id'] ?>">
                                <input type="text" disabled class="form-control" id="iddm" name="iddm" placeholder="auto increment">
                            </div>
                            <div class="col-12">
                                <label for="tendm" class="form-label py-3">Tên danh mục</label>
                                <input type="text" class="form-control" id="tendm" name ="tendm" placeholder="Nhập tên danh mục" value="<?= $category['name']?>">
                            </div>
                            <div class="text-center mt-4">
                                <input type="submit" class="btn btn-success" name="add" value="Sửa">
                                <input type="reset" class="btn btn-secondary" value="Reset">
                            </div>
                        </form><!-- Vertical Form -->
                    <?php 
                    if (isset($thongbao)&&($thongbao!="")) {
                        echo $thongbao;
                    }
                    ?>
                </div>
            </div>
        </div>

    </section>

</main><!-- End #main -->

<?php include_once "footer_admin.php" ?>