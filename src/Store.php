<?php
    /**
     * Author: Ata amini
     * Email: ata.aminie@gmail.com
     * Date: 22/09/2017
     */

    namespace Wyno\Flash;

    use Wyno\Flash\contracts\FlashSessionStore;

    class Store implements FlashSessionStore
    {
        /**
         * @var \yii\web\Session
         */
        private $session;

        /**
         * Store constructor.
         */
        public function __construct()
        {
            $this->session = \Yii::$app->session;
        }

        /**
         * flash a message to the session
         *
         * @param string $name
         * @param array  $data
         */
        public function set($name, $data)
        {
            $this->session->setFlash($name, $data);
        }

        /**
         * get the value of a given key
         *
         * @param string $name
         * @param mixed  $default
         */
        public function get($name, $default)
        {
            $this->session->get($name, $default);
        }

        /**
         *  get the value of a given key and then forget it.
         *
         * @param $name
         * @param $default
         *
         * @return mixed
         */
        public function pull($name, $default)
        {
            return $this->session->getFlash($name, $default, true);
        }
    }