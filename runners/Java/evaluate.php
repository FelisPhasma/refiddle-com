<?php
    /**
     * PHP messenger for the Java regex runner for Refiddle 
     * This code will handle form posts from Regiddle intended 
     * for the Java regex runner. Mainly because I do not want 
     * to write it entirely in JSP.
     *
     * Written by FelisPhasma
     * Copyright (c) FelisPhasma 2015 Under the MIT License
     * 
     */
    
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
        
        $output = shell_exec('/evaluate.class "evaluate" ' . escapeshellarg($pattern) . ' ' . escapeshellarg($corpus_text));
        echo $output;
    }
