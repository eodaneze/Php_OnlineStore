// check nav height

let main_nav = document.querySelector(".main-nav");

window.addEventListener("scroll", () => {
  if (window.pageYOffset > 100) {
    main_nav.classList.add("all-nav");
  } else {
    main_nav.classList.remove("all-nav");
  }
});

// -----------back to top
let backtotop = document.querySelector(".back-to-top");
window.addEventListener("scroll", () => {
  if (window.scrollY > 100) {
    backtotop.classList.add("active");
  } else {
    backtotop.classList.remove("active");
  }
});

//--------------- end of back to top

// navbar
let menuItems = document.getElementById("MenuItems");
menuItems.style.maxHeight = "0px";

const menuToggle = () => {
  if (menuItems.style.maxHeight == "0px") {
    menuItems.style.maxHeight = "200px";
  } else {
    menuItems.style.maxHeight = "0px";
  }
};

// js for small product gallary swap
let productImg = document.getElementById("productImg");
// console.log(productImg.src);

let smallImg = document.getElementsByClassName("small-img");
// console.log(smallImg[0].src);

smallImg[0].onclick = function() {
    productImg.src = smallImg[0].src;
};
smallImg[1].onclick = function() {
    productImg.src = smallImg[1].src;
};
smallImg[2].onclick = function() {
    productImg.src = smallImg[2].src;
};
smallImg[3].onclick = function() {
    productImg.src = smallImg[3].src;
};