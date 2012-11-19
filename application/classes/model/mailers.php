<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Класс для работы с почтовиками
 * через IMAP
 */
abstract class Model_Mailers extends Model
{

    protected $host = null;
    protected $port = '110';
    protected $protocol = 'pop3';
    protected $bad_login_identifier = '';
    protected $ssl = false;

    private $imap_stream = null;

    /**
     * Подключение к почтовому серверу
     * @param string $user
     * @param string $password
     * @param string $folder
     * @param bool $ssl
     * @throws Model_Mailers_Exceptions
     */
    private function pop3_login($user='', $password='', $folder="INBOX"){

        $ssl=($this->ssl==false) ? "/novalidate-cert" : "";

        try {

            $this->imap_stream = imap_open( '{' . $this->host . ':' . $this->port . '/' . $this->protocol . $ssl . '}' . $folder , $user, $password);

        } catch(Exception $e) {

            $bad_login = false;
            $errors = imap_errors();
            var_dump($errors);

            if(!empty($this->bad_login_identifier)){

                foreach($errors as $error){
                    if(stripos($error, $this->bad_login_identifier) !== false)
                        $bad_login = true;
                }
            }

            if($bad_login) throw new Model_Mailers_Exceptions(__('Неверный логин или пароль'));
            else throw new Model_Mailers_Exceptions(__('Ошибка, попробуйте позже или сообщите в поддержку'));
        }
    }

    /**
     * Отключение от почтового сервера
     * @return bool
     */
    private function pop3_logout(){

        if(!isset( $this->imap_stream )) return false;

        return imap_close( $this->imap_stream );
    }

    /**
     * пока не использую (подключить, если у какого-нибудь почтовика будет не INBOX для почты)
     */
    private function pop3_getmailboxes(){

        $list = imap_getmailboxes($this->imap_stream, '{' . $this->host . ':' . $this->port . '/pop3}', "*");

        if (is_array($list)) {
            foreach ($list as $key => $val) {
                echo "($key) ";
                echo imap_utf7_decode($val->name) . ",";
                echo "'" . $val->delimiter . "',";
                echo $val->attributes . "<br />\n";
            }
        } else {
            echo "imap_getmailboxes failed: " . imap_last_error() . "\n";
        }
    }

/**
     * Статистика по ящику (read,unread,deleted,new с количеством)
     * @return array
     */
    private function pop3_stat(){

        $check = imap_mailboxmsginfo( $this->imap_stream );

        return ((array)$check);
    }

    /**
     *  Список сообщений (инфо о сообщении)
     * @param $connection
     * @param string $message
     * @return mixed
     */
    private function pop3_list($message=""){

        $result = array();

        if ($message)
        {
            $range=$message;

        } else {
            $MC = imap_check($this->imap_stream);
            $range = "1:".$MC->Nmsgs;
        }

        return imap_fetch_overview($this->imap_stream, $range);
    }

    /**
     * Достаем заголовок письма, откуда достанем to и from
     * @param $uid
     * @return object
     */
    private function pop3_fetch_head( $uid ){

        $hText = imap_fetchbody($this->imap_stream, $uid, '0', FT_UID);

        return imap_rfc822_parse_headers($hText);
    }

    public function get_contacts($login, $password){

        $this->pop3_login($login, $password);

        /*$this->pop3_getmailboxes();die;*/
        $mails = array();
        foreach($this->pop3_list() as $message){

            $header = $this->pop3_fetch_head($message->msgno);

            foreach(array($header->to, $header->from, $header->reply_to) as $src)
                foreach($src as $mail) {

                    $str = $mail->mailbox . '@' . $mail->host;
                    if(!in_array($str, $mails))
                        $mails[] = $str;
                }
        }

        $this->pop3_logout();

        return $mails;
    }
}
