$(window).on("load", function(){
    $("#loadingScreen").fadeOut("slow");
    $("body").removeClass("loading");
});

const radioButtons = document.querySelectorAll(".radioBtn");
let heroContainer = document.getElementsByClassName("heroSection")[0];
let closeRegModal = document.getElementById("closeRegModal");
let regModal = document.getElementsByClassName("registrationModal")[0];
let openModal = document.getElementById("openModal");
let showSignIn = document.getElementById("signInBtn");

let counter = 1;

// ---------- Hero Image Change Handling ---------- \\

if(heroContainer !== undefined){
    for(const radioButton of radioButtons){
        radioButton.addEventListener("click", getSelectedRadio);    
    }

    function getSelectedRadio(){
        switch(this.value){
            case "img1":
                heroContainer.style.background = "url('images/hero/heroImg1.jpg') no-repeat center";
                heroContainer.style.backgroundSize = "cover";
                heroContainer.style.transition = "background-image 1s";
                counter = 0;
                break;

            case "img2":            
                heroContainer.style.background = "url('images/hero/heroImg2.jpg') no-repeat center";
                heroContainer.style.backgroundSize = "cover";
                heroContainer.style.transition = "background-image 1s";
                counter = 1;
                break;
            
            case "img3":
                heroContainer.style.background = "url('images/hero/heroImg3.jpg') no-repeat center";
                heroContainer.style.backgroundSize = "cover";
                heroContainer.style.transition = "background-image 1s";
                counter = 2;
                break;

            case "img4":
                heroContainer.style.background = "url('images/hero/heroImg4.jpg') no-repeat center";
                heroContainer.style.backgroundSize = "cover";
                heroContainer.style.transition = "background-image 1s";
                counter = 3;
                break;
        }
    }

    // ---------- Automate Hero Image Change ---------- \\

    setInterval(changeHero, 5000);

    function changeHero(){
        radioButtons[counter].checked = true;

        switch(radioButtons[counter].value){
            case "img1":
                heroContainer.style.background = "url('images/hero/heroImg1.jpg') no-repeat center";
                heroContainer.style.backgroundSize = "cover";
                heroContainer.style.transition = "background-image 1s";
                break;

            case "img2":            
                heroContainer.style.background = "url('images/hero/heroImg2.jpg') no-repeat center";
                heroContainer.style.backgroundSize = "cover";
                heroContainer.style.transition = "background-image 1s";
                break;
            
            case "img3":
                heroContainer.style.background = "url('images/hero/heroImg3.jpg') no-repeat center";
                heroContainer.style.backgroundSize = "cover";
                heroContainer.style.transition = "background-image 1s";
                break;

            case "img4":
                heroContainer.style.background = "url('images/hero/heroImg4.jpg') no-repeat center";
                heroContainer.style.backgroundSize = "cover";
                heroContainer.style.transition = "background-image 1s";
                break;
        }

        counter++;

        if(counter === 4){
            counter = 0;
        }
    }
}

// ---------- Registration & Sign In Form Handling ---------- \\

closeRegModal.addEventListener("click", function () {
    regModal.style.display = "none";
});

if(openModal !== null){
    openModal.addEventListener("click", function() {
        regModal.style.display = "grid";
        document.getElementsByClassName("signInForm")[0].style.display = "flex";
        document.getElementsByClassName("signInFormContent")[0].style.display = "none";
    });
}

showSignIn.addEventListener("click", function(){
    document.getElementsByClassName("signInForm")[0].style.display = "none";
    document.getElementsByClassName("signInFormContent")[0].style.display = "flex";
});

// ---------- Print Out Selected File ---------- \\

var customFile = document.getElementById("profileImg");
let labelTxt = document.getElementById("labelTxt");

if(customFile !== null){
    customFile.addEventListener("change", function(input){
        var fileName = input.target.value.split('\\').pop();
        labelTxt.innerHTML = fileName;
    });
}

// ---------- Hide Cookie Div ---------- \\

let cookieBtn = document.getElementById("acceptCookieBtn");

if(cookieBtn !== null){
    cookieBtn.addEventListener("click", function(){
        document.getElementsByClassName("cookiePolicy")[0].style.display = "none";
    });
}

// ---------- Show User Div ---------- \\

let showUser = document.getElementsByClassName("showUser")[0];
let userData = document.getElementsByClassName("user-data")[0];

if(showUser !== undefined){
    showUser.addEventListener("click", function(){
        userData.style.display = "flex";
    });
}

// ---------- Close User Div ---------- \\

if(showUser !== undefined){
    document.getElementsByClassName("closeUserBtn")[0].addEventListener("click", function(){
        userData.style.display = "none";
    });
}

// ---------- Top Picks Scroll Handling ---------- \\

const scrollLeft = document.getElementById("scrollLeft");
const scrollRight = document.getElementById("scrollRight");
let picksContainer = document.getElementsByClassName("watches")[0];

if(scrollLeft !== null){
    scrollLeft.onclick = function(){
        if(innerWidth <= 834){
            if(innerWidth <= 428){
                sideScroll(picksContainer, 'left', 20, 200, 80);
            }

            else{
                sideScroll(picksContainer, 'left', 20, 550, 80);
            }
        }
        else{
            sideScroll(picksContainer, 'left', 20, 750, 80);
        }        
    }

    scrollRight.onclick = function(){
        if(innerWidth <= 834){            
            if(innerWidth <= 428){
                sideScroll(picksContainer, 'right', 20, 200, 80);
            }

            else{
                sideScroll(picksContainer, 'right', 20, 550, 80);
            }
        }

        else{        
            sideScroll(picksContainer, 'right', 20, 750, 80);
        }
    }

    function sideScroll(element, direction, speed, distance, step){
        scrollAmount = 0;
        var slideTimer = setInterval(function(){
            if(direction == 'left'){
                element.scrollLeft -= step;
            }

            else{
                element.scrollLeft += step;
            }

            scrollAmount += step;

            if(scrollAmount >= distance){
                window.clearInterval(slideTimer);
            }
        }, speed);
    }
}

// ---------- Display Detailed View of Clicked Item ---------- \\

let displayWatches = document.getElementsByClassName("displayWatches");
let formToSubmit = document.getElementsByClassName("productView");

if(displayWatches.length > 0){
    for(let i=0; i<displayWatches.length; i++){
        displayWatches[i].onclick = function(){
            formToSubmit[i].submit();
        }
    }
}

// ---------- Hide Account Created Div ---------- \\

document.getElementById("closeCreated").addEventListener("click", function() {
    document.getElementsByClassName("accountCreated")[0].style.display = "none";
});

// ---------- Fix Nav Bar after scroll ---------- \\

let navBar = document.getElementsByTagName("header")[0];
let sticky = navBar.offsetTop;

window.onscroll = function(){
    if(window.pageYOffset >= sticky){
        navBar.classList.add("makeFixed");
    }

    else{
        navBar.classList.remove("makeFixed");
    }
}

// ---------- Show/Hide links in mobile view ---------- \\

function showLinks(){
    let linkContainer = document.getElementById("linkContainer");

    if(linkContainer.className === "navLinks"){
        linkContainer.className += " displayFlex";
    }

    else{
        linkContainer.className = "navLinks";
    }
}