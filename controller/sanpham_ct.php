<?php
function new_sanphamct($id){
    $id=$_GET['id'];
    if(isset($_GET['id'])){
          $listspct=loadall_spct($id);
    }
    $gallery_pr = product_gallery($id);
    $top10_selling=top10_selling();
    $product_same_cate = products_same_category($id);
    $list_size= loadall_size($id);
    render("sanpham_ct",['listspct'=>$listspct,'list_size'=>$list_size,'all_product_same'=>$product_same_cate,'top10_selling'=>$top10_selling,'gallery'=>$gallery_pr]);
}
?>
