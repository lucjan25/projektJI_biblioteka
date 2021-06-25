function Search() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("inputContent");
  filter = input.value.toUpperCase();
  table = document.getElementById("ksiazkiTab");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    tdArr = tr[i].getElementsByTagName("td");
    for (j = 0; j < tdArr.length; j++){
      td = tdArr [j];
      if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 ) {
        tr[i].style.display = "";
        break;
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
}