


//navNode.prepend(siteLogo);


// sticky navigation
const getNav = document.querySelector("#site-navigation");

const navTop = getNav.offsetTop;


function stickNav() {
  
  if (window.scrollY >= navTop) {
  	//document.body.style.paddingTop = getNav.offsetHeight + 'px';
    document.body.classList.add('fixed-nav');
  } else {
  	//document.body.style.paddingTop = 0;
    document.body.classList.remove('fixed-nav');
  }
}

window.addEventListener('scroll', stickNav);




// appending logo to sticky nav bar

