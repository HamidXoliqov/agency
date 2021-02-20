<?php
namespace app\components\MyWidgets;
use kartik\select2\Select2;

class MySelect3 extends Select2
{
    public $isArrow = false;
    public $mySimbvol;
    public function run()
    {
        if ($this->isArrow) {
            $items = $this->data;
            foreach ($items as $key => $val) {
                $this->data[$key] = "{$this->mySimbvol}{$val}{$this->mySimbvol}";
            }
        }
        parent::run();
        $this->renderWidget();
    }


}
?>