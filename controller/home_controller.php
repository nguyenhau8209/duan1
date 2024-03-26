<?php 
function home_admin(){
    if (isset($_SESSION['user'])) { 
        $sale_today = sale_today();
        $sale_ytd = sale_yesterday();
        $top_selling = top_selling();
        $recent_order=recent_order();
        $revenue_this_month = revenue();
        $count_customers = all_customers();
        $products_catalog =  product_catalog();
        render("admin/index",['recent_order'=>$recent_order,'top_sell'=>$top_selling,'sale_today'=>$sale_today,'sale_yesterday'=>$sale_ytd,"rvn_this_month"=>$revenue_this_month,'all_ctm'=>$count_customers,'pr_catalog'=>$products_catalog]);
    }else{
        render("admin/404");
    }
    
}
?>