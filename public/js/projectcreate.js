const memberCol = document.getElementById('memberCol');
const memberAdd = document.getElementById('memberAdd');
const advisorCol = document.getElementById('advisorCol');
const advisorAdd = document.getElementById('advisorAdd');


memberAdd.addEventListener("click", ()=>{
    const memberInput = document.createElement("input");
    memberCol.appendChild(memberInput);
    memberCol.classList.add([]);
});
