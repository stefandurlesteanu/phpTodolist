window.onload= loadTableData();

function markComplete(id){
    let checkBox = document.getElementById("taskDone"+id);
}

function loadTableData(){
    fetch('models/index-show-table')
        .then((res) => res.json())
        .then(response => {
            renderTableData(response);
        })
}

function renderTableData(data){
    let tableBody = document.getElementById("tableBody");
    tableBody.innerHTML ='';
    let counter = 1;

    data.map((entry) => {
        let check = parseInt(entry['done']) === 1 ? "checked" : '';
        console.log();
        tableBody.innerHTML+=`

            <tr id="${entry['id']}">
            <td>${counter++}</td>
            <td>${entry['name']}</td>           
            <td>${entry['description']}</td>           
            <td>${entry['due_date']}</td>            
            <td><img src="${entry['image']}" alt="" style="width: 8rem;"></td>           
            <td><input onchange="markComplete(${entry['id']})" type="checkbox" id="taskDone${entry['id']}"
             name="taskDone${entry['id']}" ${check} >
            <label for="scales"></label></td>          
            <td><button type="button" class="btn btn-primary" id="taskUpdate${entry['id']}" >Update</button></td>            
            <td><button type="button" class="btn btn-danger" id="taskDelete${entry['id']}" onclick="deleteTask(${entry['id']})">Delete</button></td>
        </tr>

`
    })
}

function deleteTask(id){
    let data = {
    'id': id,
    };

    let settings = {
    'method': 'POST',
    'headers': {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    },
    body: JSON.stringify(data),
    };

    fetch('models/index-model', settings)
    .then((serverResponse) => {
        return serverResponse.json();
    })
    .then((jsonResponse) => {

    })

}
