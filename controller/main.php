<?php 
function main(){
    $top10_selling=top10_selling();
    $list_sp=all_product();
    render("main",['list'=>$list_sp,'top10_selling'=>$top10_selling]);
}
?>