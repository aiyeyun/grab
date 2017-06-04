<?php
use yii\helpers\Url;

$csrf = Yii::$app->request->getCsrfToken();
$script = <<< JS
$(document).ready(function(){
    $('body').on('click','.menu-active',function(){
        var d = dialog({fixed: true}).show();
        var _this = $(this);
        var id = _this.attr('data-id');
        if(id){
            var json = {_csrf:"$csrf",id:id};
        }else{
            var json = {_csrf:"$csrf",type:_this.attr('data-type')};
        }
        $.post(_this.attr('data-url'),json,function(data){
            $("#myModal").html('');
            $("#myModal").append(data);
            d.close().remove();
            $('#myModal').modal('show');
        });
    });
});
JS;
$this->registerJs($script);
?>

<?php foreach ($model as $m):?>
    <tr id="menu-<?= $m->id?>">
        <td>所有彩种</td>
        <td> <?= $m->alias ?>  </td>
        <td> <?= $m->number ?>期  </td>
        <td> <?= $m->status ? '开启' : '关闭'; ?>  </td>
        <td>

            <a href="<?= \yii\helpers\Url::to('/admin/double/see') ?>?id=<?= $m->id?>" class="table-link menu-active" >
                <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                </span>
            </a>

            <a href="<?= \yii\helpers\Url::to('/admin/double/edit') ?>?id=<?= $m->id?>" class="table-link menu-active" >
                <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                </span>
            </a>

            <a href="javascript: void(0)" class="table-link danger menu-delete" data-url="<?= \yii\helpers\Url::to('/admin/double/delete') ?>" data-id="<?= $m->id?>" >
                <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                </span>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
