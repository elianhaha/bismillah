var keyword = document.getElementById("keyword");
var tombolcari = document.getElementById("tombol-cari");
var container = document.getElementById("container");

keyword.addEventListener("keyup", function () {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    //xhr.readyState = 0 - 4 kesiapan sumber yang sudah siap
    //xhr.status = 200 artinya sukses
    if (xhr.readyState === 4 && xhr.status === 200) {
      container.innerHTML = xhr.responseText;
    }
  };
  xhr.open("GET", "ajax/admin.php?keyword=" + keyword.value, true);
  xhr.send();
});
