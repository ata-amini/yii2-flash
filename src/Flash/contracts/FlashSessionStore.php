<?php
    /**
     * Author: Ata amini
     * Email: ata.aminie@gmail.com
     * Date: 22/09/2017
     */

    namespace Wyno\Flash\contracts;

    /**
     * Interface FlashSessionStore
     * @package Wyno\Flash\contracts
     */
    interface FlashSessionStore
    {
        /**
         * flash a message to the session
         *
         * @param string $name
         * @param array  $data
         */
        public function set($name, $data);

        /**
         * get the value of a given key
         *
         * @param string $name
         * @param mixed  $default
         */
        public function get($name, $default);

        /**
         *  get the value of a given key and then forget it.
         *
         * @param $name
         * @param $default
         *
         * @return mixed
         */
        public function pull($name, $default);
    }