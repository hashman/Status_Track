<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    use Track\Track;

    // test for unlog mode
    $track = new Track();
    // test for log mode
    //$track = new Track('Hash Test Program', true);
    for ($i = 0; $i<5; $i++) {
        for ($j = 0; $j<10000000; $j++) {}
        $track->addCheckPoint("Run {$i} Time");
    }
    $track->finish();