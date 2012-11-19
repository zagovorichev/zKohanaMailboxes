<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Mailers_EmailUa extends Model_Mailers {

    protected $host = 'pop.email.ua';

    protected $bad_login_identifier = 'invalid login or password';

}