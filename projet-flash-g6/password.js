let bar = document.querySelector(".bar");
let msg = document.querySelector(".msg");
let strength_pwdBar = document.querySelector(".strength_pwdBar");
let password = document.querySelector(".password");
let valide_pwdBox = document.querySelector(".valide_pwdBox");


if(password.value.length === 0){
    strength_pwdBar.style.display = "none";
    valide_pwdBox.style.display = "none";
}

password.oninput = function (){

    if(password.value.length === 0){
        strength_pwdBar.style.display = "none";
        valide_pwdBox.style.display = "none";
    }


    //bar progress,color and message
    if((password.value.length >=8)&&(password.value.length <12)){
        strength_pwdBar.style.display = "flex";
        valide_pwdBox.style.display = "flex";
        bar.style.width = "20%";
        bar.style.backgroundColor = "red";
        msg.style.color = "red";
        msg.innerHTML = "Faible";
        msg.innerHTML = "Faible";
    }

    if((password.value.length >=12)&&(password.value.length <16)){
        strength_pwdBar.style.display = "flex";
        valide_pwdBox.style.display = "flex";
        bar.style.width = "40%";
        bar.style.backgroundColor = "orange";
        msg.style.color = "orange";
        msg.innerHTML = "Moyen";
    }

    if((password.value.length >=16)&&(password.value.length <18)){
        strength_pwdBar.style.display = "flex";
        valide_pwdBox.style.display = "flex";
        bar.style.width = "70%";
        bar.style.backgroundColor = "green";
        msg.style.color = "green";
        msg.innerHTML = "Fort";
    }

    if((password.value.length >=18)&&(password.value.length <=20)){
        strength_pwdBar.style.display = "flex";
        valide_pwdBox.style.display = "flex";
        bar.style.width = "100%";
        bar.style.backgroundColor = "green";
        msg.style.color = "green";
        msg.innerHTML = "Super fort";
    }
}

//click on eye to see password(transform password type to text)
function toggle(){
    let password = document.getElementById("password");
    let eye =document.getElementById("toggle");

    if(password.getAttribute("type") === "password"){
        password.setAttribute("type","text");
        eye.style.color = "#2c74d7"
    }
    else{
        password.setAttribute("type","password");
        eye.style.color = "#7e7e7e"
    }
}

