const memberAdd = document.getElementById("memberAdd");
const advisorAdd = document.getElementById("advisorAdd");

memberAdd.addEventListener("click", () => {
    const memberInput = document.createElement("input");
    const memberCol = document.getElementById("memberCol");
    memberCol.appendChild(memberInput);
    memberInput.setAttribute("class", "form-control border border-dark mt-3");
    memberInput.setAttribute("type", "text");
    memberInput.setAttribute("name", "advisors[]");
});

advisorAdd.addEventListener("click", () => {
    const advisorInput = document.createElement("input");
    const advisorCol = document.getElementById("advisorCol");
    advisorCol.appendChild(advisorInput);
    advisorInput.setAttribute("class", "form-control border border-dark mt-3");
    advisorInput.setAttribute("type", "text");
    advisorInput.setAttribute("name", "projectadvisors[]");
});
