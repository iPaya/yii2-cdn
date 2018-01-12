<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 */

namespace iPaya\Yii2\Cdn;


interface ProviderInterface
{
    /**
     * @return array
     */
    public function getBundles();
}
