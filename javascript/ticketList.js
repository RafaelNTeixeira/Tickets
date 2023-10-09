
function displayTicketList() {
    let htmlString = "";
    let xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        let main = document.querySelector(".tickets");
        let list = JSON.parse(this.responseText);
        console.log(list);
        for(let i = 0; i < list.length; i++){
            htmlString += `<li class="ticket">
                                <h2 class="ticket-status">Status: ${list[i].ticket_status} </h2>
                                <h3>Responsible Department: ${list[i].department_name}</h3>
                                <div class="ticket-content">
                                    <p>${list[i].title}
                                    </p>
                                </div>
                            </li>`;
        }
        main.innerHTML = htmlString;
    }
    xhttp.open("GET", "../actions/getTicketList.php", true);
    xhttp.send();
}

window.onload=function(){
    displayTicketList();
}