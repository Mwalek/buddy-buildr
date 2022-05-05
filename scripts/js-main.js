/* eslint-disable no-unused-vars */
/**
 * Buddy BUildr functions file.
 **/

/* Right Off-canvas Nav */

document.addEventListener("click", function(event) {
  const rsidenav = document.getElementById("Rsidenav");
  const target = findClosest(event.target, function(el) {
    return el.id == "Cen";
  });
  const targetTwo = findClosestTwo(event.target, function(el) {
    return el.id == "Rsidenav";
  });
  const targetThree = findClosestThree(event.target, function(el) {
    return el.id == "SearchIcon";
  });

  const targetFour = findClosestFour(event.target, function(el) {
    return el.id == "Notif";
  });

  if (!target && rsidenav.style.width == "250px" &&
  !targetTwo && !targetThree && !targetFour) {
    document.getElementById("Rsidenav").style.width = "0";
    document.getElementById("page").style.marginRight = "0";
    document.querySelector(".sticky-header .fixed-header").style.width = "100%";
  }
}, false);

function findClosest(element, fn) {
  if (!element) return undefined;
  return fn(element) ? element : findClosest(element.parentElement, fn);
}

function findClosestTwo(element, fn) {
  if (!element) return undefined;
  return fn(element) ? element : findClosest(element.parentElement, fn);
}

function findClosestThree(element, fn) {
  if (!element) return undefined;
  return fn(element) ? element : findClosest(element.parentElement, fn);
}

function findClosestFour(element, fn) {
  if (!element) return undefined;
  return fn(element) ? element : findClosest(element.parentElement, fn);
}

// eslint-disable-next-line no-unused-vars
function clickOffNav() {
  const x = document.getElementById("rightSidenav");
  if (x.style.width == "250px") {


  }
}

function RightNav() {
  const x = document.getElementById("Rsidenav");
  const xa = document.getElementById("community_container");
  const xb = document.getElementById("notifications_container");

  if (x.style.width == "250px" && xa.style.display == "none") {
    // hide xb show xa
    xa.style.display = "block";
    xb.style.display = "none";
  } else if (x.style.width == "250px") {
    document.getElementById("Rsidenav").style.width = "0";
    document.getElementById("page").style.marginRight = "0";
    document.querySelector(".sticky-header .fixed-header").style.width = "100%";
  } else {
    document.getElementById("Rsidenav").style.width = "250px";
    document.getElementById("page").style.marginRight = "250px";
    document.querySelector(
        ".sticky-header .fixed-header"
    ).style.width = "calc(100% - 250px)";
    // hide xb show xa
    xa.style.display = "block";
    xb.style.display = "none";
  }
}

/* end of Rsidenav */

// Wait for window load
window.onload = function() {
  const preload = document.getElementsByClassName("bb-pre-icon")[0];

  preload.style.opacity = "0";
  preload.remove();
};

/* Beginning of Sticky Header */

jQuery(document).ready(function( $ ) {
  $(window).trigger("scroll", function() {
    if ($(window).scrollTop() >= 60) {
      $("#masthead").addClass("fixed-header");
      $(".sticky-header #page").addClass("page-has-sticky");
    } else {
      $("#masthead").removeClass("fixed-header");
      $(".sticky-header #page").removeClass("page-has-sticky");
    }
  });
});

/* end of Sticky Header */

/* Beginning of search */


function controlSearch() {
  const x = document.getElementById("Rsidenav");
  const xa = document.getElementById("community_container");
  const xb = document.getElementById("notifications_container");

  if (x.style.width == "250px" && xa.style.display == "none") {
    // hide xb show xa
    xa.style.display = "block";
    xb.style.display = "none";
    document.getElementById("search-input").focus();
  } else if (x.style.width == "250px") {
    document.getElementById("Rsidenav").style.width = "0";
    document.getElementById("page").style.marginRight = "0";
    document.querySelector(".sticky-header .fixed-header").style.width = "100%";
  } else {
    document.getElementById("Rsidenav").style.width = "250px";
    document.getElementById("page").style.marginRight = "250px";
    document.querySelector(
        ".sticky-header .fixed-header"
    ).style.width = "calc(100% - 250px)";
    document.getElementById("search-input").focus();
    // hide xb show xa
    xa.style.display = "block";
    xb.style.display = "none";
  }
}

