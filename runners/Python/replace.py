import cgi
form = cgi.FieldStorage()

pattern = form["pattern"]
corpus_text = form["corpus_text"]
replace_text = form["replace_text"]

