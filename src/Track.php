<?php
    namespace Track;

    /**
     * ********************************
     * * Program start at 11:23:10
     * ********************************
     *
     * Start DB query ...
     * End DB query ... take 5 minutes 10 second
     * Start Collection ...
     * End Collection ... take 50 second
     *
     * ********************************
     * * Program end at 11:29:10
     * *
     * * DB query : 86 %
     * * Collection : 14 %
     * ********************************
     */

    class Track
    {
        private $_start_time;
        private $_total_second;
        private $_current_time;
        private $_msg;
        /*
         * $data = [[name => 'DB query', 'time' => '11:29:10']]
         */
        private $_data = [];

        public function __construct($msg = 'Program start')
        {
            $this->_start_time = time();
            $this->_msg = $msg;
            echo "********************************\n";
            echo "* {$this->_msg} at {$this->returnTime($this->_start_time)}\n";
            echo "********************************\n";
            $this->_current_time = $this->_start_time;
            $this->dataArrayInsert($msg, $this->_start_time);
        }

        public function addCheckPoint($msg = 'Runs')
        {
            $this->dataArrayInsert($msg, time());
            echo $msg . ": " . $this->convertResponseTime(time() - $this->_current_time)."\n";
            $this->_current_time = time();
        }

        public function finish()
        {
            $this->_total_second = time() - $this->_start_time;
            echo "********************************\n";
            echo "* {$this->_msg} End at {$this->returnTime(time())}\n";
            echo "*\n*\n";
            for ($i = 1; $i < count($this->_data); $i++) {
                echo "* {$this->_data[$i]['name']} : {$this->countPercentage($this->_data[$i]['time'] - $this->_data[$i - 1]['time'])} %\n";
            }
            echo "********************************\n";
        }

        private function countPercentage($take_time)
        {
            return number_format(($take_time / $this->_total_second) * 100, 2);
        }

        private function returnTime($time)
        {
            return date("H:i:s", $time);
        }

        private function dataArrayInsert($name, $time)
        {
            array_push($this->_data, ['name' => $name, 'time' => $time]);
        }

        private function convertResponseTime($time)
        {
            if ($time < 60) {
                return "{$time} seconds";
            }

            $second = $time % 60;
            $minute = floor($time / 60);

            if ($minute < 60) {
                return "{$minute} minutes {$second} seconds";
            }

            $minute = $minute % 60;
            $hour = floor($minute / 60);

            return "{$hour} hours {$minute} minutes {$second} seconds";
        }
    }