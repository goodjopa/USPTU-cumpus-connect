const form = document.querySelector('#forma');
const taskInput1 = document.querySelector('#taskInput1');
const taskInput2 = document.querySelector('#taskInput2');
const taskInput3 = document.querySelector('#taskInput3');
const taskInput4 = document.querySelector('#taskInput4');

let tasks = [];
console.log(tasks);
form.addEventListener('submit', function(event){
    event.preventDefault();

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../php-files/request-to-create.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('name=' + taskText1 + '&number=' + taskText2 + '&datetime=' + taskText3 + '&interes=' + taskText4);

    const taskText1 = taskInput1.value;
    const taskText2 = taskInput2.value;
    const taskText3 = taskInput3.value;
    const taskText4 = taskInput4.value;

    const newTask = {
        id: Date.now(),
        text1: taskText1,
        text2: taskText2,
        text3: taskText3,
        text4: taskText4,
        done: false,
    };
    tasks.push(newTask);
    console.log(tasks);
    localStorage.setItem('tasks', JSON.stringify(tasks));
});