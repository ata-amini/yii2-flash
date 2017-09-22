<?php
    /**
     * Author: Ata amini
     * Email: ata.aminie@gmail.com
     * Date: 22/09/2017
     */

    namespace Wyno\Flash;

    use Wyno\Flash\contracts\FlashSessionStore;

    /**
     * set flash messages
     * Class FlashNotifier
     * @package Wyno\Flash
     * @Author  =  Ata amini
     * @Email   = ata.aminie@gmail.com
     */
    class FlashNotifier
    {
        /** @var FlashSessionStore */
        private $flash;
        private $sessionKey = 'flash_messages_notifications';
        private $infoKey = 'info';
        private $successKey = 'success';
        private $errorKey = 'error';
        private $warningKey = 'warning';

        /**
         * FlashNotifier constructor.
         *
         * @param FlashSessionStore $flashSessionStore
         */
        public function __construct(FlashSessionStore $flashSessionStore)
        {
            // set flasher
            $this->flash = $flashSessionStore;
        }

        /**
         * get all flashes messages and forget
         * @return array[]
         */
        public function all()
        {
            return (array)$this->flash->pull($this->sessionKey, []);
        }

        /**
         * get flash messages count
         * @return int
         */
        public function count()
        {
            return count((array)$this->flash->get($this->sessionKey, []));
        }

        /**
         * append flash messages to already existence flashes messages
         *
         * @param $level
         * @param $message
         *
         * @internal param array $notification
         */
        protected function push($level, $message)
        {
            // get all messages in flash
            $flashNotifications = $this->all();

            // ensure message level already exists
            if (!isset($flashNotifications[$level]))
                $flashNotifications[$level] = [];

            // get level content messages
            $messages = (array)$flashNotifications[$level];
            $messages[] = $message;

            // append message
            $flashNotifications[$level] = $messages;

            // store flash
            $this->flash->set($this->sessionKey, $flashNotifications);
        }

        /**
         * flash a general message
         *
         * @param  string      $message
         * @param  null|string $level
         *
         * @return $this
         */
        public function message($message, $level = null)
        {
            // set messages default level
            if (is_null($level))
                $level = $this->infoKey;

            // push message
            $this->push($level, $message);
            return $this;
        }

        /**
         * flash an information message
         *
         * @param  string $message
         *
         * @return $this
         */
        public function info($message)
        {
            $this->message($message, $this->infoKey);
            return $this;
        }


        /**
         * flash a success message
         *
         * @param  string $message
         *
         * @return $this
         */
        public function success($message)
        {
            $this->message($message, $this->successKey);
            return $this;
        }

        /**
         * flash an error message
         *
         * @param  string $message
         *
         * @return $this
         */
        public function error($message)
        {
            $this->message($message, $this->errorKey);
            return $this;
        }


        /**
         * flash a warning message
         *
         * @param  string $message
         *
         * @return $this
         */
        public function warning($message)
        {
            $this->message($message, $this->warningKey);
            return $this;
        }
    }