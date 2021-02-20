<?php

namespace app\controllers;

use app\components\MySoliq;
use app\models\RegisterContragent;
use app\models\RegisterForm;
use app\models\SystemStructura;
use app\modules\admin\models\Employee;
use app\modules\admin\models\Users;
use app\modules\manuals\models\Contragent;
use app\modules\structure\models\Department;
use GuzzleHttp\Client;
use http\Url;
use Yii;
use yii\bootstrap4\ActiveForm;
use yii\httpclient\Exception;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;

class SiteController extends BaseController
{

    /**
     * @return string
     */
    public function actionError(){
        $this->layout = 'main-login.php';
        return $this->render('error', [
            'name' => 'Error',
            'message' => Yii::t('app', 'Bad Request')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'main-login.php'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
//        $u = Users::findByUsername("admin"); $u->setPassword("admin@example"); $u->save();
//        $msg = Yii::$app->session->getFlash('danger');
//        if($msg)
//            die($msg);
//        Yii::$app->session->setFlash('danger', 'something wrong.');
//        Yii::$app->session->setFlash('success', 'something wrong.');
        $this->layout = 'main-login.php';
        $info = SystemStructura::find()->orderBy(['id' => SORT_DESC])->limit(1)->one();
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
            'info' => $info,
            'errorMsg' => false
        ]);
    }

    /**
     * ...
     *
     * @return Response
     */
    public function actionViaEsi()
    {
        $info = SystemStructura::find()->orderBy(['id' => SORT_DESC])->limit(1)->one();
        $this->layout = 'main-login.php';

        $model = new LoginForm();

        if (Yii::$app->request->isPost && $userData = Yii::$app->request->post()) {

            $data = Users::findByEsikey($userData['tin'],$userData['key']);
            if (!empty($data) && Yii::$app->user->login($data, 3600*24)) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Вход с помощью ЭЦП, удачно закончил'));
                return $this->goHome();
            }else{
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Вход с помощью ЭЦП, вам запрещено'));
            }
                // return $this->goBack();
        }

