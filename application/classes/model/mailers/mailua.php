<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Mailers_MailUa extends Model_Mailers {

    protected $host = 'pop3.mail.ua';
    protected $port = '995';
    protected $protocol = 'pop3/ssl/notls/novalidate-cert';

    protected $bad_login_identifier = 'Invalid login or password';

}