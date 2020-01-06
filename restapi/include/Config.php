<?php
define('DB_NAME', 'lalianca_old');
define('DB_USER', 'lalianca');
define('DB_PASSWORD', 'sauna92alianca');
define('DB_HOST', 'localhost');

define('DB_NAME_2', 'lalianca_administracio');
define('DB_USER_2', 'lalianca_usuari');
define('DB_PASSWORD_2', '12qw0@1F');
define('DB_HOST_2', 'localhost');

//referencia generado con MD5(uniqid(&lt;some_string&gt;, true))
define('API_KEY', 'G6ig40q+WmSXrX4iLd5EyQ1u4/ZggLO0o7ZtcZYl6Yo=');

class Event
{
    // Atributos
    public $id;
    public $title;
    public $content;
    public $date;
    public $price;    
    public $location;    
    public $imgUrl;

    // Constructor
    public function __construct($id, $content, $title, $price,$location,$date,$imgUrl)
    {
        $this->id = $id;
        $this->content = $content;
        $this->title = $title;
        $this->price = $price;        
        $this->location = $location;
        $this->date = $date;
        $this->imgUrl = $imgUrl;
    }

    //Métodos
    public function getId()
    {
        // Devolvemos un atributo
        return $this->id;
    }

    public function setId($id)
    {
        //Le damos un valor a un atributo
        $this->id = $id;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
}

class News
{
    // Atributos
    public $id;
    public $title;
    public $content;
    public $date;
    public $imgUrl;

    // Constructor
    public function __construct($id, $content, $title, $date,$imgUrl)
    {
        $this->id = $id;
        $this->content = $content;
        $this->title = $title;        
        $this->date = $date;
        $this->imgUrl = $imgUrl;
    }

    //Métodos
    public function getId()
    {
        // Devolvemos un atributo
        return $this->id;
    }

    public function setId($id)
    {
        //Le damos un valor a un atributo
        $this->id = $id;
    }
}
