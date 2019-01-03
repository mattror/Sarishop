<?php
require_once "../libraries/database.class.php";
require_once "../controllers/pagination.php";
class User{
    public function slide(){
        $slide = [];
        $result = Database::query("SELECT * FROM slide_show ORDER BY id DESC LIMIT 4");
        while($row = mysqli_fetch_assoc($result)){
            $s = new User();
            $s->id = $row["id"];
            $s->username = $row["name"];
            $s->description = $row["description"];
            $s->image = $row["image"];
            $slide[] = $s;
        }
        return $slide;
    }

    public function arrival(){
        $arrival = [];
        $result = Database::query("SELECT * FROM upload_product WHERE instock != 0 ORDER BY date LIMIT 4");
        while($row = mysqli_fetch_assoc($result)){
            $r = new User();
            $r->id = $row["id"];
            $r->name = $row["name"];
            $r->gender = $row["gender"];
            $r->category = $row["category"];
            $r->instock = $row["instock"];
            $r->price = $row["price"];
            $r->description = $row["description"];
            $r->image = $row["image"];
            $r->date = $row["date"];
            $arrival[] = $r;
        }
        return $arrival;
    }

    public function female(){
        $female = [];
        $result = Database::query("SELECT * FROM upload_product WHERE gender = 'female' AND category = 'cloth' AND instock != 0 ORDER BY date LIMIT 10");
        while($row = mysqli_fetch_assoc($result)){
            $r = new User();
            $r->id = $row["id"];
            $r->name = $row["name"];
            $r->gender = $row["gender"];
            $r->category = $row["category"];
            $r->instock = $row["instock"];
            $r->price = $row["price"];
            $r->description = $row["description"];
            $r->image = $row["image"];
            $female[] = $r;
        }
        return $female;
    }

    public function male(){
        $male = [];
        $result = Database::query("SELECT * FROM upload_product WHERE gender = 'male' AND category = 'cloth' AND instock != 0 ORDER BY date LIMIT 10");
        while($row = mysqli_fetch_assoc($result)){
            $r = new User();
            $r->id = $row["id"];
            $r->name = $row["name"];
            $r->gender = $row["gender"];
            $r->category = $row["category"];
            $r->instock = $row["instock"];
            $r->price = $row["price"];
            $r->description = $row["description"];
            $r->image = $row["image"];
            $male[] = $r;
        }
        return $male;
    }

    public function kid(){
        $kid = [];
        $result = Database::query("SELECT * FROM upload_product WHERE gender = 'kid' AND category = 'cloth' AND instock != 0 ORDER BY date LIMIT 10");
        while($row = mysqli_fetch_assoc($result)){
            $r = new User();
            $r->id = $row["id"];
            $r->name = $row["name"];
            $r->gender = $row["gender"];
            $r->category = $row["category"];
            $r->instock = $row["instock"];
            $r->price = $row["price"];
            $r->description = $row["description"];
            $r->image = $row["image"];
            $kid[] = $r;
        }
        return $kid;
    }

    public function purse(){
        $purse = [];
        $result = Database::query("SELECT * FROM upload_product WHERE category = 'purse' AND instock != 0 ORDER BY date LIMIT 10");
        while($row = mysqli_fetch_assoc($result)){
            $r = new User();
            $r->id = $row["id"];
            $r->name = $row["name"];
            $r->gender = $row["gender"];
            $r->category = $row["category"];
            $r->instock = $row["instock"];
            $r->price = $row["price"];
            $r->description = $row["description"];
            $r->image = $row["image"];
            $purse[] = $r;
        }
        return $purse;
    }

    public function shoes(){
        $shoes = [];
        $result = Database::query("SELECT * FROM upload_product WHERE category = 'shoes' AND instock != 0 ORDER BY date LIMIT 10");
        while($row = mysqli_fetch_assoc($result)){
            $r = new User();
            $r->id = $row["id"];
            $r->name = $row["name"];
            $r->gender = $row["gender"];
            $r->category = $row["category"];
            $r->instock = $row["instock"];
            $r->price = $row["price"];
            $r->description = $row["description"];
            $r->image = $row["image"];
            $shoes[] = $r;
        }
        return $shoes;
    }

    public function search($word,$category){
        $keyword = [];
        if($category == 'all'){
            $result = page("SELECT * FROM upload_product WHERE name LIKE '%$word%' AND instock != 0 ORDER BY date ");
        }else{
            $result = page("SELECT * FROM upload_product WHERE name LIKE '$word%' AND category = '$cate' AND instock != 0 ORDER BY id ");
        }
        
        while($row = mysqli_fetch_assoc($result)){
            $r = new User();
            $r->id = $row["id"];
            $r->name = $row["name"];
            $r->gender = $row["gender"];
            $r->category = $row["category"];
            $r->instock = $row["instock"];
            $r->price = $row["price"];
            $r->description = $row["description"];
            $r->image = $row["image"];
            $keyword[] = $r;
        }
        return $keyword;
    }

    
};
