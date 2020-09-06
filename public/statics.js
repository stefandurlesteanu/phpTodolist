window.onload = () => window.location.pathname === '/Todolist/' ? loadTableData() : '';

function btnView() {
    let formFieldLength = document.getElementById("addForm").childElementCount;
    let minusBtn = document.getElementById("removeTaskBtn");
    console.log("1")
    if (formFieldLength <= 1){
        minusBtn.style.display = "none";
        console.log("2")
    }  else {
        minusBtn.style.display = "";
        console.log("3")
    }

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
            <td><input onchange="toggleTask(${entry['id']}, 'done')" type="checkbox" id="taskDone${entry['id']}"
             name="taskDone${entry['id']}" ${check} >
            <label for="scales"></label></td>          
            <td><button type="button" class="btn btn-primary" id="taskUpdate${entry['id']}" >Update</button></td>            
            <td><button type="button" class="btn btn-danger" id="taskDelete${entry['id']}" onclick="toggleTask(${entry['id']}, 'deleted')">Delete</button></td>
        </tr>

`
    })
}

function addNewTask(){
    let formField = document.getElementById("addForm");
    formField.innerHTML += `
         <fieldset style="border:1px solid #ccc !important; padding: 1em 16px; border-radius: 16px; margin-bottom: 2rem;">
            <legend>New Task:</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="taskName">Name</label>
                    <input type="text" class="form-control" id="taskName" name="taskName[]">
                </div>
                <div class="form-group col-md-6">
                    <label for="taskDueDate">Due Date</label>
                    <input type="date" class="form-control" id="taskDueDate" name="taskDueDate[]">
                </div>
                <div class="form-group col-md-12">
                    <label for="taskDescription">Description</label>
                    <textarea class="form-control" id="taskDescription"></textarea>
                </div>
                <div class="form-group col-md-8">
                    <label for="taskImage">Image</label>
                    <input type="file" class="form-control-file" id="taskImage" name="taskImage[]">
                </div>
            </div>
        </fieldset>
    `
}

function removeTask(){
    let formField = document.getElementById("addForm");
    formField.children[1].remove();
}

function toggleTask(id, row){
    let data = {
    'id': id,
    'row': row
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
        console.log(jsonResponse);
        loadTableData();
    })

}
