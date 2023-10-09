// function getUserInfo(user_id){
//     window.location = "update-user-page.php";

//     // var formData = new FormData(form);
//     fetch("../actions/update-agent-client-action.php?user_id=" + user_id, {
//         method: "GET",
//     })
//     .then(res => res.json())
//     .then(res => console.log(res), window.location = "http://localhost:9000/update-user-page.php");
// }

//teve que ser chamada esta funçao porque o link estava a dar erro no loop
function goToUpdate(user_id, admin_id){
    window.location = "update-user-page.php?user_id=" + user_id + "&admin_id=" + admin_id;
}