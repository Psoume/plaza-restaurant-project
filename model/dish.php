
<?php 
class Dish
{
   public $idDish;
   public $name;
   public $price;
   public $description;
   public $isAvailable;
   public $course;
   public $allergens;
   public $idMenu;

   public function __construct($idDish,$name, $price, $description, $isAvailable,$course,$allergens,$idMenu)
   {
      $this->idDish = $idDish;
      $this->name = $name;
      $this->price = $price;
      $this->description = $description;
      $this->isAvailable = $isAvailable;
      $this->course = $course; //liste
      $this->allergens = $allergens;
      $this->idMenu = $idMenu;
   }

    public function getId()
    {
        return $this->idDish;
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

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }

    public function getAllergens()
    {
        return $this->allergens;
    }

    public function setAllergens($allergens)
    {
        $this->allergens = $allergens;

        return $this;
    }

        public function getIdMenu()
    {
        return $this->idMenu;
    }

    public function setIdMenu($idMenu)
    {
        $this->idMenu = $idMenu;

        return $this;
    }

    public static function findAllergens($idDish) //sort une liste d'objets
    {
      $sql = "select Allergen.idAllergen,Allergen.name,Allergen.icon from Presents INNER JOIN Allergen on Presents.IdAllergen = Allergen.idAllergen Where Presents.idDish = :idDish;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $data->bindValue(':idDish', $idDish,PDO::PARAM_INT);
      $data->execute();
      $allergens = [];
      $result = $data->fetchAll();
      foreach ($result as $r) 
      {
        $allergens[]=New Allergen($r['idAllergen'],$r['name'],$r['icon']);
      }
         return $allergens;
    }

        public static function findCourse($idCourse) 
    {
      $sql = "select distinct name from Course Where idCourse = :idCourse;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $data->bindValue(':idCourse', $idCourse,PDO::PARAM_INT);
      $data->execute();
      $result = $data->fetch();
      return $result;
    }

    public static function getDishes() //liste de plats
    {
      $sql = "select * from Dish Order by name;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $data->execute();
      $result = $data->fetchAll();
      $dish=[];
      foreach ($result as $r) 
      {
          $dish[]=new Dish($r['idDish'],$r['name'],$r['price'],$r['description'],$r['isAvailable'],[$r['idCourse'],self::findCourse($r['idCourse'])],self::findAllergens($r['idDish']),$r['idMenu']);
      }
      return $dish;
    }

    public static function listCourses() //sort une liste de listes bi-éléments
    {
      $sql = "select * from Course;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $data->execute();
      $result = $data->fetchAll();
      $course=[];
      foreach ($result as $r) 
      {
          $course[]=[$r['idCourse'],$r['name']];
      }
      return $course;
    }

    public function createDish()
    {
      $sql = "insert into Dish (name,price,description,isAvailable,IdCourse) values (:name,:price,:description,:isAvailable,:IdCourse);select Last_insert_ID();";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $data->bindValue(':name', $this->name);
      $data->bindValue(':price', $this->price);
      $data->bindValue(':description', $this->description);
      $data->bindValue(':isAvailable', $this->isAvailable);
      $data->bindValue(':IdCourse', $this->course[0]);
      $data->execute();
      $IdDish = PDOBD::getInstance()->getPdo()->lastInsertId();
      $allergens = $this->allergens;
      foreach ($allergens as $a ) 
      {
        $sql = "insert into Presents (idDish,idAllergen) values(:idDish,:idAllergen);";
        $data = PDOBD::getInstance()->getPdo()->prepare($sql);
        $data->bindValue(':idDish', $IdDish);
        $data->bindValue(':idAllergen', $a->getId());
        $data->execute();
      }
    }

        public function updateDish()
    {
      $sql = "update Dish set name=:name, price=:price, description=:description, isAvailable=:isAvailable, IdCourse=:IdCourse where idDish=:idDish;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $data->bindValue(':idDish', $this->idDish);
      $data->bindValue(':name', $this->name);
      $data->bindValue(':price', $this->price);
      $data->bindValue(':description', $this->description);
      $data->bindValue(':isAvailable', $this->isAvailable);
      $data->bindValue(':IdCourse', $this->course[0]);
      $data->execute();
      
      $sql = "delete from Presents where idDish=:idDish;";//reset allergenes
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $data->bindValue(':idDish', $this->idDish);
      $data->execute();

      $allergens = $this->allergens;
      
      foreach ($allergens as $a ) 
      {
        $sql = "insert into Presents (idDish,idAllergen) values(:idDish,:idAllergen);";
        $data = PDOBD::getInstance()->getPdo()->prepare($sql);
        $data->bindValue(':idDish', $this->idDish);
        $data->bindValue(':idAllergen', $a->getId());
        $data->execute();
      }
    }

    public static function getDishbyID($id)
    {
    $sql = "select * from Dish where idDish=:id";
    $data = PDOBD::getInstance()->getPdo()->prepare($sql);
    $data->bindValue(':id', $id);
    $data->execute();
    $result = $data->fetch();
    $dish = new Dish($result['idDish'],$result['name'],$result['price'],$result['description'],$result['isAvailable'],[$result['idCourse'],self::findCourse($result['idCourse'])],self::findAllergens($result['idDish']),$result['idMenu']);
    return $dish;
    }
}
 ?>
