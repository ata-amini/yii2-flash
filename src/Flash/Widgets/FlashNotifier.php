<?php
    /**
     * Author: Ata amini
     * Email: ata.aminie@gmail.com
     * Date: 23/09/2017
     */

    namespace Wyno\Flash\Widgets;

    /**
     * Class FlashMessages
     * @package common\widgets
     */
    class FlashNotifier extends \yii\bootstrap\Widget
    {
        /**
         * @var array the alert types configuration for the flash messages.
         * This array is setup as $key => $value, where:
         * - $key is the name of the session flash variable
         * - $value is the bootstrap alert type (i.e. danger, success, info, warning)
         */
        public $alertTypes = [
            'error'   => 'alert-danger',
            'danger'  => 'alert-danger',
            'success' => 'alert-success',
            'info'    => 'alert-info',
            'warning' => 'alert-warning'
        ];
        /**
         * @var array the options for rendering the close button tag.
         */
        public $closeButton = [];


        public function init()
        {
            parent::init();

            $flashes = flash()->all();
            $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

            foreach ($flashes as $type => $data) {
                if (isset($this->alertTypes[$type])) {
                    $data = (array)$data;
                    foreach ($data as $i => $message) {
                        /* initialize css class for each alert box */
                        $this->options['class'] = $this->alertTypes[$type] . $appendCss;

                        /* assign unique id to each alert box */
                        $this->options['id'] = $this->getId() . '-' . $type . '-' . $i;

                        echo \yii\bootstrap\Alert::widget([
                            'body'        => $message,
                            'closeButton' => $this->closeButton,
                            'options'     => $this->options,
                        ]);
                    }
                }
            }
        }
    }
