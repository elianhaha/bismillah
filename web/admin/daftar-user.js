var container = document.getElementById("container");
var keyword = document.getElementById("keyword");

keyword.addEventListener("keyup", function () {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      container.innerHTML = xhr.responseText;
    }
  };
  xhr.open("GET", "ajax/daftar-user.php?keyowrd=" + keyword.value, true);
  xhr.send();
});
