<!-- By Luke Pring -->

<?php 

// Classes and Objects (Part 1)

class User {

    private $email;
    private $name;

    public function __construct($name, $email){
        $this->email = $email;
        $this->name = $name;
    }

    public function login(){
        echo  $this->name.' Logged In.';
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        if(is_string($name) && strlen($name) > 1){
            $this->name = $name;
            return "Name Updated! ($name)";
        } else {
            return 'Name not valid.';
        }
    }

}

$userTwo = new User('yoshi', 'bean@bean.com');
// echo $userTwo->getName();
// echo $userTwo->setName(50);
echo $userTwo->setName('Kevin');
echo '<br><br>';
echo $userTwo->getName();

?>