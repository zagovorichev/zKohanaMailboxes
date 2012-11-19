<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * TODO не работает ни у кого, можно повозиться, подделать заголовки?
 */

class Model_Mailers_Google extends Model_Mailers {

    //pop не удалось настроить
    protected $host = 'imap.gmail.com';
    protected $port = '993';
    protected $protocol = 'imap/ssl/notls/novalidate-cert';

    protected $bad_login_identifier = 'Username and password not accepted';

}