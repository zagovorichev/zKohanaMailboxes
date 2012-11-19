<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Mailers_MailRu extends Model_Mailers {

    protected $host = 'pop.mail.ru';
    protected $port = '110'; //995 с шифрованием
    protected $protocol = 'pop3';

    protected $bad_login_identifier = 'retrying plain authentication after password supplied';

}