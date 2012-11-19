<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Mailers_Rambler extends Model_Mailers {

    protected $host = 'mail.rambler.ru';

    protected $bad_login_identifier = 'Incorrect username/password';

}