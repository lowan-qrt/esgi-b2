<?php

class Player
{
    const MAX_DAILY_POINT = 3;

    public function __construct()
    {
        $this->points = self::MAX_DAILY_POINT;
    }
}