
<?php 
class Menu
{
   public $idMenu;
   public $name;
   public $description;
   public $isAvailable;
   public $price;
   public $dishes;

   public function __construct($idMenu,$name, $description, $isAvailable,$price,$dishes)
   {
      $this->idMenu = $idMenu;
      $this->name = $name;
      $this->description = $description;
      $this->isAvailable = $isAvailable;
      $this->price = $price;
      $this->dishes = $dishes;
   }

    public function getIdMenu()
    {
        return $this->idMenu;
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

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getIsAvailable()
    {
        return $this->isAvailable;
    }

    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getDishes()
    {
        return $this->dishes;
    }

    public function setDishes($dishes)
    {
        $this->dishes = $dishes;

        return $this;
    }


    public static function getMenus() //[Menu1,Menu2]
    {
        $menus=[];
        $dishes1=[];// plats du menu 1
        $dishes2=[];
        $dishes = Dish::getDishes();
        foreach ($dishes as $d ) 
        {
        switch ($d->getIdMenu()) 
        {
            case 1:
                $dishes1[]=$d;
                break;
            
            case 2:
                $dishes2[]=$d;
                break;

            case 3:
                $dishes1[]=$d;
                $dishes2[]=$d;
                break;
        }
      $sql = "select * from Menu;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $data->execute();
      $result = $data->fetchAll();
      $menu1=new Menu($result[0]['idMenu'],$result[0]['name'],$result[0]['description'],$result[0]['isAvailable'],$result[0]['price'],$dishes1);
      $menu2 = new Menu($result[1]['idMenu'],$result[1]['name'],$result[1]['description'],$result[1]['isAvailable'],$result[1]['price'],$dishes2);
      
          
      }
      return [$menu1,$menu2];
    }
}


//         public function updateMenu()
//     {
//       $sql = "update Dish set name=:name, price=:price, description=:description, isAvailable=:isAvailable, IdCourse=:IdCourse where idDish=:idDish;";
//       $data = PDOBD::getInstance()->getPdo()->prepare($sql);
//       $data->bindValue(':idDish', $this->idDish);
//       $data->bindValue(':name', $this->name);
//       $data->bindValue(':price', $this->price);
//       $data->bindValue(':description', $this->description);
//       $data->bindValue(':isAvailable', $this->isAvailable);
//       $data->bindValue(':IdCourse', $this->course[0]);
//       $data->execute();
      
//       $sql = "delete from Presents where idDish=:idDish;";//reset allergenes
//       $data = PDOBD::getInstance()->getPdo()->prepare($sql);
//       $data->bindValue(':idDish', $this->idDish);
//       $data->execute();

//       $allergens = $this->allergens;
      
//       foreach ($allergens as $a ) 
//       {
//         $sql = "insert into Presents (idDish,idAllergen) values(:idDish,:idAllergen);";
//         $data = PDOBD::getInstance()->getPdo()->prepare($sql);
//         $data->bindValue(':idDish', $this->idDish);
//         $data->bindValue(':idAllergen', $a->getId());
//         $data->execute();
//       }
//     }

// }

 ?>
