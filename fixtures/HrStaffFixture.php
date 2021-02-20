<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class HrStaffFixture extends  ActiveFixture
{
    public $modelClass = 'app\modules\hrm\models\HrStaff';
    public $dataFile = '@app/fixtures/data/hrStaff.php';
}