/* getElementsByClassName helper function
* e.g. Array.from(class).map((element)=>element.style.fontSize = "16px");
*/

function getClass(getClassfuncCont) {
  return document.getElementsByClassName(getClassfuncCont);
}

/* lSidenav */

function LeftNav() {
  const menuItems = document.querySelectorAll(".sidenav ul li");
  const offcanvasClose = getClass("offcanvas-close");
  const x = document.getElementById("lSidenav");
  function toggleMenuVisibility() {
    Array.from(menuItems).map((element)=>element.style.display = "block");
    Array.from(offcanvasClose).map((element)=>element.style.fontSize = "16px");
  }
  if (x.style.width == "40%" || x.style.width == "300px") {
    document.getElementById("lSidenav").style.width = "0";
    document.getElementById("Overlay").style.backgroundColor = "transparent";
    document.getElementById("Overlay").style.width = "0";
    Array.from(menuItems).map((element)=>element.style.display = "none");
    Array.from(offcanvasClose).map((element)=>element.style.fontSize = "0");
    setTimeout(toggleMenuVisibility, 500);
  } else {
    document.getElementById("lSidenav").style.width = "300px";
    document.getElementById(
        "Overlay"
    ).style.backgroundColor = "rgba(0,0,0,0.4)";
    document.getElementById("Overlay").style.width = "100%";
    Array.from(menuItems).map((element)=>element.style.display = "none");
    Array.from(offcanvasClose).map((element)=>element.style.fontSize = "0");
    setTimeout(toggleMenuVisibility, 250);
  }
}

/* end of lSidenav */

/* Sub menu hide */
jQuery(document).ready(function( $ ) {
  $(
      "<span class='submenu-button'><i class='fas fa-angle-down'></i></span>"
  ).insertAfter( ".app .menu-item-has-children>a" );
  $(".app .menu-item-has-children ul").hide();
  $(".submenu-button").on("click", function() {
    $(this).next("ul").toggle();
  });
});

/* Toggle add/remove "responsive" class to/from topnav when icon is clicked */
function mobileMenu() {
  const x = document.getElementById("site-navigation");
  const y = document.getElementById("Dmasthead");
  if (x.className === "main-navigation") {
    x.className += " responsive";
    y.className += " responsive";
  } else {
    x.className = "main-navigation";
    y.className = "site-header";
  }
}

/* Notifications */

function NotificationsNav() {
  const x = document.getElementById("Rsidenav");
  const xa = document.getElementById("community_container");
  const xb = document.getElementById("notifications_container");

  if (x.style.width == "250px" && xb.style.display == "none") {
    // show xb
    xa.style.display = "none";
    xb.style.display = "block";
  } else if (x.style.width == "250px" && xb.style.display == "block") {
    document.getElementById("Rsidenav").style.width = "0";
    document.getElementById("page").style.marginRight = "0";
    document.querySelector(".sticky-header .fixed-header").style.width = "100%";
  } else {
    document.getElementById("Rsidenav").style.width = "250px";
    document.getElementById("page").style.marginRight = "250px";
    document.querySelector(
        ".sticky-header .fixed-header"
    ).style.width = "calc(100% - 250px)";
    // show xb
    xa.style.display = "none";
    xb.style.display = "block";
  }
}

function NotificationsNav2() {
  const x = document.getElementById("Rsidenav");
  const y = document.getElementById("page");
  if (x.style.width == "250px") {
    x.style.width = "0";
    x.className = "sidenav rsidenav";
    y.style.marginRight = "0";
  } else {
    x.style.width = "250px";
    x.className += " jackrabbit";
    y.style.marginRight = "250px";
  }
}

/* end of Notifications */


