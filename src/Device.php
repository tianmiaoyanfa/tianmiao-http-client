<?php

declare(strict_types=1);
/**
 * This file is part of Leonsw.
 *
 * @link     https://leonsw.com
 * @document https://docs.leonsw.com
 * @contact  leonsw.com@gmail.com
 * @license  https://leonsw.com/LICENSE
 */
namespace Leonsw\HttpClient;

class Device
{
    private static $devices = [
        'Blackberry PlayBook' => [
            'name' => 'Blackberry PlayBook',
            'userAgent' => 'Mozilla/5.0 (PlayBook; U; RIM Tablet OS 2.1.0; en-US) AppleWebKit/536.2+ (KHTML like Gecko) Version/7.2.1.0 Safari/536.2+',
            'viewport' => [
                'width' => 600,
                'height' => 1024,
                'deviceScaleFactor' => 1,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Blackberry PlayBook landscape' => [
            'name' => 'Blackberry PlayBook landscape',
            'userAgent' => 'Mozilla/5.0 (PlayBook; U; RIM Tablet OS 2.1.0; en-US) AppleWebKit/536.2+ (KHTML like Gecko) Version/7.2.1.0 Safari/536.2+',
            'viewport' => [
                'width' => 1024,
                'height' => 600,
                'deviceScaleFactor' => 1,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'BlackBerry Z30' => [
            'name' => 'BlackBerry Z30',
            'userAgent' => 'Mozilla/5.0 (BB10; Touch) AppleWebKit/537.10+ (KHTML, like Gecko) Version/10.0.9.2372 Mobile Safari/537.10+',
            'viewport' => [
                'width' => 360,
                'height' => 640,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'BlackBerry Z30 landscape' => [
            'name' => 'BlackBerry Z30 landscape',
            'userAgent' => 'Mozilla/5.0 (BB10; Touch) AppleWebKit/537.10+ (KHTML, like Gecko) Version/10.0.9.2372 Mobile Safari/537.10+',
            'viewport' => [
                'width' => 640,
                'height' => 360,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Galaxy Note 3' => [
            'name' => 'Galaxy Note 3',
            'userAgent' => 'Mozilla/5.0 (Linux; U; Android 4.3; en-us; SM-N900T Build/JSS15J) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
            'viewport' => [
                'width' => 360,
                'height' => 640,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Galaxy Note 3 landscape' => [
            'name' => 'Galaxy Note 3 landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; U; Android 4.3; en-us; SM-N900T Build/JSS15J) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
            'viewport' => [
                'width' => 640,
                'height' => 360,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Galaxy Note II' => [
            'name' => 'Galaxy Note II',
            'userAgent' => 'Mozilla/5.0 (Linux; U; Android 4.1; en-us; GT-N7100 Build/JRO03C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
            'viewport' => [
                'width' => 360,
                'height' => 640,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Galaxy Note II landscape' => [
            'name' => 'Galaxy Note II landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; U; Android 4.1; en-us; GT-N7100 Build/JRO03C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
            'viewport' => [
                'width' => 640,
                'height' => 360,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Galaxy S III' => [
            'name' => 'Galaxy S III',
            'userAgent' => 'Mozilla/5.0 (Linux; U; Android 4.0; en-us; GT-I9300 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
            'viewport' => [
                'width' => 360,
                'height' => 640,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Galaxy S III landscape' => [
            'name' => 'Galaxy S III landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; U; Android 4.0; en-us; GT-I9300 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
            'viewport' => [
                'width' => 640,
                'height' => 360,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Galaxy S5' => [
            'name' => 'Galaxy S5',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 360,
                'height' => 640,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Galaxy S5 landscape' => [
            'name' => 'Galaxy S5 landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 640,
                'height' => 360,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPad' => [
            'name' => 'iPad',
            'userAgent' => 'Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1',
            'viewport' => [
                'width' => 768,
                'height' => 1024,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPad landscape' => [
            'name' => 'iPad landscape',
            'userAgent' => 'Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1',
            'viewport' => [
                'width' => 1024,
                'height' => 768,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPad Mini' => [
            'name' => 'iPad Mini',
            'userAgent' => 'Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1',
            'viewport' => [
                'width' => 768,
                'height' => 1024,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPad Mini landscape' => [
            'name' => 'iPad Mini landscape',
            'userAgent' => 'Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1',
            'viewport' => [
                'width' => 1024,
                'height' => 768,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPad Pro' => [
            'name' => 'iPad Pro',
            'userAgent' => 'Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1',
            'viewport' => [
                'width' => 1024,
                'height' => 1366,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPad Pro landscape' => [
            'name' => 'iPad Pro landscape',
            'userAgent' => 'Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1',
            'viewport' => [
                'width' => 1366,
                'height' => 1024,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPhone 4' => [
            'name' => 'iPhone 4',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_2 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D257 Safari/9537.53',
            'viewport' => [
                'width' => 320,
                'height' => 480,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPhone 4 landscape' => [
            'name' => 'iPhone 4 landscape',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_2 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D257 Safari/9537.53',
            'viewport' => [
                'width' => 480,
                'height' => 320,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPhone 5' => [
            'name' => 'iPhone 5',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14E304 Safari/602.1',
            'viewport' => [
                'width' => 320,
                'height' => 568,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPhone 5 landscape' => [
            'name' => 'iPhone 5 landscape',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14E304 Safari/602.1',
            'viewport' => [
                'width' => 568,
                'height' => 320,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPhone 6' => [
            'name' => 'iPhone 6',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 375,
                'height' => 667,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPhone 6 landscape' => [
            'name' => 'iPhone 6 landscape',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 667,
                'height' => 375,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPhone 6 Plus' => [
            'name' => 'iPhone 6 Plus',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 414,
                'height' => 736,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPhone 6 Plus landscape' => [
            'name' => 'iPhone 6 Plus landscape',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 736,
                'height' => 414,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPhone 7' => [
            'name' => 'iPhone 7',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 375,
                'height' => 667,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPhone 7 landscape' => [
            'name' => 'iPhone 7 landscape',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 667,
                'height' => 375,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPhone 7 Plus' => [
            'name' => 'iPhone 7 Plus',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 414,
                'height' => 736,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPhone 7 Plus landscape' => [
            'name' => 'iPhone 7 Plus landscape',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 736,
                'height' => 414,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPhone 8' => [
            'name' => 'iPhone 8',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 375,
                'height' => 667,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPhone 8 landscape' => [
            'name' => 'iPhone 8 landscape',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 667,
                'height' => 375,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPhone 8 Plus' => [
            'name' => 'iPhone 8 Plus',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 414,
                'height' => 736,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPhone 8 Plus landscape' => [
            'name' => 'iPhone 8 Plus landscape',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 736,
                'height' => 414,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPhone SE' => [
            'name' => 'iPhone SE',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14E304 Safari/602.1',
            'viewport' => [
                'width' => 320,
                'height' => 568,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPhone SE landscape' => [
            'name' => 'iPhone SE landscape',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14E304 Safari/602.1',
            'viewport' => [
                'width' => 568,
                'height' => 320,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'iPhone X' => [
            'name' => 'iPhone X',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 375,
                'height' => 812,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'iPhone X landscape' => [
            'name' => 'iPhone X landscape',
            'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'viewport' => [
                'width' => 812,
                'height' => 375,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Kindle Fire HDX' => [
            'name' => 'Kindle Fire HDX',
            'userAgent' => 'Mozilla/5.0 (Linux; U; en-us; KFAPWI Build/JDQ39) AppleWebKit/535.19 (KHTML, like Gecko) Silk/3.13 Safari/535.19 Silk-Accelerated=true',
            'viewport' => [
                'width' => 800,
                'height' => 1280,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Kindle Fire HDX landscape' => [
            'name' => 'Kindle Fire HDX landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; U; en-us; KFAPWI Build/JDQ39) AppleWebKit/535.19 (KHTML, like Gecko) Silk/3.13 Safari/535.19 Silk-Accelerated=true',
            'viewport' => [
                'width' => 1280,
                'height' => 800,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'LG Optimus L70' => [
            'name' => 'LG Optimus L70',
            'userAgent' => 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-us; LGMS323 Build/KOT49I.MS32310c) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 384,
                'height' => 640,
                'deviceScaleFactor' => 1.25,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'LG Optimus L70 landscape' => [
            'name' => 'LG Optimus L70 landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-us; LGMS323 Build/KOT49I.MS32310c) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 640,
                'height' => 384,
                'deviceScaleFactor' => 1.25,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Microsoft Lumia 550' => [
            'name' => 'Microsoft Lumia 550',
            'userAgent' => 'Mozilla/5.0 (Windows Phone 10.0; Android 4.2.1; Microsoft; Lumia 550) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Mobile Safari/537.36 Edge/14.14263',
            'viewport' => [
                'width' => 640,
                'height' => 360,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Microsoft Lumia 950' => [
            'name' => 'Microsoft Lumia 950',
            'userAgent' => 'Mozilla/5.0 (Windows Phone 10.0; Android 4.2.1; Microsoft; Lumia 950) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Mobile Safari/537.36 Edge/14.14263',
            'viewport' => [
                'width' => 360,
                'height' => 640,
                'deviceScaleFactor' => 4,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Microsoft Lumia 950 landscape' => [
            'name' => 'Microsoft Lumia 950 landscape',
            'userAgent' => 'Mozilla/5.0 (Windows Phone 10.0; Android 4.2.1; Microsoft; Lumia 950) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Mobile Safari/537.36 Edge/14.14263',
            'viewport' => [
                'width' => 640,
                'height' => 360,
                'deviceScaleFactor' => 4,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Nexus 10' => [
            'name' => 'Nexus 10',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 10 Build/MOB31T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Safari/537.36',
            'viewport' => [
                'width' => 800,
                'height' => 1280,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Nexus 10 landscape' => [
            'name' => 'Nexus 10 landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 10 Build/MOB31T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Safari/537.36',
            'viewport' => [
                'width' => 1280,
                'height' => 800,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Nexus 4' => [
            'name' => 'Nexus 4',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 4.4.2; Nexus 4 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 384,
                'height' => 640,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Nexus 4 landscape' => [
            'name' => 'Nexus 4 landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 4.4.2; Nexus 4 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 640,
                'height' => 384,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Nexus 5' => [
            'name' => 'Nexus 5',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 360,
                'height' => 640,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Nexus 5 landscape' => [
            'name' => 'Nexus 5 landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 640,
                'height' => 360,
                'deviceScaleFactor' => 3,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Nexus 5X' => [
            'name' => 'Nexus 5X',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 8.0.0; Nexus 5X Build/OPR4.170623.006) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 412,
                'height' => 732,
                'deviceScaleFactor' => 2.625,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Nexus 5X landscape' => [
            'name' => 'Nexus 5X landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 8.0.0; Nexus 5X Build/OPR4.170623.006) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 732,
                'height' => 412,
                'deviceScaleFactor' => 2.625,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Nexus 6' => [
            'name' => 'Nexus 6',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 7.1.1; Nexus 6 Build/N6F26U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 412,
                'height' => 732,
                'deviceScaleFactor' => 3.5,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Nexus 6 landscape' => [
            'name' => 'Nexus 6 landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 7.1.1; Nexus 6 Build/N6F26U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 732,
                'height' => 412,
                'deviceScaleFactor' => 3.5,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Nexus 6P' => [
            'name' => 'Nexus 6P',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 8.0.0; Nexus 6P Build/OPP3.170518.006) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 412,
                'height' => 732,
                'deviceScaleFactor' => 3.5,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Nexus 6P landscape' => [
            'name' => 'Nexus 6P landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 8.0.0; Nexus 6P Build/OPP3.170518.006) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 732,
                'height' => 412,
                'deviceScaleFactor' => 3.5,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Nexus 7' => [
            'name' => 'Nexus 7',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 7 Build/MOB30X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Safari/537.36',
            'viewport' => [
                'width' => 600,
                'height' => 960,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Nexus 7 landscape' => [
            'name' => 'Nexus 7 landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 7 Build/MOB30X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Safari/537.36',
            'viewport' => [
                'width' => 960,
                'height' => 600,
                'deviceScaleFactor' => 2,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Nokia Lumia 520' => [
            'name' => 'Nokia Lumia 520',
            'userAgent' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows Phone 8.0; Trident/6.0; IEMobile/10.0; ARM; Touch; NOKIA; Lumia 520)',
            'viewport' => [
                'width' => 320,
                'height' => 533,
                'deviceScaleFactor' => 1.5,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Nokia Lumia 520 landscape' => [
            'name' => 'Nokia Lumia 520 landscape',
            'userAgent' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows Phone 8.0; Trident/6.0; IEMobile/10.0; ARM; Touch; NOKIA; Lumia 520)',
            'viewport' => [
                'width' => 533,
                'height' => 320,
                'deviceScaleFactor' => 1.5,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Nokia N9' => [
            'name' => 'Nokia N9',
            'userAgent' => 'Mozilla/5.0 (MeeGo; NokiaN9) AppleWebKit/534.13 (KHTML, like Gecko) NokiaBrowser/8.5.0 Mobile Safari/534.13',
            'viewport' => [
                'width' => 480,
                'height' => 854,
                'deviceScaleFactor' => 1,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Nokia N9 landscape' => [
            'name' => 'Nokia N9 landscape',
            'userAgent' => 'Mozilla/5.0 (MeeGo; NokiaN9) AppleWebKit/534.13 (KHTML, like Gecko) NokiaBrowser/8.5.0 Mobile Safari/534.13',
            'viewport' => [
                'width' => 854,
                'height' => 480,
                'deviceScaleFactor' => 1,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Pixel 2' => [
            'name' => 'Pixel 2',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 411,
                'height' => 731,
                'deviceScaleFactor' => 2.625,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Pixel 2 landscape' => [
            'name' => 'Pixel 2 landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 731,
                'height' => 411,
                'deviceScaleFactor' => 2.625,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
        'Pixel 2 XL' => [
            'name' => 'Pixel 2 XL',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 411,
                'height' => 823,
                'deviceScaleFactor' => 3.5,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => false,
            ],
        ],
        'Pixel 2 XL landscape' => [
            'name' => 'Pixel 2 XL landscape',
            'userAgent' => 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3679.0 Mobile Safari/537.36',
            'viewport' => [
                'width' => 823,
                'height' => 411,
                'deviceScaleFactor' => 3.5,
                'isMobile' => true,
                'hasTouch' => true,
                'isLandscape' => true,
            ],
        ],
    ];

    public static function getDevice(string $name)
    {
        return static::$devices[$name] ?? null;
    }

    public static function getUserAgent(string $name)
    {
        $userAgent = static::getDevice($name);
        return $userAgent['userAgent'] ?? null;
    }

    public static function getRandomUserAgent()
    {
        $name = array_rand(static::$devices);
        return static::getUserAgent($name);
    }
}
