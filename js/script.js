// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}






const instanceMode = te.Sidenav.getInstance(
    document.getElementById("sidenav-2")
  );
  const modes = ["push", "over", "side"];
  
  modes.forEach((mode) => {
    const modeSwitch = document.getElementById(mode);
    modeSwitch.addEventListener("click", () => {
      const instance = te.Sidenav.getInstance(
        document.getElementById("sidenav-2")
      );
      instance.changeMode(mode);
      modes.forEach((el) => {
        if (el === mode) {
          ["text-primary-600", "border-primary-600"].forEach((item) =>
            modeSwitch.classList.remove(item)
          );
          modeSwitch.className +=
            " bg-primary text-white hover:bg-primary-700 active:bg-primary-800 focus:bg-primary-700 border-transparent";
        } else {
          const node = document.getElementById(el);
          node.className += " text-primary-600 border-primary-600";
          [
            "bg-primary",
            "text-white",
            "hover:bg-primary-700",
            "active:bg-primary-800",
            "focus:bg-primary-700",
            "border-transparent",
          ].forEach((item) => node.classList.remove(item));
        }
      });
    });
  });




  function reverse(){
    $("body").css("transform","scaleX(-1)")
  }
  
  function changeImage(){
    
  }
  
  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
  
  $(document).ready(function(){
    $('.tabs').tabs();
  });
  
  