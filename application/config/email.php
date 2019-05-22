<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = [        
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.office365.com',
    'smtp_user' => '',
    'smtp_pass' => '',
    'smtp_crypto' => 'tls',    
    'newline' => "\r\n",
    'smtp_port' => 587,
    'mailtype' => 'html',

    'email_to' => 'marciofernandonet@gmail.com', //E-mail de destino
    'email_subject' => 'Dados de Contatos' //Assunto
];