<h2 style="text-align: center;">Display Details</h2>
<form action="" method="post">
    <select name="categoryAnimal">
        <option value="<?php echo 'mammal'; ?>">Mammals</option>
        <option value="<?php echo 'carnivorus';?>">Carnivorus</option>
        <option value="<?php echo'reptiles'; ?>">Reptiles</option>
    </select> 
    <button type="submit" name="execute">Explore</button>     
</form>

<?php

interface Animal{
   
    function talk($obj);
}
class Mammal implements Animal{
    public $name;
    public $age;

    public function talk($obj){
        $obj->talk();
    }
    
}
class Reptile implements Animal{
    public $name;
    public $age;

    public function talk($obj){
        $obj->talk();
    }
    
}
class Carnivorus implements Animal{
    public $name;
    public $age;

    public function talk($obj){
        $obj->talk();
    }
    
}
class Goat extends Mammal{
    public function __construct()
    {
        $this->name = 'Goat';
        $this->age = 4;
    }
    public function talk($obj){
       return "<strong>".__CLASS__ . "</strong> says: MAaA mAah maAH!!";
    }
}
class Snake extends Reptile{
    public function __construct()
    {
        $this->name = 'Snake';
        $this->age = 11;
    }
    public function talk($obj){
       return "<strong>".__CLASS__ . "</strong> says: trruup truup truup!!";
    }
}
class Lion extends Carnivorus{
    public function __construct()
    {
        $this->name = 'Lion';
        $this->age = 35;
    }
    public function talk($obj){
        return "<strong>". __CLASS__ ."</strong> says: Roarr Roarr Roaarr!!";
    }
}

// execute mammal implementation

if(isset($_POST['execute']) && isset($_POST['categoryAnimal'])){

    $category = $_POST['categoryAnimal'];

    if($category == 'mammal'){
        $goat  = new Goat();
        $name = $goat->name;
        $age  = $goat->age;
        $talk = $goat->talk($goat); 
    }

    if($category == 'reptiles'){
        $snake  = new snake();
        $name = $snake->name;
        $age  = $snake->age;
        $talk = $snake->talk($snake); 
    }

    if($category == 'carnivorus'){
        $lion  = new Lion();
        $name = $lion->name;
        $age  = $lion->age;
        $talk = $lion->talk($lion); 
    }
?>

<table style="border: 2px solid red;">
    <thead >
        <tr>
            <th style="border: 2px solid blue; padding: 2px 8px;">Animal Name</th>
            <th style="border: 2px solid blue; padding: 2px 8px;">Animal Category</th>
            <th style="border: 2px solid blue; padding: 2px 8px;">Animal Age</th>
            <th style="border: 2px solid blue; padding: 2px 8px;">Way of talk</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 2px solid black; padding: 2px 8px;"><?php echo $name; ?></td>
            <td style="border: 2px solid black; padding: 2px 8px;"><?php echo $category; ?></td>
            <td style="border: 2px solid black; padding: 2px 8px;"><?php echo $age; ?></td>
            <td style="border: 2px solid black; padding: 2px 8px;"><?php echo $talk; ?></td>
        </tr>
    </tbody>
</table>

<?php   
}
?>
