<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\components\esi;

use yii\authclient\OAuth2;

/**
 * Yandex allows authentication via Yandex OAuth.
 *
 * In order to use Yandex OAuth you must register your application at <https://oauth.yandex.ru/client/new>.
 *
 * Example application configuration:
 *
 * ```php
 * 'components' => [
 *     'authClientCollection' => [
 *         'class' => 'yii\authclient\Collection',
 *         'clients' => [
 *             'yandex' => [
 *                 'class' => 'app\components\esi\EsiAuthClient',
 *                 'clientId' => 'esi_client_id',
 *                 'clientSecret' => 'esi_client_secret',
 *             ],
 *         ],
 *     ]
 *     // ...
 * ]
 * ```
 *
 * @see https://esi.uz/
 * @see https://esi.uz/index/how/connect
 * @see https://esi.uz/index/for/developers
 *
 * @author Bahriddin Muminov <darkshadeuz@gmail.com>
 * @since 0.1
 */
class EsiAuthClient extends OAuth2
{
    /**
     * {@inheritdoc}
     */
    public $authUrl = 'https://esi.uz/oauth2/authorize?client_id=DDC4C58F72833CCC&scope=public-info+certificate-info&response_type=code&state={"custom":"state"}&redirect_uri=http://alcotabac.uz';
    /**
     * {@inheritdoc}
     */
    public $tokenUrl = 'https://esi.uz/oauth2/token';
    /**
     * {@inheritdoc}
     */
    public $apiBaseUrl = 'https://esi.uz/oauth2/api?get=public-info';


    /**
     * {@inheritdoc}
     */
    protected function initUserAttributes()
    {
        return $this->api('info', 'GET');
    }

    /**
     * {@inheritdoc}
     */
    public function applyAccessTokenToRequest($request, $accessToken)
    {
        $data = $request->getData();
        if (!isset($data['format'])) {
            $data['format'] = 'json';
        }
        $data['oauth_token'] = $accessToken->getToken();
        $request->setData($data);
    }

    /**
     * {@inheritdoc}
     */
    protected function defaultName()
    {
        return 'esi';
    }

    /**
     * {@inheritdoc}
     */
    protected function defaultTitle()
    {
        return 'ESI';
    }
}
