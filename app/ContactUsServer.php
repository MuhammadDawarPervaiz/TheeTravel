<?php

namespace App;

use App\Model;

define('CONTACTUS_RECAPTCHA_SECRET', '6LcJwnwUAAAAAOAiVrwb7LN3euWmPYYVkY0HAuzE');

class ContactUsServer extends Model
{
    protected $errors = array();
    protected $json;

    /**
     * Check is everything is ok
     * @return boolean
     */
    public function isValid()
    {
        if (!isset($_POST['action'])){
            return false;
        }
        $action = $_POST['action'];
        return $action == 'callback' && $this->isValidRecaptcha();
    }

    /**
     * Check is recaptha token valid
     * @return boolean
     */
    public function isValidRecaptcha()
    {
        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded' . PHP_EOL,
                'content' => http_build_query(array(
                    'secret' => CONTACTUS_RECAPTCHA_SECRET,
                    'response' => $_POST['gtoken']
                ))
            ),
        ));
        $data = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
        $json = json_decode($data, true);
        $this->json = $json;
        if (isset($json['success']) && $json['success']) {
            if (isset($json['score']) && ($json['score'] < 0.3)) { // reCaptcha returns score from 0 to 1.
                $this->errors[] = 'Bot activity detected!';
                return false;
            }
        } else {
            $this->addReCaptchaErrors($json['error-codes']);
            return false;
        }
        return true;
    }

    /**
     * Humanize recaptha errors
     * @param type $errors
     */
    public function addReCaptchaErrors($errors)
    {
        $reCaptchaErrors = $this->getReCaptchaErrors();
        if ($errors) {
            foreach ($errors as $error) {
                if (isset($reCaptchaErrors[$error])) {
                    $this->errors[] = $reCaptchaErrors[$error];
                } else {
                    $this->errors[] = $error;
                }
            }
        }
    }

    /**
     * recaptha errors
     * @param type $errors
     */
    public function getReCaptchaErrors()
    {
        return array(
            'missing-input-secret' => 'The secret parameter is missing. Please check your reCaptcha Secret.',
            'invalid-input-secret' => 'The secret parameter is invalid or malformed. Please check your reCaptcha Secret.',
            'missing-input-response' => 'Bot activity detected! Empty captcha value.',
            'invalid-input-response' => 'Bot activity detected! Captcha value is invalid.',
            'bad-request' => 'The request is invalid or malformed.',
        );
    }

    public function getErrors()
    {
        return $this->errors;
    }
}

$phone = $_POST['phone'];
$server = new ContactUsServer();

if ($server->isValid() && $phone) {
    /**
     * Everything is OK. Do some actions here - send email, web-push, insert to database etc...
     */
    die(json_encode(array(
        'success' => 1,
    )));
}else{
    die(json_encode(array(
        'success' => 0,
        'errors' => $server->getErrors()
    )));
}
