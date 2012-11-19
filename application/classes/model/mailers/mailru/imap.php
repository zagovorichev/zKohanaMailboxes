<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Mailers_MailRu_Imap extends Model_Mailers {

    protected $host = 'imap.mail.ru';
    protected $port = '143';
    protected $protocol = 'imap';

    protected $bad_login_identifier = 'retrying plain authentication after password supplied';

}