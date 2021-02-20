<?php
/**
 * @var $model
 * @var $errorMsg
 */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', "Мониторинг реализации инвестиционных проектов и исполнения государственных программ");
?>
    <div class="d-flex flex-column flex-root">
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
                 style="background-image: url('<?= Url::base(); ?>/asset/media/bg/bg-4.jpg');">
                <div class="container">
                    <div class="d-flex flex-center mb-10">
                        <a href="/">
                            <img src="<?= Url::base() ?>/asset/media/logos/logo-letter-1.png" class="max-h-75px"
                                 alt="<?= $info->img_login; ?>"/>
                        </a>
                    </div>
                    <div class="d-flex flex-center login-signin text-light">
                        <div class="mb-15">
                            <h2 class="text-center font-weight-normal"><?= Yii::t('app', 'Enter with your ESI key')?></h2>
                        </div>
                    </div>
                    <?php if ($errorMsg) : ?>
                    <div class="alert">
                        <div class="alert  alert-custom alert-danger" role="alert">
                            <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
                            <div class="alert-text"><?php echo $errorMsg; ?></div>
                        </div>
                    </div>
                    <?php endif ?>
                    <div id="message" class="d-flex flex-center"></div>
                    <form name="eri_form" method="post" action="">
                        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                        <select name="key"
                                onchange="cbChanged(this)"
                                class="hidden"></select>
                        <input type="hidden" name="fio" id="fio">
                        <input type="hidden" name="serial" id="uid">
                        <input type="hidden" name="tin" id="tin">
                        <input type="hidden" id="keyId" name="keyId">
                        <textarea name="pkcs7" id="pkcs7" class="hidden"></textarea>
                    </form>
                    <div class="row" id="esi_keys"></div>
                </div>
            </div>
        </div>
    </div>

<?php

$this->registerJsVar('fizlitso',  Yii::t('app', "Individual entity"));
$this->registerJsVar('yurlitso',  Yii::t('app', "Legal Entity"));
$this->registerJsVar('expireMessage',  Yii::t('app', "Your Certificate expired "));
$this->registerJsVar('btnChoose',  Yii::t('app', "Choose"));

