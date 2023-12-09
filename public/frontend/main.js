function dropdownHandler(element) {
    let single = element.getElementsByTagName("ul")[0];
    single.classList.toggle("hidden");
  }
  
  function MenuHandler(el, val) {
    let MainList = el.parentElement.parentElement.getElementsByTagName("ul")[0];
    let closeIcon =
      el.parentElement.parentElement.getElementsByClassName("close-m-menu")[0];
    let showIcon =
      el.parentElement.parentElement.getElementsByClassName("show-m-menu")[0];
    if (val) {
      MainList.classList.remove("hidden");
      el.classList.add("hidden");
      closeIcon.classList.remove("hidden");
    } else {
      showIcon.classList.remove("hidden");
      MainList.classList.add("hidden");
      el.classList.add("hidden");
    }
  }
  // ------------------------------------------------------
  let sideBar = document.getElementById("mobile-nav");
  let menu = document.getElementById("menu");
  let cross = document.getElementById("cross");
  const sidebarHandler = (check) => {
    if (check) {
      sideBar.style.transform = "translateX(0px)";
      menu.classList.add("hidden");
      cross.classList.remove("hidden");
    } else {
      sideBar.style.transform = "translateX(-100%)";
      menu.classList.remove("hidden");
      cross.classList.add("hidden");
    }
  };
  let list = document.getElementById("list");
  let chevrondown = document.getElementById("chevrondown");
  let chevronup = document.getElementById("chevronup");
  const listHandler = (check) => {
    if (check) {
      list.classList.remove("hidden");
      chevrondown.classList.remove("hidden");
      chevronup.classList.add("hidden");
    } else {
      list.classList.add("hidden");
      chevrondown.classList.add("hidden");
      chevronup.classList.remove("hidden");
    }
  };
  
  
  
  
  
  
  
  const parentMenu = document.querySelectorAll('.parent_menu');
  const childMenu = document.querySelectorAll('.child_menu');
  
  parentMenu.forEach((button, index) => {
    button.addEventListener('click', () => {
      childMenu.forEach((content, contentIndex) => {
        if (contentIndex === index) {
          content.classList.toggle('show');
        } else {
          content.classList.remove('show');
        }
      });
    });
  });
  
  
  
  
  
  // Price Range
  (function () {
    var parent = document.querySelector(".range-slider");
    if (!parent) return;
  
    var rangeS = parent.querySelectorAll("input[type=range]"),
        numberS = parent.querySelectorAll("input[type=number]");
  
    rangeS.forEach(function (el) {
        el.oninput = function () {
            var slide1 = parseFloat(rangeS[0].value),
                slide2 = parseFloat(rangeS[1].value);
  
            if (slide1 > slide2) {
                [slide1, slide2] = [slide2, slide1];
                // var tmp = slide2;
                // slide2 = slide1;
                // slide1 = tmp;
            }
  
            numberS[0].value = slide1;
            numberS[1].value = slide2;
        };
    });
  
    numberS.forEach(function (el) {
        el.oninput = function () {
            var number1 = parseFloat(numberS[0].value),
                number2 = parseFloat(numberS[1].value);
  
            if (number1 > number2) {
                var tmp = number1;
                numberS[0].value = number2;
                numberS[1].value = tmp;
            }
  
            rangeS[0].value = number1;
            rangeS[1].value = number2;
        };
    });
  })();
  