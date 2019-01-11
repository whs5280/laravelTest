<?php

return [
    'pay' => [
        // APPID
        'app_id' => '2016092500593434',
        // 支付宝 支付成功后 主动通知商户服务器地址  注意 是post请求
        'notify_url' => 'http://localhost:8081/api/home/ali_pay_ntify',
        // 支付宝 支付成功后 回调页面 get
        'return_url' => 'http://localhost:8081/#/pay_success',
        // 公钥（注意是支付宝的公钥，不是商家应用公钥）
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA1WP5ubu9pDEOdWue4IvJNKPxPk8+0tfiHYz7CgaGgaGl/ZeWhspqAiC6XsostjWAlV9f0pmyddwwQehKjJEKJSeYDFEyCgO8iJ4Sfue+ALDLolpfNUDSPJG9qUnzVJVAVN2T7vvmnAfvb/kUM1r81tfQLuIVO+Fybf7thpvzyWp4Vadq79OBptZreRLDc6uWXUhgvbHbDhP8JWWKP8TSJWVtLxmXC3ghAcZOMqh/jAZpbc4MYoNaN50we1oFa/+foMpt+bHq/bez9QcekThBez4suU8MXdEZj8Yq1EmcMOsjNCL+S+7WWfhD6ZRlc74Dk7/Jv0TVGz+Tz0LNYeBdsQIDAQAB',
        // 加密方式： **RSA2** 私钥 商家应用私钥
        'private_key' => 'MIIEogIBAAKCAQEAtoqHLP2UhWCcCv3Uw5uyD8j5KiV5T+2YVFLe+e596TM/3gomi8SgoRiAfG1k1w54yh+EbpIScbkF+vCI0frS23+vo5a5xFbYOPwHyy/GFOuLoPOUtdPN5lWTYXEXLSU3h0pmRw9R+Nhv6pluc6m847lUkq/6GiuMKF3LO8CVUCHA6duzJJc0PAkBdT7o93c4u2SGFaBUXPxrz3zNWqG/A5flKuDQqiye67+s9EPUA+WVE86mcNDKyc2s+1miTMtCj/5G4IYY5nS/MV6TeJjPFjFwAWcDWBhR1+1ZHH00ksFhRiOTekJ2zEG5JIl6f6lssib+LVYx0nnRz++wDw4HwwIDAQABAoIBAEUl8NLwNGTaFgJr6T84KZmlLg3zKCNJA91djy3qVDQUv+riuXtUvuyHlZSM9BgrWUJn8gjYuLfvuP44Q/wXIe0YT3aO0Ew6AaqEfodPz595IumTnA/M7kCExlGxP3BQmtpbKqdcfFbh1nNuL9MMx4sUV59BnmJvgKaB8UzvRSCXJMxRG27Pcseh45MZjHM+Qsqu7EtKv2KyVs6+PWOMe6DlVlBgr/30HXtolD16IEYdIfaxPim5C802SI+9pxNsi4bQxfYx+x6AhIadEsma1E9EwpYKfoGYT2urx7N2BxPXTNWi008/ExgVYRuW5CFk1yNahmWz6jgntAJSGzMzQOECgYEA4TpN/opeoAWRoCSU4zXPowO2BBO/xeoKeM7KFKRyfjax10N3KAk7dXb/BaiCYTgQKo/UR7jYxXjZbxMixxi7HOLzSru/dTgs9WnZ/QxODdEwSyaoWehrGNzqfeiOwjiF48KHdZH4Q9+3rqUuTiRo/nv/q4Oo6P6zGuwb497MGPkCgYEAz3sw/BBX85sqB4fXVkiBLvYXaOK5kiq+tHC8Km6aAlFFbPs+A/a22Cm5NkdBhe6xjQqIvv/+kDaOGIQwGpwSTYb4ANX5Vs/WsuAlhO1g8l+JMu6dXqzL4RqSy18uigJPcmizGjHEfjVlte5U2EAu/4XjP0Y6GlIIymEC0wBdcZsCgYAcBqBL6zXpHahIUCUCvOBwfXa5vSdg3kWdUMYOmYPxtqacjbWXEscGT99d+eD3bf18/lbA8fxvXiFYU/5A3g/ygT8a7o/dazcU9q38cfqId55Vy6KpRWWGO38mWbjh7BylAcDPXXGSKJV3svA3Iwq5l/5xfjmXfJIW6Ihz63ZkKQKBgAvltoNdtI1lgl14LqLl+XJl7iW3ioiVJuZV6JROT0p+uoprRb0YcpemnNY988XoUAoUZo79Qu2mEzPYsKF1/Z6wdJwnqOqPdHJBZCVhL0P2snlXMXLyWaaIzY4X4SVMyJ1433xLCkdqbHCoP/k+hPNmDAfe0QodVh+0vGK5DKKtAoGAN+NLmIMCmDONjmAOL41DdIWKIlqv5+ypu86g4xdep54/ghbCUEyxDid5hyPXJc2TNE7xALfmRwhlBDoZRuF6ZmJGriUJt4OOLXubP7ArR7uee45Tr8DkK+NDJ7Koqqn4mLbzekBqCV3mZdIFFoSB0BnPlt9Ll00Hs3LjlvDCDIo=',
        'log' => [ // optional
            'file' => '../storage/logs/alipay.log',
            'level' => 'debug', // 建议生产环境等级调整为 info，开发环境为 debug
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
        'http' => [
            'timeout' => 5.0,
            'connect_timeout' => 5.0,
            // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
        ],
        'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
    ]
];