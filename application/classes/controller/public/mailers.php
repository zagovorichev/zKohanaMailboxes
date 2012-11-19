<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Public_Mailers extends Public {

    public function action_index(){

        $this->headerVars = array(
            'title' => __('Тест доступа к почтовикам через IMAP'),
            'description' => '',
            'keywords' => '',
        );



        if(isset($_POST['mailer'])){

            $login = $this->request->post('login');
            $password = $this->request->post('password');

            $error = '';
            $contacts = array();

            try{

                switch($_POST['mailer']){
                    case 'mail':
                        try {
                            $contacts = Model::factory('Mailers_MailRu')->get_contacts($login, $password);
                        } catch(Exception $e){
                            $contacts = Model::factory('Mailers_MailRu_Imap')->get_contacts($login, $password);
                        }
                        break;
                    case 'yandex':
                        try{
                            $contacts = Model::factory('Mailers_Yandex')->get_contacts($login, $password);
                        } catch(Exception $e){
                            $contacts = Model::factory('Mailers_Yandex_Imap')->get_contacts($login, $password);
                        }
                        break;
                    case 'google':
                        $contacts = Model::factory('Mailers_Google')->get_contacts($login, $password);
                        break;
                    case 'ukrnet':
                        $contacts = Model::factory('Mailers_UkrNet')->get_contacts($login, $password);
                        break;
                    case 'iua':
                        $contacts = Model::factory('Mailers_iua')->get_contacts($login, $password);
                        break;
                    case 'uafm':
                        $contacts = Model::factory('Mailers_UaFm')->get_contacts($login, $password);
                        break;
                    case 'emailua':
                        $contacts = Model::factory('Mailers_EmailUa')->get_contacts($login, $password);
                        break;
                    case '3gua':
                        $contacts = Model::factory('Mailers_3gUa')->get_contacts($login, $password);
                        break;
                    case 'rambler':
                        $contacts = Model::factory('Mailers_Rambler')->get_contacts($login, $password);
                        break;
                    case 'meta':
                        $contacts = Model::factory('Mailers_Meta')->get_contacts($login, $password);
                        break;
                    case 'mailua':
                        $contacts = Model::factory('Mailers_MailUa')->get_contacts($login, $password);
                        break;
                    default: $error = __('Данный тип почтового сервера не поддерживается');
                }

            } catch(Model_Mailers_Exceptions $mailer_exception) {

                $error = $mailer_exception->getMessage();

            } catch(Exception $e){
                $error = __('Ошибка, попробуйте позже или сообщите в поддержку');
            }
        }

        $this->view->bodyParams = array(

            'error' => $error,
            'contacts' => $contacts,
        );

    }
}
