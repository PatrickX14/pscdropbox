<!DOCTYPE html>
<html>
<head>
    <title>Add and Remove Input Elements</title>
</head>
<body>
    <button onclick="addInput()">Add Input</button>
    <button onclick="removeInput()">Remove Input</button>
    <div id="inputContainer">
        <!-- Input elements will be added/removed here -->
    </div>

    <script>
        function addInput() {
            // Create a new input element
            var inputElement = document.createElement("input");
            inputElement.type = "text";

            // Add the input element to the container
            var inputContainer = document.getElementById("inputContainer");
            inputContainer.appendChild(inputElement);
        }

        function removeInput() {
            var inputContainer = document.getElementById("inputContainer");
            var inputElements = inputContainer.getElementsByTagName("input");

            if (inputElements.length > 0) {
                // Remove the last input element
                inputContainer.removeChild(inputElements[inputElements.length - 1]);
            }
        }
    </script>
</body>
</html>
