<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Mailers_Yandex_Imap extends Model_Mailers {

    protected $host = 'imap.yandex.ru';
    protected $port = '143';
    protected $protocol = 'imap';

    protected $bad_login_identifier = 'Retrying PLAIN authentication after';

}