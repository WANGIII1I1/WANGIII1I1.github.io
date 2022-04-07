<?php
include 'ayangw/common.php';

@header('Content-Type: application/json; charset=UTF-8');
if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {

} else {
    exit( "页面非法请求！");
}
if(empty($_GET['act'])){
    exit("非法访问！");
}else{
    $act=$_GET['act'];
}

switch ($act){
    //获取商品
    case "getgoods":
           $tid = intval($_POST['tid']);
           $sql = "select id,gName,gInfo,imgs,price from ayangw_goods where state=1 and tpId = ".$tid ." order by sotr desc";
           $rs = $DB->query($sql);
           $goodslist = array();
           $i = 0;
           while ($row = $DB->fetch($rs)){
               $goods = array();
               $goods['id'] = $row['id'];
               $goods['name'] = $row['gName'];
               $goods['info'] = $row['gInfo'];
               $goods['imgs'] = $row['imgs'];
               $goods['price'] = $row['price'];
               $goods['kccount'] = $DB->count("select count(id) from ayangw_km where stat = 0 and gid = ".$row['id']);
               array_push($goodslist, $goods);
               $i++;
           }
           $msg = array("code"=>1,"msg"=>"获取成功","goodslist"=>$goodslist,"number"=>$i);
           $DB->close();
           exit(json_encode($msg));
    break;
    case 'createorder':
        if(empty($_SESSION['createcount'])){
            $returndata = array("code"=>-1,"msg"=>"商品验证失败，error：1001");
            $DB->close();
            exit(json_encode($returndata));
        }
        if(empty($conf['epay_id'])){
            $returndata = array("code"=>-1,"msg"=>"当前站点没有配置有效的支付接口！");
            $DB->close();
            exit(json_encode($returndata));
        }
        //$tradeno = daddslashes($_POST['tradeno']);
        $tradeno = date("YmdHis").rand(111,999);
        $gid = intval($_POST['gid']);
        $allprice = daddslashes($_POST['allprice']);
        $price = daddslashes($_POST['price']);
        $qq = daddslashes($_POST['qq']);
        $type = daddslashes($_POST['type']);
        $number = daddslashes($_POST['number']);
        $sql = "select price from ayangw_goods where id = ".$gid;
        $row = $DB->get_row($sql);
        if($row['price'] != $price){
            $returndata = array("code"=>-1,"msg"=>"商品验证失败");
            $DB->close();
            exit(json_encode($returndata));
        }
        $checkallprice = round($price*$number,2);
        if($allprice != $checkallprice){
             $returndata = array("code"=>-1,"msg"=>"商品验证失败");
             $DB->close();
             exit(json_encode($returndata));
        }
        $checkdd = $DB->get_row("select out_trade_no from ayangw_order where out_trade_no = '$tradeno'");
        if($checkdd){
             $returndata = array("code"=>-1,"msg"=>"请勿重复创建订单！");
             $DB->close();
             exit(json_encode($returndata));
        }
        
        $md5_tradeno = md5($tradeno.$allprice);
        $sql = "insert into ayangw_order(out_trade_no,md5_trade_no,gid,money,rel,type,benTime,number,sta,sendE) "
                . "values('$tradeno','$md5_tradeno',$gid,'$allprice','$qq','$type',now(),$number,0,0)";
        if($DB->query($sql)){
            $_SESSION['createcount']++;
            wsyslog("创建订单成功!","IP:".real_ip().",当前IP此次创建订单数量：".$_SESSION['createcount']."");
            $returndata = array("code"=>1,"msg"=>"订单创建成功","md5_tradeno" =>$md5_tradeno);
        }else{
            $returndata = array("code"=>-1,"msg"=>"订单创建失败");
        }
          $_SESSION['createcount']++;
        $DB->close();
        exit(json_encode($returndata));
        break;
       
    default :exit('{"code":-1,"msg":"哦豁？"}');
        
}


?>