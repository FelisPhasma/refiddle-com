package runner;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Evaluate {
	public Evaluate(String pattern, String corpus_text){
		Pattern r = Pattern.compile(pattern);
        Matcher m = r.matcher(corpus_text);
        
        String json = "{";
        int c = 0, l;
        while(m.find()){
        	c++;
        	l = m.end() - m.start();
            json += "\"" + l + "\":[" + m.start() + "," + l + "],";
        }
        json += "\"matchSummary\":{\"total\":" + c + "}";
        json += "}";
        
        System.out.println(json);
	}
}
