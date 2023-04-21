
<?php 
class Allergen
{
   public $id;
   public $name;
   public $icon;

   public function __construct($id,$name,$icon)
   {
      $this->id = $id;
      $this->name = $name;
      $this->icon = $icon;
   }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

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

    public function getIcon()
    {
        return $this->icon;
    }

    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    public static function getAllergens()
    {
      $sql = "select * from Allergen;";
      $data = PDOBD::getInstance()->getPdo()->prepare($sql);
      $data->execute();
      $result = $data->fetchAll();
      $allergens=[];
      foreach ($result as $r) 
      {
          $allergens[]=new Allergen($r['idAllergen'],$r['name'],$r['icon']);
      }
      return $allergens;
    }
}
 ?>

