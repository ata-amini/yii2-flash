<?php
    /**
     * Author: Ata amini
     * Email: ata.aminie@gmail.com
     * Date: 23/09/2017
     */

    namespace Wyno\Flash;


    use yii\base\Application;
    use yii\base\BootstrapInterface;

    class Bootstrap implements BootstrapInterface
    {

        /**
         * Bootstrap method to be called during application bootstrap stage.
         *
         * @param Application $app the application currently running
         */
        public function bootstrap($app)
        {
            \Yii::$container->set('Wyno\Flash\contracts\FlashSessionStore', 'Wyno\Flash\Store');

            // set as yii2 components
            $componentId = 'flash';
            if (!$app->has($componentId)) {
                $app->set($componentId, [
                    'class' => 'Wyno\Flash\FlashNotifier'
                ]);
            }
        }
    }