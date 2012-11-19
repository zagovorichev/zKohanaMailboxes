<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Mailers_Yandex extends Model_Mailers {

    protected $host = 'pop.yandex.ru';

    protected $bad_login_identifier = 'Retrying PLAIN authentication after';

}