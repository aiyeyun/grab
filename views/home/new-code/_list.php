<?php foreach ($model as $m) : ?>
    <?php $analysis = $m->getAnalysis($package_id)->one(); ?>
    <tr>
        <td class="text-center"><?= $m->qihao ?></td>
        <td class="text-center"><?php echo $code = str_replace(" ", '', $m->one.$m->two.$m->three.$m->four.$m->five); ?></td>
        <td class="text-center">
            <span class="badge bg-gray" <?php echo $analysis->lucky == 1 ? 'style="background: red"' : false;  ?> >  <?php echo !empty($analysis->lucky) ? '中' : '未';  ?> </span>
        </td>
    </tr>
<?php endforeach; ?>