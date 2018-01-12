<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 */

namespace iPaya\Yii2\Cdn;


class BootCdnProvider implements ProviderInterface
{
    public $baseUrl = 'https://cdn.bootcss.com';

    /**
     * @return array
     */
    public function getBundles()
    {
        return [
            'yii\web\JqueryAsset' => [
                'baseUrl' => $this->baseUrl . '/jquery/2.2.4',
            ],
            'yii\bootstrap\BootstrapAsset' => [
                'baseUrl' => $this->baseUrl . '/bootstrap/3.3.7',
            ],
            'yii\bootstrap\BootstrapPluginAsset' => [
                'baseUrl' => $this->baseUrl . '/bootstrap/3.3.7',
            ]
        ];
    }

}
