<?php
    /**
     * Author: Ata amini
     * Email: ata.aminie@gmail.com
     * Date: 23/09/2017
     */

    if (!function_exists('flash')) {
        /**
         * flash messages
         * @return \Wyno\Flash\FlashNotifier
         */
        function flash()
        {
            return \Yii::$container->get('Wyno\Flash\FlashNotifier');
        }
    }