function markComplete(){
    console.log('Hello');
}

fetch('models/index.model.php').then((res) => res.json())
.then(response =>{
    console.log(response);
})