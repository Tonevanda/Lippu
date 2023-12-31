const getWithAsyncAwait = async (getType) => {
    var response;
    let clientTickets = false;

    switch (getType) {
        case 'all_active_tickets':
            if(order === '' && sort===''){
                response = await fetch("../actions/get_all_active_tickets_action.php");
            } else{
                response = await fetch("../actions/get_all_active_tickets_action.php?order="+order+"&sort="+sort);
            }
            break;
        case 'all_department_active_tickets':
            if(order === '' && sort===''){
                response = await fetch("../actions/get_all_active_tickets_action.php");
            } else{
                response = await fetch("../actions/get_all_active_tickets_action.php?order="+order+"&sort="+sort);
            }
            break;
        case 'assigned_tickets':
            if(order === '' && sort===''){
                response = await fetch("../actions/get_assigned_tickets_action.php");
            } else{
                response = await fetch("../actions/get_assigned_tickets_action.php?order="+order+"&sort="+sort);
            }
            break;
        case 'user_active_tickets':
            clientTickets = true;
            response = await fetch("../actions/get_user_active_tickets_action.php");
            break;
        case 'user_closed_tickets':
            clientTickets = true;
            response = await fetch("../actions/get_user_closed_tickets_action.php");
            break;
        case 'user_all_tickets':
            clientTickets = true;
            response = await fetch("../actions/get_user_tickets_action.php");
            break;
        default:
            console.log("Error while getting type of getTickets");
            return false;
    }

    
    try {
        const jsonResponse = await response.json();
        const userType = document.querySelector('#user_type').value;
    
        const elem = document.querySelector('.tickets');
        elem.innerHTML = "";
        
        for (let i = 0; i < jsonResponse.length; i++) {
            const ticket = jsonResponse[i];

            const div = document.createElement("div");
            div.classList.add('ticket');
            if(true);
            if (userType !== 'Client' && !clientTickets) {
                div.classList.add(ticket.priority);
            } else {
                div.classList.add("userTicket");
            }
            
            div.innerHTML = "";

            const ticketUsername = document.createElement("p");
            ticketUsername.textContent = "Posted by: " + ticket.username; 
            ticketUsername.classList.add("ticketPostedBy");
            div.appendChild(ticketUsername);

            const ticketSubj = document.createElement("p");
            ticketSubj.textContent = "Subject: " + ticket.subject;
            ticketSubj.classList.add("ticketSubject");
            div.appendChild(ticketSubj);

            const ticketStatus = document.createElement("p");
            ticketStatus.textContent = "Status: " + ticket.status;
            ticketStatus.classList.add("ticketStatus");
            div.appendChild(ticketStatus);

            const ticketCreatedAt = document.createElement("p");
            ticketCreatedAt.textContent = ticket.created_at;
            ticketCreatedAt.classList.add("ticketCreatedAt");
            div.appendChild(ticketCreatedAt);

            elem.appendChild(div);

            div.addEventListener('click', (event) =>{
                event.preventDefault();

                window.location.href = "../pages/ticket_page.php?id=" + ticket.id;
            })
            
        }
      } catch (error) {
        console.error('Error parsing JSON:', error);
      }

    
};

var order = '';
var sort = '';

const getSection = document.querySelector('.tickets');
const getType = getSection.getAttribute('id');
getWithAsyncAwait(getType);
setInterval(() => {
    getWithAsyncAwait(getType);
}, 1000);

const form = document.getElementById('sort_tickets_form');

if(form!==null){
    form.addEventListener('submit', (event) => {

        event.preventDefault();
        order = document.getElementById('order').value;
        sort = document.getElementById('sort').value;
        getWithAsyncAwait(getType);
      });
}
