;function compile(){
  var text = document.getElementById("content").value;
  var converter = new showdown.Converter();
  var html = converter.makeHtml(text);
  document.getElementById("preview").innerHTML = html;
}