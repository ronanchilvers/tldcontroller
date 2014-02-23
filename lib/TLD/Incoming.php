<?php

namespace TLD;

class Incoming
{

    const STATUS_NEW        = 'new';
    const STATUS_PARSED     = 'parsed';

    static public function ParseNew()
    {
        $result = \ORM::forTable('incoming_errors')
                    ->where('incoming_status', static::STATUS_NEW)
                    ->findMany()
                    ;

        // START TRANS HERE

        foreach ($result as $record)
        {
            $parser = Parser::Factory($record->get('incoming_raw'));

            // @TODO Remove var_dump
            echo '<pre>'; var_dump($parser); exit();
        }

        // END TRANS HERE
    }

}