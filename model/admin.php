
<?php 
class Admin
{
   private $firstName;
   private $name;
   private $password;
   private $mail;

   public function __construct($firstName, $name, $password, $mail)
   {
      $this->firstName = $firstName;
      $this->name = $name;
      $this->password = $password;
      $this->mail = $mail;
   }

   public function getFirstName()
   {
       return $this->firstName;
   }
   
    
   public function setFirstName($firstName)
   {
       $this->firstName = $firstName;

       return $this;
   }
    
   public function getName()
   {
       return $this->name;
   }
      
   public function setName($name)
   {
       $this->name = $name;

       return $this;
   }
   
   public function getPassword()
   {
       return $this->password;
   }
    
   public function setPassword($password)
   {
       $this->password = $password;

       return $this;
   }  
    
   public function getMail()
   {
       return $this->mail;
   }
   
   public function setMail($mail)
   {
       $this->mail = $mail;

       return $this;
   }

   public static function signIn($mail,$password)
   {
      $sql = "select * from Admin where mail = :mail and password = :password;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $data->bindValue(':mail', $mail,PDO::PARAM_STR);
      $data->bindValue(':password', $password);
      $data->execute();
      $result = $data->fetch();
      if ($result != NULL) {
         $admin = new self($result['firstName'], $result['name'], $result['password'], $result['mail']);
         return $admin;
      } else {
         return FALSE;
      }
   }
}

 ?>