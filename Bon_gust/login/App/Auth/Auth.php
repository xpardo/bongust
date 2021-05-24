<?php

use Hybridauth\Hybridauth;

class Auth
  {
    protected static $allow = ['Facebook', 'Twitter', 'Google'];

    protected static function issetRequest()
    {
      if(isset($_GET['login'])){
        if(in_array($_GET['login'], self::$allow)){
          return true;
        }
      }
      return false;
    }

    public static function getUserAuth()
    {
      if(self::issetRequest())
      {
        $service = $_GET['login'];

        $hybridAuth = new Hybridauth(__DIR__ . '\config.php');
       
        $adapter = $hybridAuth->authenticate($service);

        $userProfile = $adapter->getUserProfile();

        self::storeUser($service, $userProfile);

        //redirect user
        header('Location: ../home.php');
      }
    }

    protected static function storeUser($service, $socialUser)
    {
      $db = new PDO("mysql:host=localhost;dbname=xpardo_botigaonline", "xpardo", "xpardo");

      $user = self::getExistingUser($socialUser, $db);

      if($user === null){

        $user = array(
          'nom' => $socialUser->firstName,
          'email' => $socialUser->email
        );

        $ps = $db->prepare("INSERT INTO usuaris (nom, email) VALUES(:nom, :email)");
        $ps->execute($user);

        $user['id'] = $db->lastInsertId();

        self::storeUserSocial($user, $socialUser, $service, $db);

      }else{

        if(!self::checkUserSocialService($user, $socialUser, $service, $db)){
          self::storeUserSocial($user, $socialUser, $service, $db);
        }

      }

      self::login($user);

    }

    protected static function getExistingUser($socialUser, $db)
    {
      $ps = $db->prepare("SELECT id, nom, email FROM usuaris WHERE email = :email");
      $ps->execute([
        ':email' => $socialUser->email
      ]);

      $result = $ps->fetchAll(PDO::FETCH_ASSOC);

      return $result ? $result[0] : null;
    }

    protected static function storeUserSocial($user, $socialUser, $service, $db)
    {
      $ps = $db->prepare("INSERT INTO usuaris_social (usuaris_id, social_id, service) VALUES(:usuaris_id, :social_id, :service)");
      $ps->execute([
      ':usuaris_id' => $user['id'],
      ':social_id' => $socialUser->identifier,
      ':service' => $service
      ]);
    }

    protected static function checkUserSocialService($user, $socialUser, $service, $db)
    {
      $ps = $db->prepare("SELECT * FROM usuaris_social WHERE usuaris_id = :usuaris_id AND service = :service AND social_id = :social_id");
      $ps->execute([
      ':usuaris_id' => $user['id'],
      ':service' => $service,
      ':social_id' => $socialUser->identifier
      ]);

      return (bool) $ps->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function isLogin()
    {
      return (bool) isset($_SESSION[' usuaris']);
    }

    protected static function login($user)
    {
      $_SESSION['usuaris'] = $user;
    }

    public static function logout()
    {
      if(self::isLogin()){
        unset($_SESSION['usuaris']);
      }
    }

  }

 ?>
