const 
icon_down = document.querySelector("#icon-down"),
  icon_chevron = document.querySelector("#icon-chevron"),
  icon_down1 = document.querySelector("#icon-down1"),
  icon_chevron1 = document.querySelector("#icon-chevron1"),
  icon_down2 = document.querySelector("#icon-down2"),
  icon_chevron2 = document.querySelector("#icon-chevron2"),
   icon_down4 = document.querySelector("#icon-down4"),
  icon_chevron4 = document.querySelector("#icon-chevron4");
  
if (
  icon_down &&
  icon_chevron &&
  icon_down1 &&
  icon_chevron1 &&
  icon_down2 &&
  icon_chevron2 &&
  icon_down4 &&
  icon_chevron4
) {
  icon_down.addEventListener("click", (e) => {
    document.querySelector("#options1").style.display = "block";
    document.querySelector("#icon-down").style.display = "none";
    document.querySelector("#icon-chevron").style.display = "block";
  });

  icon_chevron.addEventListener("click", (e) => {
    document.querySelector("#options1").style.display = "none";
    document.querySelector("#icon-chevron").style.display = "none";
    document.querySelector("#icon-down").style.display = "block";
  });

  icon_down1.addEventListener("click", (e) => {
    document.querySelector("#options2").style.display = "block";
    document.querySelector("#icon-down1").style.display = "none";
    document.querySelector("#icon-chevron1").style.display = "block";
  });

  icon_chevron1.addEventListener("click", (e) => {
    document.querySelector("#options2").style.display = "none";
    document.querySelector("#icon-chevron1").style.display = "none";
    document.querySelector("#icon-down1").style.display = "block";
  });

  icon_down2.addEventListener("click", (e) => {
    document.querySelector("#options3").style.display = "block";
    document.querySelector("#icon-down2").style.display = "none";
    document.querySelector("#icon-chevron2").style.display = "block";
  });

  icon_chevron2.addEventListener("click", (e) => {
    document.querySelector("#options3").style.display = "none";
    document.querySelector("#icon-chevron2").style.display = "none";
    document.querySelector("#icon-down2").style.display = "block";
  });

 
  

  icon_down4.addEventListener("click", (e) => {
    document.querySelector("#options5").style.display = "block";
    document.querySelector("#icon-down4").style.display = "none";
    document.querySelector("#icon-chevron4").style.display = "block";
  });

  icon_chevron4.addEventListener("click", (e) => {
    document.querySelector("#options5").style.display = "none";
    document.querySelector("#icon-chevron4").style.display = "none";
    document.querySelector("#icon-down4").style.display = "block";
  });
}


