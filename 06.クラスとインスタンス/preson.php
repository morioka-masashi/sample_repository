<?php
class Person
{
    protected string $name;

    protected int $age;

    protected string $gender;

    public function __construct($name, $age, $gender){
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function self_introduction(){
        return "私の名前は" . $this->name . "です。年齢は" . $this->age . "歳です。性別は" . $this->gender . "です。";
    }

    public function progress(){
        // $this->age += 1;
        $this->age = $this->age + 1;
        return "誕生日がきました。";
    }
}



