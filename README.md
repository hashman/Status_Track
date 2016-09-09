# PHP Track Status Log

## Author

* Hashman
* Blog: [http://coosos.blogspot.tw/](http://coosos.blogspot.tw/)
* Blog: [http://hashman-blog.logdown.com/](http://hashman-blog.logdown.com/)

## Change Log

* 2016.09.09
    1. Track Status Log main function

## Usage

### How to use

- sample code

```php
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
```

### Result
```
********************************
* Program start at 08:28:03
********************************
Run 0 Time: 1 seconds
Run 1 Time: 1 seconds
Run 2 Time: 1 seconds
Run 3 Time: 1 seconds
Run 4 Time: 1 seconds
********************************
* Program start End at 08:28:08
* Run 0 Time : 20.00 %
* Run 1 Time : 20.00 %
* Run 2 Time : 20.00 %
* Run 3 Time : 20.00 %
* Run 4 Time : 20.00 %
********************************
```