<?php
    /**
     * PHP regex runner for Refiddle 
     * Written by FelisPhasma
     * Copyright (c) FelisPhasma 2015
     * 
     */
    error_reporting(0);
    @ini_set('display_errors', 0);
    
    if(empty($_POST)){
        echo '{
          "replace": ""
        }';
    } else {
        $pattern = $_POST["pattern"];
        $corpus_text = $_POST["corpus_text"];
        $replace_text = $_POST["replace_text"];
        
        set_error_handler(function($errno, $errstr, $errfile, $errline) { 
            $json = "{";
                $json .= '"error":"' . $errstr . '"';
            $json .= "}";
            echo $json;
            die();
        });
        $replaced = preg_replace($pattern, $replace_text, $corpus_text);
        $json = "{";
        $json .= '"replace":' . $replaced;
        $json .= "}";
        echo $json;
    }
