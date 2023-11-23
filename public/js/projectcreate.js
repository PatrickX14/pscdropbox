const memberAdd = document.getElementById("memberAdd");
const memberRemove = document.getElementById("memberRemove");
const advisorAdd = document.getElementById("advisorAdd");
const advisorRemove = document.getElementById("advisorRemove");

memberAdd.addEventListener("click", () => {
    const memberInput = document.createElement("input");
    const memberCol = document.getElementById("memberCol");
    memberCol.appendChild(memberInput);
    memberInput.setAttribute("class", "form-control border border-dark mt-3");
    memberInput.setAttribute("type", "text");
    memberInput.setAttribute("name", "projectmembers[]");
    memberInput.setAttribute("id", "projectMember");
});

memberRemove.addEventListener("click", () => {
    const memberCol = document.getElementById("memberCol");
    const memberInput = memberCol.getElementsByTagName("input");
    if (memberInput.length > 0) {
        memberCol.removeChild(memberInput[memberInput.length - 1]);
    }
});

advisorRemove.addEventListener("click", () => {
    const advisorCol = document.getElementById("advisorCol");
    const advisorInput = advisorCol.getElementsByTagName("input");
    if (advisorInput.length > 0) {
        advisorCol.removeChild(advisorInput[advisorInput.length - 1]);
    }
});

advisorAdd.addEventListener("click", () => {
    const advisorInput = document.createElement("input");
    const advisorCol = document.getElementById("advisorCol");
    advisorCol.appendChild(advisorInput);
    advisorInput.setAttribute("class", "form-control border border-dark mt-3");
    advisorInput.setAttribute("type", "text");
    advisorInput.setAttribute("name", "projectadvisors[]");
    advisorInput.setAttribute("id", "advisor");
});
