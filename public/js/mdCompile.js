;function compile(content){
	var converter = new showdown.Converter();
	var html = converter.makeHtml(content);
	return html;
}
function onCompile(){
	var text = document.getElementById("content").value;
	var html = compile(text);
	document.getElementById("html_content").value = html;
	document.getElementById("view_content").innerHTML = html;
}
