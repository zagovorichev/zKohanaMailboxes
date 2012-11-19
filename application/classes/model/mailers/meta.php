<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Mailers_Meta extends Model_Mailers {

    protected $host = 'pop.meta.ua';

    protected $protocol = 'pop3/ssl/notls/novalidate-cert';
    protected $port = '995';

    protected $bad_login_identifier = 'Login failed';

}