<?php
require APPPATH . '/libraries/JWT123.php';

class CreatorJwt
{

    PRIVATE $key = "1234567890qwertyuiopmnbvcxzasdfghjkl"; 
    public function GenerateToken($data)
    {          
        $jwt = JWT::encode($data, $this->key);
        return $jwt;
    }
    


    public function DecodeToken($token)
    {          
        $decoded = JWT::decode($token, $this->key, array('HS256'));
        $decodedData = (array) $decoded;
        return $decodedData;
    }
}

?>