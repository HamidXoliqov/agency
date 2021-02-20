<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use app\modules\manuals\models\Contragent;
use app\modules\manuals\models\ContragentOrgClassification;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Contragent */

$this->title = Yii::t('app', 'Table');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contragents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 YiiAsset::register($this);
?>
    <div class="card card-custom">
        <div class="card-body bg-light shadow" id="show">
            <!-- <div class="row mb-1">
                <div class="col-md-4">
                    <span class="badge mb-1" style="background-color: black"><i class="fa fa-flask text-white"></i></span> <?=Yii::t('app', 'Root organization')?><br>
                    <span class="badge mb-1" style="background-color: #552a2a"><i class="fa fa-flask text-white"></i></span> <?=Yii::t('app', 'Second organization(branch)')?><br>
                    <span class="badge mb-1" style="background-color: #b51a1a"><i class="fa fa-flask text-white"></i></span> <?=Yii::t('app', 'Third organization(branch)')?><br>
                    <span class="badge mb-1" style="background-color: red"><i class="fa fa-flask text-white"></i></span> <?=Yii::t('app', 'Fourth organization(branch)')?><br>
                </div>
                <div class="col-md-4">
                    <span class="badge mb-1" style="background-color: #ff7500"><i class="fa fa-flask text-white"></i></span> <?=Yii::t('app', 'Fifth organization(branch)')?><br>
                    <span class="badge mb-1" style="background-color: #ffc000"><i class="fa fa-flask text-white"></i></span> <?=Yii::t('app', 'Sixth organization(branch)')?><br>
                    <span class="badge mb-1" style="background-color: yellow"><i class="fa fa-flask text-white"></i></span> <?=Yii::t('app', 'Seventh organization(branch)')?><br>
                    <span class="badge mb-1" style="background-color: #ddff77"><i class="fa fa-flask text-white"></i></span> <?=Yii::t('app', 'Eighth organization(branch)')?><br>
                </div>
                <div class="col-md-4">
                    <span class="badge mb-1" style="background-color: #bbddbb"><i class="fa fa-flask text-white"></i></span> <?=Yii::t('app', 'Ninth organization(branch)')?><br>
                    <span class="badge mb-1" style="background-color: #55bbcc"><i class="fa fa-flask text-white"></i></span> <?=Yii::t('app', 'Tenth organization(branch)')?><br>
                    <span class="badge mb-1" style="background-color: #008899"><i class="fa fa-flask text-white"></i></span> <?=Yii::t('app', 'Eleventh organization(branch)')?><br>
                </div>
            </div> -->
            <form>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="validationDefault01">First name</label>
                      <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="validationDefault02">Last name</label>
                      <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="Otto" required>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="validationDefaultUsername">Username</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>
                </div>
            </form>
            <div class="row mb-2">
                <div class="col-md-12">
                    <?= Html::a(Yii::t('app', 'Update'), ['update-self', 'id' => $user->employee_id], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="table-responsive pt-3 px-2 border bg-secondary" id="box" style="overflow-x: auto;" onscroll="myFunction()">
                <?php if (!empty($org_class) && !empty($contr)): ?>
                    <table class="table table-bordered" id="table" ondblclick="openFullscreen();">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <thead>
                            <tr>
                                <th class="t">№</th>
                                <th class="t inn"><?=Yii::t('app', 'INN')?></th>
                                <th class="t name"><?=Yii::t('app', 'Name of Contragents')?></th>
                                <?php foreach ($org_class as $key): ?>
                                    <th class="org-class" data-container="body" data-toggle="popover" data-placement="top" data-content="<?=$key['name_uz']?>" class="hover-td">
                                        <div>
                                            <?=$key['name_uz']?>
                                        </div>
                                    </th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1; foreach ($contr as $key): ?>
                                <tr>
                                    <th class="text-center"><?=$n++?></th>
                                    <th class="pl-5"><?=$key['inn']?></th>
                                    <th class="pl-5"><?=$key['short_name']?></th>
                                    <?php foreach ($org_class as $sey): ?>
                                        <?php if (!empty($org_class) && !empty($contr)){
                                            $response = ContragentOrgClassification::find()->where(['contragent_id' => $key['id'], 'org_classification_id' => $sey['id']])->one();
                                        }
                                        $red = Contragent::getOrgClassificationColor();
                                        ?>
                                        <td style="background-color: <?php echo($response['contragent_id'] != null) ? /*$red[$sey['id']]*/'black' : ''?>;">
                                        </td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?> 
                        </tbody>
                    </table>
                <?php endif ?>
            </div>
        </div>
    </div>

<p id="demo"></p>

<script>
// var elem = document.getElementById('show');
var elem = document.getElementById('table');
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  }
}
function myFunction() {
  var elmnt = document.getElementById("box");
  var elmnt1 = document.getElementById("table").clientWidth;
  var elmnt2 = document.getElementById("box").clientWidth;
  var x = elmnt.scrollLeft;
  var y = elmnt.scrollTop;
  var ending = elmnt1 - elmnt2 - 9;
  var end = elmnt1 - elmnt2 + 6;
  var scx = x - ending;
  // if (x > ending) {
  //   // console.log(scx);
  //   document.getElementById("box").style = "box-shadow: inset -"+(10)+"px -"+(10)+"px "+(10)+"px -10px #333 !important";
  // }
  if (x == end) {
    document.getElementById("box").style = "box-shadow: none !important";
  }
  else{
    document.getElementById("box").style = "box-shadow: inset -15px -15px 15px -10px #333"
  }
  document.getElementById ("demo").innerHTML = "Horizontally: " + x + "px";
}
</script>

<?php
$js = <<<JS
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover({
            container: 'body'
        });
    });
JS;

$this->registerJs($js);

$css = <<<CSS
#box{
    box-shadow: inset -15px -11px 15px -10px #333;
}
#table{
    position: relative;
}
.popover{
    max-width: 75%; /* Max Width of the popover (depending on the container!) */
    font-size: 14px;
}
.org-class{
    min-width: 90px;
    max-width: 90px;
}
th.hover-td:hover {
    background-color: rgb(250,250,250) !important;
}
table thead tr th.t{
    font-size: 20px;
    text-align: center;
}
table thead tr th.t.name{
    min-width: 260px; 
}
table thead tr th.t.inn{
    min-width: 100px; 
}
table thead tr th div{
    height: 40px;
    overflow-y: hidden;
}
.table .row .col-md-4{
    min-width: 10px;
    min-height: 10px;
}
table thead tr:hover{
    background-color: white !important;
}
.table thead th {
    vertical-align: middle;
    font-size:11px;
}
CSS;
$this->registerCss($css);
?>