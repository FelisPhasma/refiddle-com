<?php
    /**
     * PHP regex runner for Refiddle 
     * Written by FelisPhasma
     * Copyright (c) FelisPhasma 2015 Under the MIT Licence
     * 
     */
    
    // Custom error handeling is used, so turn off the error reporting
    error_reporting(0);
    @ini_set('display_errors', 0);
    
    if(empty($_POST)){
        // Safeguard against empty requests
        echo '{
          "replace": ""
        }';
    } else {
        // Get reguests values
        $pattern = $_POST["pattern"];
        $corpus_text = $_POST["corpus_text"];
        $replace_text = $_POST["replace_text"];
        
        // Provide error information for the user
        set_error_handler(function($errno, $errstr, $errfile, $errline) { 
            $json = "{";
                $json .= '"error":"' . $errstr . '"';
            $json .= "}";
            echo $json;
            die();
        });
        
        // Corpus text replacements
        $replaced = preg_replace($pattern, $replace_text, $corpus_text);
        $json = "{";
            $json .= '"replace":' . $replaced;
        $json .= "}";
        echo $json;
    }
