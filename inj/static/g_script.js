
function login_action(){
    let e = document.querySelector("#g_contents");
    document.querySelector("#input_btn").innerText="Login";
    e.children[0].action = "/login"
    Posters.style.display="none";
    if(e.style.display == 'none'){

        e.style.display = "block";
        e.children[0].style.display = "block";

    }else{

        e.style.display = 'none';
        e.children[0].style.display = "none";

    }
}

function sign_up(){
    let e = document.querySelector("#g_contents");
    document.querySelector("#input_btn").innerText="Sign up";
    e.children[0].action = "/sign_up";
    Posters.style.display="none";
    if(e.style.display == 'none'){

        e.style.display = "block";
        e.children[0].style.display = "block";

    }else{

        e.style.display = 'none';
        e.children[0].style.display = "none";

    }
}

function play(){
    let e = document.querySelector("#g_contents");
    inputter.style.display="none";
    Posters.style.display="flex";
    if(e.style.display == 'none'){

        e.style.display = "block";
        

    }else{

        e.style.display = 'none';
        

    }
}