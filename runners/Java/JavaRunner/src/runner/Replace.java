package runner;

import java.util.regex.Pattern;

public class Replace {
	public Replace(String pattern, String corpus_text, String replace){
		// Nice and short :)
		String json = "{\"replace\":\"" + Pattern.compile(pattern).matcher(corpus_text).replaceAll(replace) + "\"}";
		System.out.println(json);
	}
}
