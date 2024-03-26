
<?php
// session_start();
if (!isset($_SESSION['love'])) {
    $_SESSION['love'] = [];
}
function yeuthich()
{
    render("yeuthich");
}
// function yeuthich($id){
//    $yeuthich=load_yeuthich($id);
//    $list_size= loadall_size($id);
//     render("yeuthich",['yeuthich'=>$yeuthich,'list_size'=>$list_size]);
// }
function show_yt()
{
    if (isset($_POST['button_yt'])) {
      $name_yt=$_POST['name_yt'];
      $price_yt=$_POST['price_yt'];
      $title_yt=$_POST['title_yt'];
      $thumbnail_yt=$_POST['thumbnail_yt'];
      $sanpham=[$name_yt,$price_yt,$title_yt,$thumbnail_yt];
      $_SESSION['love'][]=$sanpham;
      render('yeuthich', ['yeuthich' => $_SESSION['love']]);
    }
}

function yeu_thich_del()
{
  if (isset($_GET['id_yt'])) {
    // unset($_SESSION['love']);

    array_splice($_SESSION['love'], $_GET['id_yt'], 1);
  }
  header("location:?act=yeuthich");
}
?>