        return $this->render('via-esi', [
            'model' => $model,
            'info' => $info,
            'errorMsg' => '',
        ]);
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public static function getUserTaxDataFromSoliq($inn)
    {
//        $uri = 'https://my.soliq.uz/services/np1/yurbytin?tin=305089423';  // ToDo bu yerga yur lisonikini qoyish kk
        $uri = 'https://my.soliq.uz/services/np1/yurbytin?tin='.$inn;  // ToDo bu yerga yur lisonikini qoyish kk
//                $uri = 'https://my.soliq.uz/services/np1/yurbytin?tin='.$userData['tin']; // ToDo bu yerga user tin qoyilsin
        try {
            $client = new Client();
            if (!$response = $client->request(
                'GET',
                $uri,
                [
                    'auth' => [
                        'alfainvest', '67bcf84a5dxe053cx50a$'
                    ]
                ]
            )) {
                throw new \Exception();
            }
//            $user_tax_data = $response->getBody();

            $user_tax_data = json_decode($response->getBody()->getContents(), true);
            return $user_tax_data;
        } catch (\Exception $e) {
            $errorMsg = "Soliq error: ".$e->getMessage();
            //$user_tax_data = '{"tin":"305089423","ns10Code":24,"ns10Name":"Сирдарё вилояти","ns11Code":6,"ns11Name":"Сайхунобод тумани","name":"\"SAYXUNOBOD TUMANI IRRIGATSIY","nameFull":"SAYXUNOBOD TUMANI IRRIGATSIYA BO\'LIMI","address":"САЙХУН, SHODLIK MAHALLASI","regNum":"547443","regDate":"10.10.2017","fund":100000,"gdFullName":"СУЛЕЙМАНОВ ГУЛОМЖОН ЭРКИНОВИЧ","gdTin":"476586154","gdTelWork":"+99899 515 8816","gdTelHome":null,"gbFullName":"BABANOV DILMUROD DJURAMURATOVICH","gbTin":"516374191","gbTelWork":"993462708","gbTelHome":null,"nc1Code":"04043","nc1Name":"Министерство водного хозяйства Республики Узбекистан","nc2Code":null,"nc2Name":null,"nc3Code":"200","nc3Name":"ОММАВИЙ МУЛК  (фойдаланилмайди)","nc4Code":"2100","nc4Name":"Давлат идоралари ","nc5Code":"0","nc5Name":null,"nc6Code":"01613","nc6Name":"Qishloq xo\'jаlik sug`orish uskunаlаrigа xizmаt ko\'rsаtish","ns1Code":13,"ns1Name":"Бюджет","ns2Code":null,"ns2Name":null,"ns3Code":416,"ns3Name":"Ўзбекистон Республикаси Сув хўжалиги вазирлиги","ns4Code":1,"ns4Name":"Давлат","ns13Code":0,"ns13Name":"Фаолият курсатаетган хамда солик мажбуриятларига эга","na1Code":19,"na1Name":"Бюджет ташкилотлари","account":null,"dateTin":1507637978000,"tinHead":null,"okpo":"27352632","mriCode":0,"taxRegime":0,"stateCode":0,"stateName":"Фаолият кўрсатаётган ва солиқ мажбуриятига эга"}';
            return $errorMsg;
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionEsi()
    {
        $info = SystemStructura::find()->orderBy(['id' => SORT_DESC])->limit(1)->one();
        $this->layout = 'main-login.php';

        if (Yii::$app->request->isPost && $userData = Yii::$app->request->post()) {
//        if (Yii::$app->request->get("temp")) {
//            $userData = [
//                'serial' => '305089423', 'tin' => '305089423',
//                'serial' => '200903659', 'tin' => '200903659',
//                'serial' => '301955170', 'tin' => '301955170',
//                'serial' => '494774576', 'tin' => '301955170',
//               'keyId' => 'key-id-305', 'key' => 'key-305', 'pkcs7' => 'pkcs7-data-example',
//               'fio' => 'Familiya Imya Otechestva',
//            ];

            $mysoliq = new MySoliq();
            if ( /*($userData['serial'][0] == '2' || $userData['serial'][0] == '3')*/ true) { // ToDo bu yerda komentni olib tasha
//                $soliq = self::getUserTaxDataFromSoliq($userData['serial']);
//                $soliq = self::getUserTaxDataFromSoliq($userData['tin']);
//                if(is_string($soliq))
//                    $errorMsg = $soliq;
//                else
//                    $user_tax_data = $soliq;
                try {
                    $user_tax_data = $mysoliq->yurArray($userData['tin']);
                } catch (\Exception $e) {
                    $errorMsg = "Soliq error: ".$e->getMessage();
                }

//                print_r($user_tax_data); die();

                $this->layout = 'register-wizard.php';
                return $this->render('register-contragent', [
                    'info' => $info,
                    'errorMsg' => $errorMsg,
                    'userData' => $userData,
                    'userTaxData' => $user_tax_data,
                ]);
            } else {
                $errorMsg = Yii::t('app', 'You are not Legal entity, Choose Legal entity key');
            }
        }

        return $this->render('esi', [
            'info' => $info,
            'errorMsg' => $errorMsg
        ]);
    }

    public function actionRegisterUser()
    {
        if (Yii::$app->request->isPost && $post = Yii::$app->request->post()) {
            $mysoliq = new MySoliq();
            $serial = $post['serial'];
            $tin = $post['tin'];
            $org_tin = $post['org_tin'];
            $u = Users::findOne(['inn' => $serial]);
            $flashErrorMsg = null;
            if($u != null) {
                /* @var $emp Employee */
//                $emp = $u->getEmployee();
//                $dep = $u->getUserDepartment();
                $flashErrorMsg = Yii::t('app-msg', "With such an INN ({inn}) the user is registered in the system.", ['inn' => $serial]);
            }

            $ca = Contragent::findOne(['inn' => $org_tin]);
            if($ca != null) {
                $flashErrorMsg = "";
                switch ($ca->status) {
                    case Contragent::STATUS_ACTIVE :
                        $flashErrorMsg = Yii::t('app-msg', "You have already registered a contractor. You can log in.");
                        break;

                    case Contragent::STATUS_INACTIVE :
                        $flashErrorMsg = Yii::t('app-msg', "Your organization's account is inactive. Contact the agency for more information.");
                        break;

                    case Contragent::STATUS_PENDING :
                        $flashErrorMsg = Yii::t('app-msg', "Your organization account has been registered and sent to the agency, but has not yet been activated.");
                        break;

                    case Contragent::STATUS_DELETED :
                        $flashErrorMsg = Yii::t('app-msg', "Your organization account has been deleted. Contact the agency for more information.");
                        break;

                }
                if($flashErrorMsg == null)
                    $flashErrorMsg = Yii::t('app-msg', "Such an INN ({org_tin}) is registered from the counterparty system. Contact your system administrator for more information.", ['org_tin' => $org_tin]);
            }

            if($flashErrorMsg != null) {
                Yii::$app->session->setFlash('danger', $flashErrorMsg);
                return $this->redirect(['site/login']);
            }

/*
            $soliq = self::getUserTaxDataFromSoliq($serial);
            if(is_string($soliq))
                $errorMsg = $soliq;
            else
                $user_tax_data = $soliq;
*/

            try {
                $org_tax_data = $mysoliq->yurArray($org_tin);
            } catch (\Exception $e) {
                $errorMsg = "Soliq error: ".$e->getMessage();
            }

            try {
                $user_tax_data = $mysoliq->fizArray($serial);
            } catch (\Exception $e) {
                $errorMsg = "Soliq error: ".$e->getMessage();
            }

            if($errorMsg != null) {
                Yii::$app->session->setFlash('danger', $errorMsg);
                return $this->redirect(['site/login']);
            }

            $department = new Department();
            $user = new Users();
            $contragent = new Contragent();
            $employee = new Employee();

            try {
                $transaction = Yii::$app->db->beginTransaction();
                $department->setAttributes([
                    'name_en'=> $post['org_name'],
                    'name_ru'=> $post['org_name'],
                    'name_uz'=> $post['org_name'],
                    'short_name'=> $post['org_short_name'],
                    'status' => $department::STATUS_PENDING,
                    'inn'=> $post['org_tin'],
                    'okonx'=> $post['org_oked'],
                ]);
                //$department->save();
                //echo "<pre>";print_r($post);die();
                if ($department->save()) {
                    $user->setAttributes([
                        'fullname' => $post['fullname'],
                        'username' => $post['username'],
                        'password' => Yii::$app->getSecurity()->generatePasswordHash($post['password']),
                        'status' => $user::STATUS_PENDING,
                        'inn' => $post['tin'],
                        'department_id' => $department->id,
                        'cert_key' => $post['key'],
                        'cert_key_id' => $post['keyId'],
                        'cert_serial' => $post['serial'],
                        'pkcs7' => $post['pkcs7'],
                    ]);
//                    die($user->inn);
                    if (!$user->save()) {
                        $transaction->rollBack();
                        $errorMsg = $user->getErrors();
                        Yii::$app->session->setFlash('danger', $errorMsg);
                        throw new \Exception();
                    } else {
                        $employee->department_id = $department->id;
                        $employee->tin = $user->inn;
                        $bd = $user_tax_data['birthDate']; //dd.mm.yyyy

                        $employee->setAttributes([
                            'ns10Code'  => $user_tax_data['ns10Code'],
                            'ns10Name'  => $user_tax_data['ns10Name'],
                            'ns11Code'  => $user_tax_data['ns11Code'],
                            'ns11Name'  => $user_tax_data['ns11Name'],
                            'fullName'  => $user->fullname,
                            'birthDate' => convertDateDdMmYyyyToYyyyMmDd($bd),
                            'sex'       => $user_tax_data['sex'],
                            'sexName'   => $user_tax_data['sexName'],
                            'passSeries'=> $user_tax_data['passSeries'],
                            'passNumber'  => $user_tax_data['passNumber'],
                            'passDate'  => convertDateDdMmYyyyToYyyyMmDd($user_tax_data['passDate']),
                            'passOrg'  => $user_tax_data['passOrg'],
                            'zipCode'   => $user_tax_data['zipCode'],
                            'address'   => $user_tax_data['address'],
                            'ns13Code'  => $user_tax_data['ns13Code'],
                            'ns13Name'  => $user_tax_data['ns13Name'],
                            'tinDate'  => convertDateDdMmYyyyToYyyyMmDd($user_tax_data['tinDate']),
                            'dateModify'  => convertDateDdMmYyyyToYyyyMmDd($user_tax_data['dateModify']),
                            'isitd'  => $user_tax_data['isitd'],
                            'duty'  => $user_tax_data['duty'],
                            'personalNum'  => $user_tax_data['personalNum'],
                            'docCode'  => $user_tax_data['docCode'],
                            'docName'  => $user_tax_data['docName'],
                            'isNotary'  => $user_tax_data['isNotary'],
                            'phone'  => $user_tax_data['phone'],
                            'status'    => Employee::STATUS_PENDING,
                        ]);

                        if(!$employee->save()) {
                            $transaction->rollBack();
                            $errorMsg = $employee->getErrors();
                            Yii::$app->session->setFlash('danger', $errorMsg);
                            throw new \Exception(arrayToString($employee->getErrors()));
                        }


                        $contragent->setAttributes([
                            'name' => $post['org_name'],
                            'short_name' => $post['org_short_name'],
                            'address' => $post['org_address'],
                            'director' => $post['org_director'],
                            'director_inn' => $post['org_director_inn'],
                            'tel' => $post['org_tel'],
                            'status' => $contragent::STATUS_PENDING,
                            'inn' => $post['org_tin'],
                            'oked' => $post['org_oked'],
                            'accounter' => $post['org_accounter'],
                            'accounter_inn' => $post['org_accounter_inn'],
                            'accounter_tel' => $post['org_accounter_tel'],
                            'department_id' => $department->id,
                            'region_id' => $post['org_region'],
                            'district_id' => $post['org_district'],
                            'bank' => $post['org_bank'],
                            'bank_code' => $post['org_bank_code'],
                            'bank_account_number' => $post['org_bank_account_number'],
                            'fund' => $post['org_fund'],
                            'reg_num' => $post['org_reg_num'],
                            'reg_date' => date('Y-m-d H:i:s', strtotime($post['org_reg_date'])),
                            'add_info' => $post['org_add_field'],

//                            'ns10Code' => $org_tax_data['ns10Code'],
//                            'ns10Name' => $org_tax_data['ns10Name'],
//                            'ns11Code' => $org_tax_data['ns11Code'],
//                            'ns11Name' => $org_tax_data['ns11Name'],
//                            'name' => $org_tax_data['name'],
//                            'nameFull' => $org_tax_data['nameFull'],
//                            'address' => $org_tax_data['address'],
//                            'regNum' => $org_tax_data['regNum'],
//                            'regDate' => $org_tax_data['regDate'],
//                            'fund' => $org_tax_data['fund'],
//                            'gdFullName' => $org_tax_data['gdFullName'],
//                            'gdTin' => $org_tax_data['gdTin'],
//                            'gdTelWork' => $org_tax_data['gdTelWork'],
//                            'gdTelHome' => $org_tax_data['gdTelHome'],
//                            'gbFullName' => $org_tax_data['gbFullName'],
//                            'gbTin' => $org_tax_data['gbTin'],
//                            'gbTelWork' => $org_tax_data['gbTelWork'],
//                            'gbTelHome' => $org_tax_data['gbTelHome'],
                            'nc1Code' => $org_tax_data['nc1Code'],
                            'nc1Name' => $org_tax_data['nc1Name'],
                            'nc2Code' => $org_tax_data['nc2Code'],
                            'nc2Name' => $org_tax_data['nc2Name'],
                            'nc3Code' => $org_tax_data['nc3Code'],
                            'nc3Name' => $org_tax_data['nc3Name'],
                            'nc4Code' => $org_tax_data['nc4Code'],
                            'nc4Name' => $org_tax_data['nc4Name'],
                            'nc5Code' => $org_tax_data['nc5Code'],
                            'nc5Name' => $org_tax_data['nc5Name'],
                            'nc6Code' => $org_tax_data['nc6Code'],
                            'nc6Name' => $org_tax_data['nc6Name'],
                            'ns1Code' => $org_tax_data['ns1Code'],
                            'ns1Name' => $org_tax_data['ns1Name'],
                            'ns2Code' => $org_tax_data['ns2Code'],
                            'ns2Name' => $org_tax_data['ns2Name'],
                            'ns3Code' => $org_tax_data['ns3Code'],
                            'ns3Name' => $org_tax_data['ns3Name'],
                            'ns4Code' => $org_tax_data['ns4Code'],
                            'ns4Name' => $org_tax_data['ns4Name'],
                            'ns13Code' => $org_tax_data['ns13Code'],
                            'ns13Name' => $org_tax_data['ns13Name'],
                            'na1Code' => $org_tax_data['na1Code'],
                            'na1Name' => $org_tax_data['na1Name'],
//                            'account' => $org_tax_data['account'],
//                            'dateTin' => $org_tax_data['dateTin'],
//                            'tinHead' => $org_tax_data['tinHead'],
//                            'okpo' => $org_tax_data['okpo'],
//                            'mriCode' => $org_tax_data['mriCode'],
//                            'taxRegime' => $org_tax_data['taxRegime'],
                            'stateCode' => $org_tax_data['stateCode'],
                            'stateName' => $org_tax_data['stateName'],

                        ]);

                        $contragent->created_by = $user->id;
                        $contragent->updated_by = $user->id;

                        if (!$contragent->save()) {
                            $transaction->rollBack();
                            $errorMsg = $contragent->getErrors();
                            Yii::$app->session->setFlash('danger', $errorMsg);
                            throw new \Exception();
                        }
                    }
                } else {
                    $transaction->rollBack();
                    $errorMsg = $department->getErrors();
                    Yii::$app->session->setFlash('danger', $errorMsg);
                    throw new \Exception();
                }
                $transaction->commit();
                Yii::$app->session->setFlash('success', "Tashkilotingiz muvaffaqiyatli ro'yhatdan o'tdi. Agentlikdan akkauntingiz aktivlashtirilishini kuting.");
            } catch (\Exception $e) {
                $errorMsg = $e->getMessage();
            }

            $this->layout = 'main-login.php';
            $info = SystemStructura::find()->orderBy(['id' => SORT_DESC])->limit(1)->one();
            return $this->render('register-user', [
                'info' => $info,
                'errorMsg' => $errorMsg
            ]);
        } else {
            $this->redirect('login');
        }
    }

    public function actionCheckUser()
    {
        if (Yii::$app->request->isPost && $post = Yii::$app->request->post()) {
            $user = Users::find()->where(['username' => $post['username']])->asArray()->limit(1)->one();
        }
    }

    public function actionSoliqDataExample($param1 = null, $param2 = null, $param3 = null)
    {
        header('Content-Type: text/plain');
        $this->layout = false;
        $type = 2;
        if($type === 1) {
            $soliq = new MySoliq();
            $tins = [200349571, 301955170, 201891722, 200903659, 200851914];
//        $resp = $soliq->getSearchProductsCodes("Вино");
//        $resp = $soliq->getProducts(305089423, 'ru');

            $resp = $soliq->getProducts($tins[0], 'ru');
            print_r($resp);
            echo "\r\n";
            $resp = $soliq->getProducts($tins[0], 'uz');
            print_r($resp);
            echo "\r\n";
            print_r($resp->data);
            echo "\r\n";
            print_r($resp->getDataAsProductTypes());
            echo "\r\n";
            print_r($resp->getDataAsProductTypes()[1]);
        }
        if($type === 2) {
            $date = "01.02.2021";
            $delimeter = ".";
            $join = "-";
            if($param1 != null) {
                $date = $param1;
            }
            if($param2 != null) {
                $delimeter = $param2;
            }
            if($param3 != null) {
                $join = $param3;
            }
            return "$date converted to ".convertDateDdMmYyyyToYyyyMmDd($date, $delimeter, $join);
        }
        die();
    }

    public function actionTestSoliq()
    {
        if (Yii::$app->request->isGet) {
            $client = new Client();
            //Yii::$app->response->format = Response::FORMAT_JSON;
            // vdd(Yii::$app->request->get('tin'));
            switch (Yii::$app->request->get('type')) :
                case 'test':
                    $arr = [200349571,
                        301955170,
                        201891722,
                        200903659,
                        200851914,
                        202954024,
                        200672734,
                        303365026,
                        306856805,
                        200047964,
                        301040757,
                        201290655,
                        201291281,
                        301520586,
                        201538312,
                        200961517,
                        203740235,
                        301772320,
                        200730044,
                        200479972,
                        201887282,
                        300070981,
                        200441238,
                        200564488,
                        202273366,
                        202567735,
                        202282989,
                        203391852,
                        202159862,
                        203174647,
                        200452983,
                        200579089,
                        200605435,
                        200577234,
                        200570520,
                        202645582,
                        200547634,
                        200547738,
                        203303818,
                        203627975,
                        203025862,
                        200136308,
                        200408363,
                        302315143,
                        202419411,
                        206978102,
                        301088055,
                        300529645,
                        200485239,
                        304861595,
                        206922060,
                        200126834,
                        200240495,
                        200468069,
                        203665580,
                        202679699,
                        202634184,
                        202329888,
                        202986809,
                        200485239,
                        205756197,
                        205348640,
                        201864350,
                        205866772,
                        302998584,
                        206951484,
                        301397161,
                        306956790,
                        305545726,
                        301219183,
                        303129319,
                        303369280,
                        302749118,
                        302135447,
                        301912976,
                        305938283,
                        305513909,
                        306111750,
                        301607223,
                        300825998,
                        200145906,
                        304769369,
                        301670044,
                        300990178,
                        301952183,
                        305199587,
                        306592289,
                        200605292,
                        302933253,
                        303340414,
                        303276975,
                        305701373,
                        303613603,
                        202135394,
                        204757125,
                        305261559,
                        206793698,
                        301968162,
                        201175092,
                        304928620,
                        200599475,
                        303789614,
                        305452289,
                        302798310,
                        305329510,
                        201006261,
                        203202319,
                        305242067,
                        303929905,
                        200061648,
                        205768087,
                        303251714,
                        200136354,
                        304417552,
                        305146770,
                        304855959,
                        205442074,
                        200987017,
                        202890114,
                        203375737,
                        203941658,
                        204116954,
                        300969043,
                        301969991,
                        300192545,
                        200400461,
                        200367961,
                        205225232,
                        202897870,
                        203658035,
                        300159917,
                        301668909,
                        207219672,
                        303070537,
                        301443326,
                        307459284,
                        203627588,
                        203632456,
                        205040091,
                        301153537,
                        301531367,
                        203650671,
                        300040457,
                        301031783,
                        204080700,
                        305227646,
                        301307304,
                        307501462,
                        203526967,
                        204231306,
                        300898092,
                        303054397,
                        307442196,
                        305960836,
                        201926770,
                        203229085,
                        300076016,
                        303005583,
                        205102741,
                        207012891,
                        302348079,
                        203507490,
                        203609664,
                        301609268,
                        203640748,
                        204646912,
                        300376386,
                        203964312,
                        307491381,
                        307430156,
                        203430486,
                        203861006,
                        204339541,
                        204421590,
                        303367878,
                        307395216,
                        307402055,
                        300983178,
                        205691074,
                        300696961,
                        204173212,
                        300075215,
                        301691826,
                        200160707,
                        307432098,
                        202888146,
                        300387705,
                        300753075,
                        203818319,
                        205815391,
                        307469748,
                        307421809,
                        202924909,
                        203772346,
                        203825634,
                        203931020,
                        204721534,
                        301107821,
                        203174568,
                        204274062,
                        306188480,
                        307226661,
                        302354887,
                        305135642,
                        301554228,
                        307483977,
                        202902974,
                        203582829,
                        203517811,
                        203100588,
                        204132555,
                        203161995,
                        204766193,
                        302179463,
                        300222965,
                        300788815,
                        301416951,
                        303068387,
                        203784308,
                        205804144,
                        300038710,
                        307408774,
                        203554782,
                        301979884];
                    echo "<table>";
                    foreach ($arr as $r) {
                        $uri = 'https://my.soliq.uz/services/np1/yurbytin?tin='.$r;
                        $response = $client->request(
                            'GET',
                            $uri,
                            [
                                'auth' => [
                                    'alfainvest', '67bcf84a5dxe053cx50a$'
                                ]
                            ]
                        );
                        $data =  json_decode($response->getBody()->getContents(), true);
                        echo "<tr>";
                        foreach ($data as $k => $v) {
                            echo "<td>";
                            echo $k;
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>"; exit();
                    break;
                case 'yurbytin':
                    $tin = Yii::$app->request->get('tin');
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
                case 'ipak' :
                    $uri = 'https://mb.ipakyulibank.uz:2713/Mobile.svc/GetDoc1C';
                    $response = $client->request(
                        'POST',
                        $uri,
                        [
                            'auth' => [
                                'IB#ALFA1', 'ac988127$'
                            ],
                            'json' => [
                                "branch"=> "00444",
                                "account"=> "20208000012345678001",
                                "date"=> "25.03.2020"
                            ]
                        ]
                    );

                    echo "<pre>".$response->getBody(); exit(); // '{"id": 1420053, "name": "guzzle", ...}'
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


    public function onAuthSuccess($client)
    {
        echo "<pre>";
        print_r($client);
        echo "</pre>";
        die;
    }

    /**
     * @return string
     */
    public function actionRegister(){
        $this->layout = 'main-login.php';
        $model = new RegisterForm();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) ) {
            if ($model->validate()) {
                $user = new Users();
                $user->fullname = $model->full_name;
                $user->username = $model->username;
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
                $user->email = $model->email;
                $user->address = $model->address;
                $user->status = Users::STATUS_ACTIVE;
                $user->created_at = time();
                if ($user->save()) {
                    Yii::$app->user->login($user);
                    $this->goHome();
                }
            }
        }

        $info = SystemStructura::find()->orderBy(['id' => SORT_DESC])->limit(1)->one();
        return $this->render('register', [
            'model' => $model,
            'info' => $info,
        ]);
    }

    public function actionValidateRegister()
    {
        $model = new RegisterForm();
        $request = \Yii::$app->request;
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
}
