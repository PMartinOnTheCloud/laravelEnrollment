<?php
namespace App\Logging;
// use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

class MySQLLoggingHandler extends AbstractProcessingHandler{
/**
 *
 * Reference:
 * https://github.com/markhilton/monolog-mysql/blob/master/src/Logger/Monolog/Handler/MysqlHandler.php
 */
    public function __construct($level = Logger::DEBUG, $bubble = true) {
        $this->table = 'logs';
        parent::__construct($level, $bubble);
    }
    protected function write(array $record):void
    {
       $data = array(
           'user_id' => $record['context']['user_id'],
           'message' => $record['message'],
           'level' => $record['level'],
           'time_action_realized' => now()
       );

       DB::connection()->table($this->table)->insert($data);
    }
}
