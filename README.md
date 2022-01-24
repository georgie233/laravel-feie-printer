# laravel-feie-printer

### 介绍
飞鹅云打印机Laravel SDK

### 安装教程

```
composer require georgie/laravel-feie-printer
```
发布配置文件
```
php artisan vendor:publish --provider="Georgie\LaravelFeiePrinter\LaravelServiceProvider"
```
在 `config/feiE.php` 里修改默认配置

### 方法使用
#### 说明
`::` 代表 `\Georgie\LaravelFeiePrinter\FeiePrinter::`

例如:

`::printerAdd()`  等同 `\Georgie\LaravelFeiePrinter\FeiePrinter::printerAdd()`
#### 添加打印机接口
```
::printerAdd('sn','key','name','sim');
参数描述: 编号,秘钥,名称,流量卡号码
必填：sn,key
选填: name,sim
```
#### 批量添加打印机接口
```
::printerAddlist([
    ['sn'=>'sn1','key'=>'key1','name'=>'name1','sim'=>'sim1'],
    ['sn'=>'sn2','key'=>'key2','name'=>'name2','sim'=>'sim2'],
]);
参数描述: 数组
必填：sn,key
选填: name,sim
```
#### 打印订单接口
```
$content = '<CB>测试打印</CB><BR>';
$content .= '名称　　　　　 单价  数量 金额<BR>';
$content .= '--------------------------------<BR>';
$content .= '饭　　　　　 　10.0   10  100.0<BR>';
$content .= '西红柿鸡蛋炒饭 10.0   10  100.0<BR>';
$content .= '--------------------------------<BR>';
$content .= '备注：加辣<BR>';
$content .= '合计：xx.0元<BR>';
$content .= '送货地点：广州市南沙区xx路xx号<BR>';
$content .= '联系电话：13888888888888<BR>';
$content .= '订餐时间：2014-08-08 08:08:08<BR>';
$content .= '<QR>http://www.feieyun.com</QR>';//把二维码字符串用标签套上即可自动生成二维码
  
  
::printMsg('sn',$content,1);
参数描述: 编号,内容,次数
必填：sn,sn,times
```
标签说明
```
//单标签:
//"<BR>"为换行,"<CUT>"为切刀指令(主动切纸,仅限切刀打印机使用才有效果)
//"<LOGO>"为打印LOGO指令(前提是预先在机器内置LOGO图片),"<PLUGIN>"为钱箱或者外置音响指令
//成对标签：
//"<CB></CB>"为居中放大一倍,"<B></B>"为放大一倍,"<C></C>"为居中,<L></L>字体变高一倍
//<W></W>字体变宽一倍,"<QR></QR>"为二维码,"<BOLD></BOLD>"为字体加粗,"<RIGHT></RIGHT>"为右对齐
```
#### 标签机打印订单接口
```
//参考 打印订单接口printMsg
::printLabelMsg('sn',$content,1);
参数描述: 编号,内容,次数
必填：sn,content,times
```
#### 批量删除打印机
```
::printerDelList('sn1-sn2-sn3')
参数描述: sn列表
必填：snlist
```
#### 修改打印机信息接口
```
::printerEdit('sn','name','sim')
参数描述: 编号,修改名称,修改流量卡
必填：sn name
```
#### 清空待打印订单接口
```
::delPrinterSqs('sn')
参数描述: sn
必填：sn
```
#### 查询订单是否打印成功接口
```
::delPrinterSqs('orderid')
参数描述: 订单ID
必填：orderid
```
#### 查询指定打印机某天的订单统计数接口
```
::queryOrderInfoByDate('sn','2020-02-20')
参数描述: sn,日期
必填：sn date
```
#### 获取某台打印机状态接口
```
::queryOrderInfoByDate('sn')
参数描述: sn
必填：sn
```
