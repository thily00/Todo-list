var button = document.getElementById("button");
var editButton = document.getElementsByClassName("fa fa-pencil-square-o facE");
var popup = document.getElementById("popupAdd");
var popupEdit = document.getElementById("popupEdit");
var close = document.getElementById("closeform");
var closeEdit = document.getElementById("closeformE");


/*Array.prototype.forEach.call(editButton, function(element) {
  element.addEventListener('click', function() {
    console.log('yo');
  });
}); */


button.onclick = function(){
    popup.style.display="block";
}

close.onclick =function(){
    popup.style.display="none";
}
