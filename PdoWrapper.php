<?php

/**
 * PdoWrapper as the name suggests, is  a tiny PDO Wrapper Class,
 * to handle simple PDO-based CRUD statements with one or two lines of coding.
 * @author     Simon _eQ <https://github.com/simon-eQ>
 * @copyright  Copyright (c) 2013 Simon _eQ
 * @license    Do WTF you want with it.
 *
 */

class PdoWrapper
{

    public function __construct($dsn, $user, $pass)
    {
        try
        {
            parent::__construct($dsn, $user, $pass);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }



    public function doSimple($query, $value = null)
    {
        if(empty($value)){
            try{
                return parent::query($query);
            }catch(PDOException $e){

            }
        }
    }
}





















