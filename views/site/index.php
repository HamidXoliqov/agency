<?php

use yii\helpers\Url;

$this->params['breadcrumbs'][0] = Yii::t('app', "Мониторинг реализации инвестиционных проектов и исполнения государственных программ");
?>
    <div class="card-header" style="height: 100%!important;">
    <div class="row text-center">
        <div class="col-sm-12">
            <div class="row mb-5">
                <div class="col-md-2"></div>
                <div class="col-md-8 mb-5 cursor-pointer">
                    <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                        <div class="card-body">
                            <a href="<?= Url::to(['/project/project'])?>">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-primary svg-icon-4x">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z" fill="#000000" fill-rule="nonzero" />
                                                    <path d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3"><?= Yii::t('app', "Управления проектами")?></div>
                                        <div class="text-dark-75"><?= Yii::t('app', "Управления проектами")?></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-8 mb-5 coming-soon cursor-pointer">
                    <div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-danger svg-icon-4x">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <polygon fill="#000000" opacity="0.3" points="12 20.0218549 8.47346039 21.7286168 6.86905972 18.1543453 3.07048824 17.1949849 4.13894342 13.4256452 1.84573388 10.2490577 5.08710286 8.04836581 5.3722735 4.14091196 9.2698837 4.53859595 12 1.72861679 14.7301163 4.53859595 18.6277265 4.14091196 18.9128971 8.04836581 22.1542661 10.2490577 19.8610566 13.4256452 20.9295118 17.1949849 17.1309403 18.1543453 15.5265396 21.7286168"/>
                                                    <polygon fill="#000000" points="14.0890818 8.60255815 8.36079737 14.7014391 9.70868621 16.049328 15.4369707 9.950447"/>
                                                    <path d="M10.8543431,9.1753866 C10.8543431,10.1252593 10.085524,10.8938719 9.13585777,10.8938719 C8.18793881,10.8938719 7.41737243,10.1252593 7.41737243,9.1753866 C7.41737243,8.22551387 8.18793881,7.45690126 9.13585777,7.45690126 C10.085524,7.45690126 10.8543431,8.22551387 10.8543431,9.1753866" fill="#000000" opacity="0.3"/>
                                                    <path d="M14.8641422,16.6221564 C13.9162233,16.6221564 13.1456569,15.8535438 13.1456569,14.9036711 C13.1456569,13.9520555 13.9162233,13.1851857 14.8641422,13.1851857 C15.8138085,13.1851857 16.5826276,13.9520555 16.5826276,14.9036711 C16.5826276,15.8535438 15.8138085,16.6221564 14.8641422,16.6221564 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3"><?= Yii::t('app', "Управления субсидиями")?></a>
                                    <div class="text-dark-75"><?= Yii::t('app', "Управления субсилиями")?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-8 mb-5 coming-soon cursor-pointer">
                    <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-success svg-icon-4x">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M12.9999711,21.0076775 C14.2768414,21.0908914 15.4225108,21.8450216 16,23 L8,23 C8.57748919,21.8450216 9.72315858,21.0908914 11.0000289,21.0076775 C11.0000096,21.0051206 11,21.0025614 11,21 L11,15.5 L13,15.5 L13,21 C13,21.0025614 12.9999904,21.0051206 12.9999711,21.0076775 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M8,4 L7.5,8 C13.5,8 16.5,8 16.5,8 C16.4375594,7.20614914 16.2708927,5.87281581 16,4 L8,4 Z M8.28594472,2 L15.7140072,2 C16.9470152,2 17.9721494,2.92839923 18.0667168,4.13070039 L18.5415132,10.1671184 C18.816379,13.6616787 16.142506,16.712495 12.5692506,16.9813073 C12.4036601,16.9937645 12.2376417,17 12.071562,17 L11.9283899,17 C8.34457839,17 5.43932511,14.1587301 5.43932511,10.6538462 C5.43932511,10.4914241 5.44570102,10.329062 5.45843875,10.1671184 L5.9332352,4.13070039 C6.0278026,2.92839923 7.05293673,2 8.28594472,2 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3"><?= Yii::t('app', "Распределение спиртов")?></a>
                                    <div class="text-dark-75"><?= Yii::t('app', "Распределение спиртов")?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>

