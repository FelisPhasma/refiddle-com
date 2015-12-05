package runner;
/**
 * Java regex runner for Refiddle
 * Written by FelisPhasma
 * Copyright (c) FelisPhasma 2015 Under the MIT License
 * 
 */

public class Runner {
	public static void Main(String args[]){
		String action = args[0];
		String pattern = args[1];
		String corpus_text = args[2];
		String replace = args.length >=4 ? args[3] : "";
		
		if(action == "evaluate"){
			new Evaluate(pattern, corpus_text);
		} else if(action == "replace"){
			new Replace(pattern, corpus_text, replace);
		} else {
			System.out.println("{\"error\":\"Internal server error: unclear action\"}");
		}
	}
}
