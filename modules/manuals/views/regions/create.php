<?php


/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Regions */

$this->title = Yii::t('app', 'Create Regions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

<?php $js=<<<JS
    $('.modal-title').html('{$this->title}');

    $('body').delegate('input', 'keyup', function(e) {
        var value = $('#kt_tree_1 li');
        var id;
        value.each(function(index, item) {
            if ($(item).attr('aria-selected') == 'true') {
                id = $(item).val();
                $('#regions-parent_id').val(id);
            }
        });
    });
JS;
$this->registerJs($js);
