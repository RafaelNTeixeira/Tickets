window.onload=function(){
    var checkAdminId = document.getElementById("admin_id");
    var adminValue = checkAdminId.value;
    console.log(checkAdminId, "admin_idoioioio");

    var checkUserAccess = document.getElementById("check_user_access");
    var textValue = checkUserAccess.value;
    if(textValue == "Admin" || adminValue != 0){
        checkForUserAccess();
    }
        
    //fica à espera que se clique no btn "UPDATE"
    const form = document.querySelector(".form");
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        var formData = new FormData(form);
        form.append("admin_id", adminValue);
        fetch("http://localhost:9000/actions/update-user-action.php", {
            method: "POST",
            body: formData
        })
        .then(res => {
            console.log(res);
            if(adminValue != 0){
                window.location = "management-page.php";
            }
            else{
                window.location = "profile-page.php";
            }
        });
    });
}

function checkForUserAccess(){
    var departmentIdElem = document.getElementById("department_id");
    var userAccessElem = document.getElementById("user_access");
    var textValue = userAccessElem.options[userAccessElem.selectedIndex].text;
    if(!(textValue == "Agent")){
        departmentIdElem.style.visibility = "hidden";
        departmentIdElem.selectedIndex = 7;
    }
    else{
        departmentIdElem.style.visibility = "visible";
    }
}

