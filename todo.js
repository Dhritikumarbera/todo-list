    function addTask() {
        let taskInput = document.getElementById("taskInput");
        let taskText = taskInput.value.trim();
        let taskTime = document.getElementById("taskTime").value; // Get the time from input
        if (taskText === "") return;

        // Get current time and format the due time
        let currentTime = new Date();
        let dueTime = new Date();
        let [hours, minutes] = taskTime.split(":");
        dueTime.setHours(hours, minutes, 0, 0); // Set the due time based on user input

        // Create the list item with task and due time
        let li = document.createElement("li");
        li.innerHTML = `${taskText} 
                        <span class="due-time">Due by: ${taskTime ? taskTime : 'N/A'}</span> 
                        <button onclick="removeTask(this)">X</button>`;
        
        // Check if the due time has passed and remove the task if true
        setInterval(function() {
            let now = new Date();
            if (now > dueTime) {
                li.remove(); // Remove the task if the due time is past
            }
        }, 60000); // Check every minute

        // Toggle completed state on task click
        li.addEventListener("click", function() {
            this.classList.toggle("completed");
        });
        
        // Add the task to the list
        document.getElementById("taskList").appendChild(li);
        
        // Clear input fields
        taskInput.value = "";
        document.getElementById("taskTime").value = "";
    }

    function removeTask(button) {
        button.parentElement.remove();
    }
