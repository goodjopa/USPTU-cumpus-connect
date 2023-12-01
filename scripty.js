const tasksList = document.querySelector('#tasksList');
const emptyList = document.querySelector('#emptyList');

let tasks = [];
if(localStorage.getItem('tasks')){
    tasks = JSON.parse(localStorage.getItem('tasks'));
    tasks.forEach(function(task) {
        const cssClass = task.done ? "task-title task-title--done" : "task-title"
    
        const taskHTML = `<li id ="${task.id}" class="list-group-item d-flex justify-content-between task-item">
                            <span class="${cssClass}">Название: ${task.text1}, Кол-во мест:${task.text2},Дата и время:${task.text3},Описание:${task.text4}</span>
                            <div class="task-item__buttons">
                                <button type="button" data-action="done" class="btn-action">
                                    <img src="../icon/tick.svg" alt="Done" width="18" height="18">
                                </button>
                                <button type="button" data-action="delete" class="btn-action">
                                    <img src="../icon/cross.svg" alt="Done" width="18" height="18">
                                </button>
                            </div>
                        </li>`;
    
        tasksList.insertAdjacentHTML('beforeend', taskHTML);
    });
}
checkEmptyList();
tasksList.addEventListener('click', deleteTask);
tasksList.addEventListener('click', doneTask);

function deleteTask (event){
    if (event.target.dataset.action !== 'delete') return

    const parenNode = event.target.closest('.list-group-item');

    const id = Number(parenNode.id);

    const index = tasks.findIndex((tasks) => tasks.id === id);
    tasks.splice(index, 1);
    savetoLS();
    parenNode.remove();
    checkEmptyList();
}
function doneTask (event){
    if (event.target.dataset.action !== 'done') return

    const parentNode = event.target.closest('.list-group-item');
    const id = Number(parentNode.id);
    const task =tasks.find((task)=> task.id === id);
    task.done = !task.done

    savetoLS();

    const taskTitle = parentNode.querySelector('.task-title');
    taskTitle.classList.toggle('task-title--done')
}
function checkEmptyList(){
    if (tasks.length === 0){
        const emptyListHTML = `<li id="emptyList" class="list-group-item empty-list">
                                    <img src="../icon/doughnut (2).png" alt="Empty" width="48" class="mt-3">
                                    <div class="empty-list__title">Еще никто не добавил ивент</div>
                                </li>`;
    tasksList.insertAdjacentHTML('afterbegin',emptyListHTML);
    }

    if (tasks.length > 0){
        const emptyListEl = document.querySelector('#emptyList');
        emptyListEl ? emptyListEl.remove() : null;
    }
}
function savetoLS(){
    localStorage.setItem('tasks', JSON.stringify(tasks))
}