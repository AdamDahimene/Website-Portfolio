document.addEventListener("DOMContentLoaded", function() {
    let form = document.getElementById("blog");
    form.addEventListener("submit", function(event) {
        if(document.getElementById("reset").click === true) {
            console.log("reset");
        } else if(document.getElementById("submit").click === true) {
            console.log("submit");
        }
        if(post(event) === false) {
            event.preventDefault();
        }
    });

    function post(event) {
        let title = document.getElementById("title").value;
        let content = document.getElementById("content").value;

        title = title.trim();
        content = content.trim();

        if(title === "" && content === "") {
            document.getElementById("title").style.border = "2px solid red";
            document.getElementById("content").style.border = "2px solid red";
            window.alert("Both fields are empty. Please fill them out.");
            return false;
        } else if(title === "") {
            document.getElementById("title").style.border = "2px solid red";
            document.getElementById("content").style.border = "2px solid black";
            window.alert("Title is empty. Please fill it out.");
            return false;
        } else if(content === "") {
            document.getElementById("content").style.border = "2px solid red";
            document.getElementById("title").style.border = "2px solid black";
            window.alert("Content is empty. Please fill it out.");
            return false;
        }

        return true;
    }

    let reset = document.getElementsByName("reset");
    form.addEventListener("reset", function(event) {
        if(clear(event) === false) {
            event.preventDefault();
        }
    });

    function clear(event) {
        let title = document.getElementById("title").value;
        let content = document.getElementById("content").value;

        if(title !== "" || content !== "") {
            let response = window.confirm("Are you sure you want to clear the form?");
            if(response === false) {
                return false;
            }
        }

        return true;
    }
});