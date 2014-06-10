<?php 

/**
 * A pdo-wrapper class
 * 
 * @category PDOWrapper
 * @license  Free / Luke 3:11
 * @version  1.0.0
 * @link     https://github.com/bivoc/pdowrapper/
 * @author   bivoc. ~ The force is strong with this one.
 */
class PdoWrapper extends PDO
{
    public function __construct($dsn, $user, $pass, $options = null)
    {
        try{
            parent::__construct($dsn, $user, $pass, $options = null);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public static function wrap($query, array $value = []){
        if(!empty($value)){
            
        }
    }



    /**
     * Main query builder method. accepts the statement!
     *
     * @param $query  Build your statement query here
     * @param null $value pass the values as array for the execute() method
     * @param null $error assign error for later error checking.
     * @return $this|array if query was a SELECT statement, then we'll get the $stmt object
     */
    public function wrap($query, $value = null, &$error = null)
    {
        /**
         *  if $value is empty/null, then do a query() statement only
         */
        if(!$value)
        {
            if(parent::query($query) == false)
            {
                $error = 'Query failed. Use propery try/catch method to capture the error';
            }
           
             /**
              * if there aren't any errors, return the PDO statement itself.
              */
            return parent::query($query);
        }


        /**
         *  if $value is not empty, then use prepare method, by passing the $value to be executed
         */
        $stmt = parent::prepare($query);
        $stmt->execute($value);


        /**
         * 
         * Checking for string 'SELECT' allows us to know what kind of query was passed
         * therefore, if it was SELECT we can return the $stmt object
         */
        if(stripos('SELECT', $query) < 5)
        {
            if((int)$stmt->errorCode()){
                $error = $stmt->errorInfo();
            }
            return $error ? $this : $stmt;
        }
        

        /**
         * remeber errorCode gives '0000' if there are no errors, so only
         * casting it to int will give '0' or meaning there wasn't any error. 
         * othewise $error will be initialized. 
         */
         
           if((int)$stmt->errorCode()){
                $error = $stmt->errorInfo();
            }
         return $this;

    }

}