$js = <<<JS

  var EIMZO_MAJOR = 3;
  var EIMZO_MINOR = 37;


  var errorCAPIWS = 'Ошибка соединения с E-IMZO. Возможно у вас не установлен модуль E-IMZO или Браузер E-IMZO.';
  var errorBrowserWS = 'Браузер не поддерживает технологию WebSocket. Установите последнюю версию браузера.';
  var errorUpdateApp = 'ВНИМАНИЕ !!! Установите новую версию приложения E-IMZO или Браузера E-IMZO.<br /><a href="https://e-imzo.uz/main/downloads/" role="button">Скачать ПО E-IMZO</a>';
  var errorWrongPassword = 'Пароль неверный.';


  var AppLoad = function () {
    EIMZOClient.API_KEYS = [
      'localhost', '96D0C1491615C82B9A54D9989779DF825B690748224C2B04F500F370D51827CE2644D8D4A82C18184D73AB8530BB8ED537269603F61DB0D03D2104ABF789970B',
      '127.0.0.1', 'A7BCFA5D490B351BE0754130DF03A068F855DB4333D43921125B9CF2670EF6A40370C646B90401955E1F7BC9CDBF59CE0B2C5467D820BE189C845D0B79CFC96F',
      'null',      'E0A205EC4E7B78BBB56AFF83A733A1BB9FD39D562E67978CC5E7D73B0951DB1954595A20672A63332535E13CC6EC1E1FC8857BB09E0855D7E76E411B6FA16E9D',
    ];
    uiLoading();
    EIMZOClient.checkVersion(function(major, minor){
      var newVersion = EIMZO_MAJOR * 100 + EIMZO_MINOR;
      var installedVersion = parseInt(major) * 100 + parseInt(minor);
      if(installedVersion < newVersion) {
        uiUpdateApp();
      } else {
        EIMZOClient.installApiKeys(function(){
          uiLoadKeys();
        },function(e, r){
          if(r){
            uiShowMessage(r);
          } else {
            wsError(e);
          }
        });
      }
    }, function(e, r){
      if(r){
        uiShowMessage(r);
      } else {
        uiNotLoaded(e);
      }
    });
  }
  
  var isLegalEntity = function (tin) {
    return (tin.charAt(0) === '2' || tin.charAt(0) === '3');
  };


  var uiShowMessage = function(message){
    alert(message);
  }

  var uiLoading = function(){
    var l = document.getElementById('message');
    l.innerHTML = 'Загрузка ...';
    l.style.color = 'red';
  }

  var uiNotLoaded = function(e){
    var l = document.getElementById('message');
    l.innerHTML = '';
    if (e) {
      wsError(e);
    } else {
      uiShowMessage(errorBrowserWS);
    }
  }

  var uiUpdateApp = function(){
    var l = document.getElementById('message');
    l.innerHTML = errorUpdateApp;
  }

  var uiLoadKeys = function(){
    uiClearCombo();
    EIMZOClient.listAllUserKeys(function(o, i){
      var itemId = o.serialNumber;
      return itemId;
    },function(itemId, v){
        //var uiItem = uiCreateItem(itemId, v);
      return uiCreateItem(itemId, v);
    },function(items, firstId){
      uiFillCombo(items);
      uiLoaded();
      uiComboSelect(firstId);
    },function(e, r){
      uiShowMessage(errorCAPIWS);
    });
  }

  var uiComboSelect = function(itm){
    if(itm){
      var id = document.getElementById(itm);
      id.setAttribute('selected','true');
    }
  }

  var cbChanged = function(c){
    document.getElementById('keyId').innerHTML = '';
  }

  var uiClearCombo = function(){
    var combo = document.eri_form.key;
    combo.length = 0;
    document.getElementById('esi_keys').innerHTML = '';
  }

  var uiFillCombo = function(items){
    var combo = document.eri_form.key;
    for (var itm in items) {
      combo.append(items[itm].itm);
      document.getElementById('esi_keys').innerHTML += items[itm].card;
    }
  }

  var uiLoaded = function(){
    var l = document.getElementById('message');
    l.innerHTML = '';
  }

  var uiCreateItem = function (itmkey, vo) {
    var returnableVal = {};
    var card = '<div class="col-xl-3">' +
     '<div class="card card-custom bgi-no-repeat card-stretch gutter-b" ' +
      'style="background-position: right top; background-size: 30% auto; background-image: url(/asset/media/svg/shapes/abstract-1.svg)">' +
       '<div class="card-body"><span class="svg-icon svg-icon-2x svg-icon-info">' +
        '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24" /><path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" /><path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" /></g></svg>' +
         '</span>';
    var btn = '';
    var now = new Date();
    vo.expired = dates.compare(now, vo.validTo) > 0;
    var itm = document.createElement("option");
    itm.value = itmkey;
    itm.text = vo.CN;
    card += '<span class="card-title font-weight-bolder text-dark-75 font-size-h5-md mb-0 mt-6 d-block">' +
     vo.CN +
      '</span>';
    card += '<div class="font-weight-bold text-muted font-size-sm mb-2">' +
     vo.TIN +
      '</div>';
    card += '<div class="font-weight-bold text-muted font-size-sm mb-2">' +
     (isLegalEntity(vo.TIN) ? yurlitso : fizlitso) +
      '</div>';
    
    if (vo.O) {
         card += '<div class="font-weight-bold text-muted font-size-sm mb-2">' +
         vo.O +
          '</div>';
    }
    
    if (!vo.expired) {
        btn = '<button type="button" onclick="chooseTheKey(\''+ itmkey +'\')" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;' +
            btnChoose + 
         '</button>';
    } else {
        card += '<div class="text-danger font-size-sm mb-2">' +
         expireMessage + vo.validTo.ddmmyyyy() +
          '</div>';
      itm.style.color = 'gray';
      itm.text = itm.text + ' (срок истек)';
    }
    
    card += btn;
    itm.setAttribute('vo',JSON.stringify(vo));
    itm.setAttribute('id',itmkey);
    returnableVal.itm = itm;
    returnableVal.card = card;
    //console.log(vo);
    return returnableVal;
  }

  var wsError = function (e) {
    if (e) {
      uiShowMessage(errorCAPIWS + " : " + e);
    } else {
      uiShowMessage(errorBrowserWS);
    }
  };
  
  var sign = function (itemId) {
    var formKey = document.eri_form.key;
    //console.log(formKey); return false;
    formKey.value = itemId;
    var itm = formKey.value;
    if (itm) {
      var id = document.getElementById(itm);
      var vo = JSON.parse(id.getAttribute('vo'));
      var data = 'authUser' + (Math.random()*1000);
      var keyId = document.getElementById('keyId').innerHTML;
      //console.log(vo);return false;
      if (vo.expired) {
          alert('Your Key is expired');
          return false;
      }
      document.getElementById('fio').value = vo.CN;
      document.getElementById('uid').value = vo.UID;
      document.getElementById('tin').value = vo.TIN;
      if(keyId){
        EIMZOClient.createPkcs7(keyId, data, null, function(pkcs7){
          document.eri_form.pkcs7.value = pkcs7;
        }, function(e, r){
          if(r){
            if (r.indexOf("BadPaddingException") != -1) {
              uiShowMessage(errorWrongPassword);
            } else {
              uiShowMessage(r);
            }
          } else {
            document.getElementById('keyId').innerHTML = '';
            uiShowMessage(errorBrowserWS);
          }
          if(e) wsError(e);
        });
      } else {
        EIMZOClient.loadKey(vo, function(id){
          document.getElementById('keyId').value = id;
          EIMZOClient.createPkcs7(id, data, null, function(pkcs7){
            document.eri_form.pkcs7.value = pkcs7;
            //console.log(document.eri_form.pkcs7.value);
            if (document.eri_form.pkcs7.value) {
                document.eri_form.submit();
            }
          }, function(e, r){
            if(r){
              if (r.indexOf("BadPaddingException") != -1) {
                uiShowMessage(errorWrongPassword);
              } else {
                uiShowMessage(r);
              }
            } else {
              document.getElementById('keyId').innerHTML = '';
              uiShowMessage(errorBrowserWS);
            }
            if(e) wsError(e);
          });
        }, function(e, r){
          if(r){
            if (r.indexOf("BadPaddingException") != -1) {
              uiShowMessage(errorWrongPassword);
            } else {
              uiShowMessage(r);
            }
          } else {
            uiShowMessage(errorBrowserWS);
          }
          if(e) wsError(e);
        });
      }
    } else {
        alert('Choose the key');
    }
  };
  
  var chooseTheKey = function(item) {
      sign(item);
  };

  window.onload = AppLoad;
JS;

$css = <<<CSS
    .hidden {
     display: none;
    }
CSS;



$this->registerJsFile("/esi/e-imzo.js");
$this->registerJsFile("/esi/e-imzo-client.js");
$this->registerJs($js, \yii\web\View::POS_END);
$this->registerCss($css);