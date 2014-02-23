<?php

namespace TLD;

class Parser
{

    static public function Factory($raw)
    {
        return new static($raw);
    }

    protected $_raw;

    public function __construct($raw)
    {
        $this->_raw = $raw;
    }

}