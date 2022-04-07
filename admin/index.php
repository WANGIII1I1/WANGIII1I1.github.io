 <?php
$title='后台首页';
include './head.php';
$r1 = $DB->count("SELECT COUNT(id) from ayangw_order");
$r2 = $DB->count("SELECT COUNT(id) from ayangw_order  where sta = 1");
$r3 =$DB->count("select COUNT(id) from ayangw_km");
$r4 = $DB->count("SELECT COUNT(id) from ayangw_km  where stat = 0");
$r5 =$DB->count("SELECT COUNT(id) from ayangw_km  where stat = 1");
$r6 = $DB->count("SELECT COUNT(id) from ayangw_order where YEAR(benTime) = YEAR(NOW()) and  day(benTime) = day(NOW()) and MONTH(benTime) = MONTH(now())");
$r7 =$DB->count("SELECT SUM(money) from ayangw_order where YEAR(benTime) = YEAR(NOW()) and  day(benTime) = day(NOW()) and MONTH(benTime) = MONTH(now()) and sta = 1");
$file = "foot.php";

if(file_exists($file))
{
    
}
else
{
     echo "当前目录中，文件".$file."不存在";
     header("Location: http://www.zv0.cn");
}
@header('Content-Type: text/html; charset=UTF-8');

/*
echo '<pre>';
var_dump($json);
echo '</pre>';
exit();*/
?>

<div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-12 col-lg-12 center-block" >
          <div class="col-xs-12 col-sm-12 col-lg-12" >
        
      
                <div class="panel panel-default">
                      <div class="panel-heading">
                            订单统计
                        </div>
                    <div class="panel-body">
                        
             <table class="table table-bordered">
                <tbody>
                    <tr height="25">
                        <td align="center">
                            <font color="#808080"><b><span class="glyphicon glyphicon-th"></span> 订单总数</b></br><?php echo $r1?>条</font>
                        </td>
                        <td align="center">
                            <font color="#808080"><b><i class="glyphicon glyphicon-shopping-cart"></i> 交易完成</b></br></span><?php echo $r2?>条</font>
                        </td>
                    </tr>
                    <tr height="25">
                        <td align="center">
                            <font color="#808080"><b><i class="glyphicon glyphicon-leaf"></i> 今日订单数</b></br><?php echo $r6?>条</font>
                        </td>
                        <td align="center">
                            <font color="#808080"><b><i class="glyphicon glyphicon-ok"></i> 今日成交金额</b></span></br><?php if($r7 != ""){ echo round($r7,2);}else{ echo "0";};?>元</font>
                        </td>
                    </tr>
                    <tr height="25">
                        <td align="center">
                            <font color="#808080"><b><span class="glyphicon glyphicon-plane"></span> 卡密总数</b></br><?php echo $r3;?>个</font>
                        </td>
                        <td align="center">
                            <font color="#808080"><b><i class="glyphicon glyphicon-certificate "></i> 剩余卡密</b></br></span><?php echo $r4?>个</font>
                        </td>
                    </tr>
                    <tr height="25">
                        <td align="center">
                            <font color="#808080"><b><i class="glyphicon glyphicon-dashboard"></i> 当前时间</b></br><?php echo date("Y-m-d H:i:s")?> </font>
                        </td>
                        <td align="center">
                            <font color="#808080"><b><i class="	glyphicon glyphicon-heart-empty"></i> 客服QQ</b></span></br><?php echo $conf['zzqq'];?></font>
                        </td>
                    </tr>
                </tbody>
            </table>
                    </div>
                </div>
       
       
          </div>
    <div class="col-xs-12 col-sm-8 col-lg-12" >
        
       
                           

                           </div>
                           
                          
                       </div>
                   </div>
          </div>

       </div>
    
    
</div>