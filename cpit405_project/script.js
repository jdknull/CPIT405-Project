function logout(){
    window.location.href = "index.php";
  }

function insert_page(){
    window.location.href = "insert.php";
}

function view_page(){
    window.location.href = "view.php";
}

function main_page() {
    window.location.href = "main.php";
}

function search_page(){
    window.location.href="search.php";
}


function showInputField() {
    var searchCriteria = document.getElementById("search-criteria").value;
    var inputFieldContainer = document.getElementById("input-field-container");
    inputFieldContainer.innerHTML = "";

    if (searchCriteria === "id") {
        var inputField = document.createElement("input");
        inputField.setAttribute("type", "number");
        inputField.setAttribute("name", "search-text");
        inputField.setAttribute("placeholder", "Enter ID");
        inputFieldContainer.appendChild(inputField);
    } else if (searchCriteria === "title") {
        var inputField = document.createElement("input");
        inputField.setAttribute("type", "text");
        inputField.setAttribute("name", "search-text");
        inputField.setAttribute("placeholder", "Enter Patent Title");
        inputFieldContainer.appendChild(inputField);
    } else if (searchCriteria === "year") {
        var inputField = document.createElement("input");
        inputField.setAttribute("type", "text");
        inputField.setAttribute("name", "search-text");
        inputField.setAttribute("placeholder", "Enter Year (e.g., 2022)");
        inputFieldContainer.appendChild(inputField);
    }
}
