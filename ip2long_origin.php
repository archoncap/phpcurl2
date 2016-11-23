<?php
function ip2int($ip){
    //我们先把ip分为四段,$ip1,$ip2,$ip3,$ip4
    list($ip1,$ip2,$ip3,$ip4)=explode(".",$ip);
    //然后第一段乘以256的三次方，第二段乘以256的平方，第三段乘以256
    //这即是我们得到的值
    return $ip1*pow(256,3)+$ip2*pow(256,2)+$ip3*256+$ip4;
}


function ip2int($ip){
    list($ip1,$ip2,$ip3,$ip4)=explode(".",$ip);
    return ($ip1<<24)|($ip2<<16)|($ip3<<8)|($ip4);
}


function chk_ip($ip){
    if(ip2long($ip)=="-1") {
       return false;
    }
    return true;
}
//应用
var_export(chk_ip("10.111.149.42"));
var_export(chk_ip("10.111.256.42"));


/*
我们会发现，有些ip转化成整数后，是负的，这是因为得到的结果是有符号整型，最大值是2147483647.要把它转化为无符号的，可以用
sprintf("%u",ip2long($ip);

就能转换为正整数。而且得到的结果用long2ip也可以正常转换回原来的ip地址。也可以用ip2long来验证一个ip是否是有效的，如
<?php
function chk_ip($ip){
    if(ip2long($ip)=="-1") {
       return false;
    }
    return true;
}
//应用
var_export(chk_ip("10.111.149.42"));
var_export(chk_ip("10.111.256.42"));
?>
*/
/*
将输出true和false
把ip数据保存在数据库(MySQL)中时候,我们习惯用ip2long函数生成整型,然后存放在一个int(11)类型的字段中,但是,在不同的系统平台上,ip2long函数得到的值是不同的,因此可能造成在从数据库中读出数据,用long2ip得到ip的时候产生错误,说一下我们碰到的情况:
我们用一个int(11)类型(范围-2147483648 - 2147483647)来保存把一个ip地址用ip2long处理得到的结果,例如ip是’202.105.77.179′,那么在32位机器上得到的结果是:-899068493,而在64位机器上却得到3395898803.然后把它写入数据库,由于超过int(11)的范围,因此64位机器上的结果被保存为int(11)的最大值:2147483647.于是在从数据库中取出的时候,便得到了错误的结果,会得到”127.255.255.255″这个ip地址.
解决的办法很多,比如可以用mysql的函数:INET_ATON和INET_NTOA来处理ip地址;或者把保存ip地址的字段改为bigint类型,这样在64位机器上虽然保存的是3395898803,使用long2ip函数仍能得到正确的结果.
*/



