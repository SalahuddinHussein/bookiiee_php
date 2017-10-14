<?php
session_start();

$GLOBALS['config'] = ['mysql' => ['host' => '127.0.0.1' ,
                                  'dbname' => 'bookiiee_database',
                                  'username' => 'root',
                                  'password' => ''                             
                                 ],
                      
                     'cookiiee' => ['cookiiee_name' => '',
                                  'expiry' => '3600'
                                   ],
                     'session' => ['session_name' => 'user'
                                   ],
                      'token' => ['token_name' => 'token'
                         
                     ]
                     ];

require_once 'functions/sanitize.php';

spl_autoload_register(function($class){
    
    require_once "classes/".$class.".php";
});

?>