let createStatButton = document.getElementById('create-stat-button');
let createStatForm = document.getElementById('create-stat-form');
let updateStatButton = document.getElementById('update-stat-button');
let deleteStatButton = document.getElementById('delete-stat-button');

let isFormDisplaying = false;
let updateStatForm = document.getElementById('update-stat-form');
let isUpdateFormDisplaying = false;
let deleteStatForm = document.getElementById('delete-stat-form');
let isDeleteFormDisplaying = false;


createStatButton.onclick = function() {
    //show form
    if(isFormDisplaying==false){
        createStatForm.style.display = 'block';
        isFormDisplaying = true;
    }else{
    //hide form
        createStatForm.style.display = 'none';
        isFormDisplaying = false;
    }
}

//toggle update form

updateStatButton.onclick = function() {
    
    if(isUpdateFormDisplaying==false){
        //display update form
        updateStatForm.style.display = 'block';
        isUpdateFormDisplaying = true;
    }else{
        //hide the update form
        updateStatForm.style.display = 'none';
        isUpdateFormDisplaying = false;
    }
}

//toggle delete form
deleteStatButton.onclick = function() {
    if(isDeleteFormDisplaying==false){
        //display update form
        deleteStatForm.style.display = 'block';
        isDeleteFormDisplaying = true;
    }else{
        //hide the update form
        deleteStatForm.style.display = 'none';
        isDeleteFormDisplaying = false;
    }
}