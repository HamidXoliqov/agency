<?php

namespace app\modules\subsidy\models;

use Yii;

/**
 * This is the model class for table "subsidy_protocol".
 *
 * @property int $id
 * @property string|null $protocol_number
 * @property int|null $protocol_date
 * @property string|null $file
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property int|null $status
 * @property float|null $total_sum
 * @property string|null $protocolDateSimple
 *
 */
class SubsidyProtocol extends \app\models\BaseModel
{
    const PROTOCOL_STATUS_DELETED = 0;
    const PROTOCOL_STATUS_NEW = 1;
    const PROTOCOL_STATUS_EDIT = 3;
    const PROTOCOL_STATUS_ACTIVE = 5;

    public $protocol_file;
    public $_protocolDateSimple; //dd.mm.yyyy

    public function load($data, $formName = null)
    {
        $result = parent::load($data, $formName);
//        var_dump($formName); exit;
//        var_dump($data); exit;
        if($this->_protocolDateSimple != null) {
            $dbdate = convertDateDdMmYyyyToYyyyMmDd($this->_protocolDateSimple);
            $this->protocol_date = strtotime($dbdate);
        } else {
            $this->loadSimpleDate();
        }
        return $result;
    }

    public function loadSimpleDate() {
        if($this->protocol_date != null) {
            $this->_protocolDateSimple = simpleDate($this->protocol_date);
        }
    }

    public function getProtocolDateSimple() {
        if($this->protocol_date != null) {
            $this->_protocolDateSimple = simpleDate($this->protocol_date);
        }
        return $this->_protocolDateSimple;
    }

    public function setProtocolDateSimple($value) {
        $this->_protocolDateSimple = $value;
        if($this->_protocolDateSimple != null) {
            $dbdate = convertDateDdMmYyyyToYyyyMmDd($this->_protocolDateSimple);
            $this->protocol_date = strtotime($dbdate);
        }
    }


    public function loadDefaultsData() {
        if($this->protocol_date == null)
            $this->protocol_date = time();
        $this->loadSimpleDate();
        if($this->protocol_number == null)
            $this->protocol_number = date("m/Y", $this->protocol_date);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subsidy_protocol';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['protocol_date', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'default', 'value' => null],
            [['protocol_date', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['protocol_number'], 'string', 'max' => 20],
            [['file'], 'string', 'max' => 255],
            [['total_sum'], 'number'],
            [['protocolDateSimple'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'protocol_number' => Yii::t('app', 'Protocol Number'),
            'protocol_date' => Yii::t('app', 'Protocol Date'),
            'protocolDateSimple' => Yii::t('app', 'Protocol Date'),
            'file' => Yii::t('app', 'File'),
            'protocol_file' => Yii::t('app', 'Protocol File'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'status' => Yii::t('app', 'Protocol Status'),
            'total_sum' => Yii::t('app', 'Total sum'),
        ];
    }

    public function getTotalSumAsMillionSum() {
        $sum = $this->total_sum;
        $sum = $sum * 0.000001;
        return sprintf("%0.2f", $sum);
    }


}
