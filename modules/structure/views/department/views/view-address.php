<div class="text-center col-lg-12"><h5><b><?=Yii::t('app', 'Physical Location')?></b></h5></div><br>
<div class="separator separator-solid"></div>
<br>

<p><?= Yii::t('app', 'Physical Region: ').$model->physical_region?></p>
<p><?= Yii::t('app', 'Physical Location: ').$model->physical_location?></p>


<div class="text-center col-lg-12"><h5><b><?=Yii::t('app', 'Legal Location')?></b></h5></div><br>
<div class="separator separator-solid"></div>
<br>

<p><?= Yii::t('app', 'Legal Region: ').$model->legal_region?></p>
<p><?= Yii::t('app', 'Legal Location: ').$model->legal_location?></p>

<p><?= Yii::t('app', 'Tel: ').$model->tel?></p>
<p><?= Yii::t('app', 'Email: ').$model->email?></p>


<?php
$view_address = Yii::t('app', 'View Address');
$js = <<< JS
    $('.modal-title1').html('{$view_address}');
JS;
$this->registerJs($js)
?>