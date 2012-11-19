<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Mailers_UkrNet extends Model_Mailers {

    protected $host = 'pop3.ukr.net';

    protected $bad_login_identifier = 'Retrying PLAIN authentication after Invalid login or password';

}