function doNothing() {
  // This function is important but needs to be left empty :)
}

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function icon1Pop() {
  document.getElementById("icon1Dropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches(".dropbtn")) {
    const dropdowns = document.getElementsByClassName("dropdown-content");
    let i;
    for (i = 0; i < dropdowns.length; i++) {
      const openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};

// Jquery to toggle header right

jQuery(document).ready(function( $ ) {
  $(".toggle-header-right").on("click", function() {
    $("#header-right").toggle("slow");
    $(".toggle-header-right .alert_count").toggle("slow");
  });
});

/* Search Template */

jQuery(document).ready(function( $ ) {
  $.fn.toggleState = function(b) {
    $(this).stop().animate({
      width: b ? "300px" : "50px"
    }, 600, "easeOutElastic" );
  };
});

jQuery(document).ready(function( $ ) {
  const container = $(".container");
  const boxContainer = $(".search-box-container");
  const submit = $(".submit");
  const searchBox = $(".search-box");
  const response = $(".response");
  let isOpen = false;
  submit.on("mousedown", function(e) {
    e.preventDefault();
    boxContainer.toggleState(!isOpen);
    isOpen = !isOpen;
    if (!isOpen) {
      handleRequest();
    } else {
      searchBox.focus();
    }
  });
  searchBox.on( "keypress", function(e) {
    if (e.which === 13) {
      boxContainer.toggleState(false);
      isOpen = false;
      handleRequest();
    }
  });
  searchBox.on( "blur", function() {
    boxContainer.toggleState(false);
    isOpen = false;
  });
  function handleRequest() {
    // You could do an ajax request here...
    const value = searchBox.val();
    searchBox.val("");
    if (value.length > 0) {
      response.text(("Searching for \"" + value + "\" . . ."));
      response.animate({
        opacity: 1
      }, 300).delay(2000).animate({
        opacity: 0
      }, 300);
    }
  }
});

function openSidebar(evt, sidebarName) {
  // Declare all variables
  let i; const sidebartabcontent = ""; const sidebartablinks = "";

  // Get all elements with class="sidebar-tabcontent" and hide them
  sidebartabcontent = document.getElementsByClassName("sidebar-tabcontent");
  for (i = 0; i < sidebartabcontent.length; i++) {
    sidebartabcontent[i].style.display = "none";
  }

  // Get all elements with class="sidebar-tablinks" and remove "active" class.
  sidebartablinks = document.getElementsByClassName("sidebar-tablinks");
  for (i = 0; i < sidebartablinks.length; i++) {
    sidebartablinks[i].className = sidebartablinks[i].className.replace(
        " active", ""
    );
  }

  // Show current tab, and add "active" class to the button that opened the tab.
  document.getElementById(sidebarName).style.display = "block";
  /* evt.currentTarget.className += " active";*/
}

jQuery(document).ready(function( $ ) {
  // $("#defaultsidebarOpen").on("click", "");

  $(".toggle-header-search").on("click", function() {
    // $('.site-header-common').toggleClass('hide-common');
    // $(".site-header-common").css({ top: '-100%' });
    // $('.header-site-search').toggleClass('show-search');
    $(".search-field").trigger( "focus" );
    // $('.site-header').toggleClass('hideoverflow');
    /* $('.site-header').addClass('hideoverflow2');
        setTimeout(function () {
            $('.site-header').removeClass('hideoverflow2');
        }, 2000);*/
    const defHeaderTop = document.getElementsByClassName(
        "site-header-common"
    )[0].style.top;
    // console.log("The number is" + defHeaderTop);
  });

  // Position cursor in searchbox on Search Template
  $("#search").trigger( "focus" );
});

/* Code that changes the max-width of grid item if only one is displayed
jQuery(document).ready(function( $ ) {

    var m = document.getElementById("grid-wrap").childElementCount;
    var x = document.getElementsByClassName("grid-item");
    var i;
        if (m == "1") {
            for (i = 0; i < x.length; i++) {
                x[i].style.maxWidth = "350px";
            }
        }

});*/

const defHeaderTop = document.getElementsByClassName("site-header-common")[0];
const searchHeader = document.getElementsByClassName("header-site-search")[0];

const defaultSearch = {
  isOpen: false,
  open: function() {
    if ( defaultSearch.isOpen === false ) {
      defHeaderTop.style.top = "-100%";
      searchHeader.style.top = "-100%";
      defHeaderTop.style.left = "0";
      searchHeader.classList.add("show-search");
      console.log("You have opened the search!");
      defaultSearch.isOpen = true;
      return "You have opened the search!";
    }
  },
  close: function() {
    if ( defaultSearch.isOpen === true ) {
      defHeaderTop.style.top = "0";
      searchHeader.style.top = "0";
      defHeaderTop.style.left = "";
      searchHeader.classList.remove("show-search");
      console.log("The search has been closed!");
      defaultSearch.isOpen = false;
      return "Search now closed!";
    }
  }
};

