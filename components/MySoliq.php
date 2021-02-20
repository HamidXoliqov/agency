<?php
namespace app\components;

use GuzzleHttp\Client;
use Yii;
use yii\base\Component;
use yii\base\Model;

class MySoliq
{
    private $APILogin = 'alfainvest';
    private $APIPassword = '67bcf84a5dxe053cx50a$';
    private $APIRootUri = 'https://my.soliq.uz/services/';

    private function makeRequest($subpath, $asArray = false) {
        $client = new Client();
        $response = $client->request(
            'GET',
            $this->APIRootUri . $subpath,
            [
                'auth' => [
                    $this->APILogin, $this->APIPassword
                ]
            ]
        );
        $resp = json_decode($response->getBody()->getContents(), true);
        if($asArray)
            return $resp;

        $obj = new SoliqData();
//        $obj->setAttributes($data);
        \Yii::configure($obj, $resp);
        return $obj;
    }

    private function makePostRequest($subpath, $data) {
        $client = new Client();
        $response = $client->request(
            'POST',
            $this->APIRootUri . $subpath,
            [
                'auth' => [
                    $this->APILogin, $this->APIPassword
                ],
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode($data)
            ]
        );
        return $response->getBody()->getContents();
//        return json_decode($response->getBody()->getContents(), true);
    }

    public function yur($tin)
    {
        $client = new Client();
        $response = $client->request(
            'GET',
            $this->APIRootUri . 'np1/yurbytin?tin=' . $tin,
            [
                'auth' => [
                    $this->APILogin, $this->APIPassword
                ]
            ]
        );
        $return = $response->getBody()->getContents();
        return $return;
    }

    public function fiz($tin)
    {
        $client = new Client();
        $response = $client->request(
            'GET',
            $this->APIRootUri . 'np1/fizbytin?tin=' . $tin,
            [
                'auth' => [
                    $this->APILogin, $this->APIPassword
                ]
            ]
        );
        $return = $response->getBody()->getContents();
        return $return;
    }

    public function yurArray($tin) {
        return $this->makeRequest('np1/yurbytin?tin=' . $tin, true);
    }

    public function fizArray($tin) {
        return $this->makeRequest('np1/fizbytin?tin=' . $tin, true);
    }

    /**
     * Солиқ тўловчи томонидан сотиладиган товарлар / хизматлар учун ягона классификатор бўйича кодлар рўйхатини олиш
     * @return SoliqData
    */
    public function getProducts($tin, $lang = "uz") {
        return $this->makeRequest("cl-api/class/get-list/by-company?tin=$tin&lang=$lang");
    }

    /**
     * Маҳсулот/хизмат номи учун ягона классификатор кодлари рўйхатини олиш
     * @return SoliqData
     */
    public function getSearchProductsCodes($search_text="") {
        return $this->makeRequest("cl-api/class/search?search_text=$search_text");
    }

    /**
     * Ягона классификаторнинг маҳсулот / хизмати ҳақида код бўйича маълумот олиш
     * @return SoliqData
     */
    public function getProductInfo($class_code) {
        return $this->makeRequest("cl-api/class/get/by-code?class_code=$class_code");
    }

    //Солиқ тўловчи томонидан сотиладиган товарлар / хизматлар рўйхатига янги позиция қўшиш
    public function addProduct($tin, $class_code) {
        return $this->makePostRequest("cl-api/company/product-add", compact('tin', 'class_code'));
    }

    //Солиқ тўловчи томонидан сотиладиган товарлар / хизматлар рўйхатидан маълум бир позицияни ўчириш
    /** @deprecated */
    public function deleteProduct($tin, $class_code) {
//        return $this->makePostRequest("cl-api/company/product-delete", compact('tin', 'class_code'));
    }

    //Cолиқ тўловчи томонидан сотилган товарлар/хизматлар рўйхатига бир неча бандларни Қўшиш
    public function addProducts($tin, array $codes) {
        return $this->makePostRequest("cl-api/company/basket/product-add", ['tin' => $tin, 'class_codes' => $codes]);
    }

    //Солиқ тўловчи томонидан сотиладиган товарлар / хизматлар рўйхатидан бир нечта позицияни ўчириш
    /** @deprecated */
    public function deleteProducts($tin, array $codes) {
//        return $this->makePostRequest("cl-api/company/basket/product-delete", ['tin' => $tin, 'class_codes' => $codes]);
    }

    public static function sasa()
    {
        $client = new Client();
        //Yii::$app->response->format = Response::FORMAT_JSON;
        switch (Yii::$app->request->get('type')) :
            case 'yurbytin':
                $uri = 'https://my.soliq.uz/services/np1/yurbytin?tin='.$tin;
                break;
            case 'fizbytin':
                $tin = Yii::$app->request->get('tin');
                $uri = 'https://my.soliq.uz/services/np1/fizbytin?tin='.$tin;
                break;
            case 'getclasslist':
                $tin = 204628206;
                $uri = 'https://my.soliq.uz/services/cl-api/class/get-list/by-company?tin=204628206';
                break;
            case 'getbycode':
                $code = Yii::$app->request->get('code');
                $uri = 'https://my.soliq.uz/services/cl-api/class/get/by-code?class_code='.$code;
                break;
            default :
                $tin = 204628206;
                $uri = 'https://my.soliq.uz/services/np1/yurbytin?tin='.$tin;
                break;
        endswitch;

        $response = $client->request(
            'GET',
            $uri,
            [
                'auth' => [
                    'alfainvest', '67bcf84a5dxe053cx50a$'
                ]
            ]
        );

        echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
    }


}

class ProductTypeInfo {
    public $groupCode = "";
    public $classCode = "";
    public $className = "";
    public $productCode = "";
    public $productName = "";
}

class SoliqData {
    public $success = false;
    public $code = 0;
    public $reason = "";
    public $data = null;
    public $errors = []; //{'field' => '', 'message' => ''}

    /**
     * @return ProductTypeInfo[]
     */
    public function getDataAsProductTypes() {
        $arr = [];
        if($this->data != null) {
            foreach ($this->data as $data) {
                $obj = new ProductTypeInfo();
                \Yii::configure($obj, $data);
                $arr [] = $obj;
            }
        }
        return $arr;
    }
}