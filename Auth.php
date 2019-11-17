<?php

class Auth
{
    public $login = false;

    public $lang = null;
    private $users = array(
        array('login' => 'Vasisualiy', 'password' => '12345', 'lang' => 'ru'),
        array('login' => 'Afanasiy', 'password' => '54321', 'lang' => 'en'),
        array('login' => 'Petro', 'password' => 'EkUC42nzmu', 'lang' => 'ua'),
        array('login' => 'Pedrolus', 'password' => 'Cogito_ergo_sum', 'lang' => 'it'),
        array('login' => 'Sasha', 'password' => '0000')
    );

    private $languages = array(
        'ru' => array('success' => 'Вы успешно авторизровались', 'part1' => 'Приветствую вас,', 'part2' => ' на нашем сайте'),
        'en' => array('success' => 'You have successfully logged in', 'part1' => 'Greetings,', 'part2' => ' on our website'),
        'ua' => array('success' => 'Ви успішно авторизувалися', 'part1' => 'Вітаю вас,', 'part2' => ' на нашому сайті'),
        'it' => array('success' => 'Hai effettuato l\'accesso correttamente', 'part1' => 'Ti saluto,', 'part2' => ' sul nostro sito web')
    );


    public function __construct()
    {
        session_start();
    }

    public function Login()
    {
        $message = "";

        if (isset($_POST['userid'], $_POST['password'])) {
            $login = $this->Verify($_POST['userid']);
            $pass = $this->Verify($_POST['password']);
            $this->UserValidation($login, $pass);
        }
        if (isset($_SESSION['valid_user'])) {
            if (isset($_SESSION['lang']) || isset($_POST['usr_lang'])) {
                $this->GetHello();
                return;
            }
        } else {
            if (isset($_POST['userid'])) {
                $message = "Неправильный логин и/или пароль";
            } else {
                $message = "Вы не зарегистрированы. <br>";
            }
        }
        echo "<div class='message'>$message</div>";
    }

    private function Verify($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function GetHello()
    {
        if ($_POST['usr_lang'] != null) {
            $_SESSION['lang'] = $_POST['usr_lang'];
        }
        $key_lng = $_SESSION['lang'];
        $lang = $this->languages[$key_lng];
        echo "<h1>" . $lang['success'] . "</h1><br>";
        echo "<h2>" . $lang['part1'] . " " . $_SESSION['valid_user'] . " " . $lang['part2'] . " </h2><br>";
    }

    private function UserValidation($login, $pass)
    {
        foreach ($this->users as $key => $user) {
            if ($login === $user['login'] && $pass === $user['password']) {
                $_SESSION['valid_user'] = $login;
                $_SESSION['lang'] = $user['lang'];
            }
        }
    }

    public function Logut()
    {
        $message = "";
        if (isset($_SESSION)) {
            session_unset();
            unset($_SESSION);
        }

        if (!isset($_SESSION)) {
            $message = "Вы вышли из системы. <br>";
        } else {
            $message = "Невозможно выйти. <br>";
        }
        echo "<div class='message'>$message</div>";
    }
}
