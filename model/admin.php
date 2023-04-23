
<?php 
class Admin
{
   private $idAdmin; 
   private $firstName;
   private $name;
   private $password;
   private $mail;

   public function __construct($idAdmin,$firstName, $name, $password, $mail)
   {
      $this->idAdmin = $idAdmin;
      $this->firstName = $firstName;
      $this->name = $name;
      $this->password = $password;
      $this->mail = $mail;
   }

    public function getIdAdmin()
   {
       return $this->idAdmin;
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
         $admin = new self($result['idAdmin'],$result['firstName'], $result['name'], $result['password'], $result['mail']);
         return $admin;
      } else {
         return FALSE;
      }
   }

    public function changePassword()
   {
      $sql = "update Admin set password = :password where idAdmin=:idAdmin;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $password=$this->password;
      $data->bindValue(':password', $password,PDO::PARAM_STR);
      $data->bindValue(':idAdmin', $this->idAdmin,PDO::PARAM_INT);
      $data->execute();
   }

    public function changeMail()
   {
      $sql = "update Admin set mail = :mail where idAdmin=:idAdmin;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $mail = $this->mail;
      $data->bindValue(':mail', $mail,PDO::PARAM_STR);
      $data->bindValue(':idAdmin', $this->idAdmin,PDO::PARAM_INT);
      $data->execute();
   }

       public function changeName()
   {
      $sql = "update Admin set name = :name where idAdmin=:idAdmin;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $name = $this->name;
      $data->bindValue(':name', $name,PDO::PARAM_STR);
      $data->bindValue(':idAdmin', $this->idAdmin,PDO::PARAM_INT);
      $data->execute();
   }

       public function changeFirstName()
   {
      $sql = "update Admin set firstName = :firstName where idAdmin=:idAdmin;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $firstName = $this->firstName;
      $data->bindValue(':firstName', $firstName,PDO::PARAM_STR);
      $data->bindValue(':idAdmin', $this->idAdmin,PDO::PARAM_INT);
      $data->execute();
   }
}

 ?>