//PESQUISA USANDO AJAX E PHP | JOSÉ AUGUSTO
function take_names(str){
  let rows = document.getElementsByName('tr_rows');
  let elements = document.getElementsByName("td_name");
  let saved_rows = [];
  let str_letters = str.split(/(?!$)/u);
  for (var i=0;i<elements.length;i++){
    let element_letters = elements[i].innerHTML.split(/(?!$)/u);
    for (var j=0;j<element_letters.length;j++){
      if (str_letters.includes(element_letters[j])){
        console.log(element_letters[j]);
        rows[i].style.display = "";
        break
      } else {
        rows[i].style.display = "none";
      }
    }
  }
}

function redisplay_all(){
  let rows = document.getElementsByName('tr_rows');
  for (var i=0;i<rows.length;i++){
    rows[i].style.display = "";
  }
}

function mostrarContatosSearch(str) {
    if (str.length == 0) {
      redisplay_all();
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log("q="+str);
          take_names(str);
        }
      };
      xmlhttp.open("GET", "index.php?q=" + str, true);
      xmlhttp.send();
    }
}