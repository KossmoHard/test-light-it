<?php
/**
 * Класс User - модель для работы с пользователями
 */
class User
{

    public static function register($name, $email, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (?, ?, ?)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bind_param('sss', $name, $email, $password);
        return $result->execute();
    }
    
    /* Проверяем существует ли пользователь с заданными $email и $password */

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        if ($result = $db->prepare(" SELECT id FROM user WHERE email = ? AND password = ? ")) {

            $result->bind_param("ss", $email, $password);
            $result->execute();
            $result->bind_result($id);
            $result->fetch();

            return $id;

            $result->close();
        }else{
            return false;
         }

            $db->close();
        }

     /* Запоминаем пользователя */

    public static function auth($userId)
    {

        session_start();
        $_SESSION['user'] = $userId;
    }


    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        session_start();
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

     /* Проверяет является ли пользователь гостем */

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /* Проверяет имя: не меньше, чем 2 символа */

    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /* Проверяет имя: не меньше, чем 6 символов */

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /* Проверяет email */

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    /* Проверяет не занят ли email другим пользователем */

    public static function checkEmailExists($email)
    {
     
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE email = ? ';
        $result = $db->prepare($sql);
        $result->bind_param('s', $email);
        $result->execute();
        $result->store_result();
        $result = $result->num_rows;
        if ($result == true){
            return true;
        }else{
            return false;
        }
        
    }

}