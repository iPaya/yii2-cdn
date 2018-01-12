<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 */

namespace iPaya\Yii2\Cdn;


use yii\base\NotSupportedException;

class Component extends \yii\base\Component
{
    /**
     * @var string[]
     */
    public $bundles = [];

    /**
     * @var string|array|ProviderInterface
     */
    public $provider = 'iPaya\Yii2\Cdn\BootCdnProvider';


    public function init()
    {
        if (is_string($this->provider) || is_array($this->provider)) {
            $this->provider = \Yii::createObject($this->provider);
        }

        if (!$this->provider instanceof ProviderInterface) {
            throw new NotSupportedException('provider must implement "iPaya\Yii2\Cdn\ProviderInterface".');
        }

        $provideBundles = $this->provider->getBundles();

        foreach ($this->bundles as $bundle) {
            if (!isset($provideBundles[$bundle])) {
                throw new NotSupportedException("the provider does not provide \"$bundle\" cdn service.");
            }
            $bundleOptions = $provideBundles[$bundle];
            $bundleOptions['sourcePath'] = null;

            $this->registerBundle($bundle, $bundleOptions);
        }
    }

    /**
     * @param string $bundleName
     * @param array $bundleOptions
     */
    protected function registerBundle($bundleName, array $bundleOptions)
    {
        \Yii::$container->set($bundleName, $bundleOptions);
    }
}
