<?php
    function validatePassword($password) 
    {
        // Checking if the password is at least 8 characters long
        if (strlen($password) < 8) 
        {
            return 0;
        } 
        else 
        {
            $hasNumber = false;
            $hasSymbol = false;

            // Loop through each character of the password and checking if it is a number or a symbol
            for ($i = 0; $i < strlen($password); $i++) 
            {
                $char = $password[$i];

                if ($char == '|') 
                {
                    return 0; // The password contains the '|' symbol, so return 0 immediately
                } 
                else if (is_numeric($char)) 
                {
                    $hasNumber = true;
                } 
                else if (!ctype_alpha($char) && !is_numeric($char)) 
                {
                    $hasSymbol = true;
                }
            }

            // Check if the password contains at least one number and one symbol
            if (!$hasNumber) 
            {
                return 0;
            } 
            else if (!$hasSymbol) 
            {
                return 0;
            } 
            else 
            {
                return 1;
            }
        }
    }

    function validateURL($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) 
        {
            return 0;
        } 
        else 
        {
            return 1;
        }
    }

    function validateEmail($email)
    {
        $file = fopen('UserList.txt', "r");

        while (!feof($file))
        {
            $line = fgets($file);
            
            if (strpos($line, $email) !== false) 
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        fclose($file);
    }
?>
