const navSlide = ()=> {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    /*burger.addEventListener('click', ()=>{
        nav.classList.toggle('nav-active');
    });*/
    nav.classList.toggle('nav-active');

    //submenu dropdown for mobile
    var dropdown = document.getElementsByClassName("submenu-btn");
    var i;

    for(i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if(dropdownContent.style.display === "block" ) {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block"
            }
        });
    }
}

//navSlide();