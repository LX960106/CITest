<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <base href="<?php echo base_url();?>"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <table class="table text-center">
                <caption style="margin-bottom: 30px;">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp&nbsp<span style="font-weight: bold;font-size: 15px">通知列表</span>
                </caption>
                <thead>
                <tr style="font-weight:bold;"><td>#</td><td>标题</td><td>发布时间</td><td>发布人</td><td>操作</td></tr>
                </thead>
                <tbody class=".table-striped">
                <?php
                    $count = 0;
                    foreach($arr as $item){
                    $count++;
                ?>
                <tr><td><?php echo $count;?></td><td><a href=""><?php echo $item["title"];?></a></td><td><?php echo $item["time"];?></td><td><?php echo $item["publisher"];?></td><td>
                        <table>
                            <tr>
                                <td width="40%"></td>
                                <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td width="30%"></td>
                                <td><a href="#"><span class="glyphicon glyphicon-trash" style="color:red;"></span></a></td>
                            </tr>
                        </table>
                    </td></tr>

                <?php }?>
                <tr>
                    <td colspan="5">
                        <nav>
                            <?php echo $links; ?>
                        </nav>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
</bodY>
<html>