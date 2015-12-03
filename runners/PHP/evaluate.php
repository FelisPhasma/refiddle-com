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
          "matchSummary": { 
            "total":0
          }
        }';
    } else {
        // Get reguests values
        $pattern = $_POST["pattern"];
        $corpus_text = $_POST["corpus_text"];
        
        // Provide error information for the user
        set_error_handler(function($errno, $errstr, $errfile, $errline) { 
            $json = "{";
                $json .= '"error":"' . substr($errstr, 18) . '"';
            $json .= "}";
            echo $json;
            die();
        });
        
        // Evaluation
        preg_match_all($pattern, $corpus_text, $matches, PREG_OFFSET_CAPTURE);
        $json = "{";
        $realMatches = $matches[0];
        foreach($realMatches as &$item){
            $json .= '"' . $item[1] . '": [' . $item[1] . ',' . strlen($item[0]) . '],';
        }
        $json .= '"matchSummary": { 
            "total":' . count($matches) . '
        }';
        $json .= "}";
        echo $json;
    }
