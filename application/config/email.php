<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = [        
    'protocol' => '', //Protocolo de envio de mensagens (mail, sendmail, ou smtp)
    'smtp_host' => '', //Endereço do servidor
    'smtp_user' => '', //Nome de usuário.
    'smtp_pass' => '', //Senha
    'smtp_crypto' => 'tls',    
    'newline' => "\r\n",
    'smtp_port' => x, //Porta
    'mailtype' => 'html',
    'email_to' => '', //E-mail de destino
    'email_subject' => '' //Assunto da mensagem
];