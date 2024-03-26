<?php include_once "header_admin.php"?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Quản lý danh mục sản phẩm</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <h1 class="page-header-title">
              Categories
             <span class="badge badge-soft-dark ml-2"><?= count($count_categories) ?></span>
            </h1>
               <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Danh sách <b>danh mục</b></h2></div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> <a href="index.php?act=add_category">Add danh mục</a></button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ordinalNumber = 1;
                        foreach ($all_categories as $category) {            
                            $edit = "index.php?act=update_category&id=".$category['id'];
                            $delete = "index.php?act=delete_category&id=".$category['id'];
                            echo '
                                <tr>
                                <td>'.$ordinalNumber.'</td>
                                <td>'.$category['name'].'</td>
                                <td>
                                    <a href="'.$edit.'" class="edit" title="Edit" data-toggle="tooltip"><i class="bi bi-pencil"></i></a>
                                    <a href="'.$delete.'" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không ?\')"  class="delete" title="Delete" data-toggle="tooltip"><i class="bi bi-trash3"></i></a>
                                </td>
                                </tr>
                            ';
                            $ordinalNumber++;
                        }
                        ?>      
                    </tbody>
                </table>
            </div>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <?php include_once "footer_admin.php"?>