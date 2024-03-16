<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coupon Hostor</title>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <style>
      * {
        font-family: sans-serif;
      }
      body {
        margin: 0 0;
        overflow: hidden;
        font-size: 62.5%;
      }

      #svg-container {
        width: 100vw;
        height: 100vh;
        background: #000;
      }
      .waste {
        opacity: 1;
        /* filter: blur(2px); */
      }
      form {
        position: absolute;
        top: 23vh;
        left: 43vw;
        display: flex;
        flex-direction: column;
        gap: 2rem;
        padding: 2rem 2rem 3rem 2rem;
        background-color: transparent;
        border: white;
        box-shadow: 5px 5px 10px #ffffff;
        border-radius: 2rem;
        outline: none;
        max-width: 275.2px;
      }
      input {
        border: none;
        padding: 1rem 2rem 0.4rem 1.6rem;
        outline: none;
        border-radius: 0.8rem;
        font-size: 1.2em;
        transition: all 0.2s ease-in-out;
        border: 2px solid transparent;
      }
      input:hover {
        border-radius: 2rem;
        border: 2px solid rgb(241, 0, 0);
      }
      h1 {
        color: white;
        text-align: center;
        -webkit-user-select: none;
        user-select: none;
      }
      span {
        font-weight: bolder;
        color: white;
        text-transform: uppercase;
        text-align: center;
        margin-top: 1rem;
      }
      a {
        text-decoration: none;
        font-weight: bolder;
      }
      a:hover {
        color: lime;
      }
      a:active {
        color: red;
      }
      button {
        padding-left: 1rem;
        padding-right: 1rem;
        width: 80px;
        text-align: center;
        align-self: center;
        margin-top: -1rem;
        border-radius: 0.4rem;
        background: transparent;
        color: #ffffff;
        font-family: bolder;
        border: 2px solid #ffffff;
        transition: all 0.1s ease-in backwards;
        text-transform: uppercase;
      }
      button:hover {
        background-color: #ffffff;
        color: #000;
      }
      button:focus {
        color: red;
      }
      input:focus {
        border: 2px solid blue;
      }
      #toast-container {
        position: fixed;
        bottom: 20px;
        left: 0%;
        z-index: 1000;
      }

      .toast {
        display: none;
        padding: 10px 20px;
        border-radius: 5px;
        background-color: #ff0000;
        color: #fff;
        font-size: 1rem;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        margin-bottom: 10px;
        opacity: 0;
      }

      .toast.show {
        display: block;
        opacity: 1;
      }
    </style>
    <div id="toast-container"></div>
  </head>
  <body>
    <svg id="svg-container"></svg>

    <script>

    document.addEventListener('DOMContentLoaded', function () {
      if (JSON.parse(localStorage.getItem("User"))) {
        const user = JSON.parse(localStorage.getItem("User"))
        if (user.userType === "Shopkeeper") window.location.href = "Shop.php"
        else window.location.href = "Hero.php"
      }
    });


    function showToast(message, duration = 3000, color) {
      const toastContainer = document.getElementById("toast-container");
      const toast = document.createElement("div");

      toast.className = "toast";
      toast.innerHTML = message;
      toast.style.background = color;


      toastContainer.appendChild(toast);
      setTimeout(() => {
        toast.classList.add("show");
        setTimeout(() => {
          toast.classList.remove("show");
          setTimeout(() => {
            toast.remove();
          }, 500);
        }, duration);
      }, 100);
    }


      function handleSubmit(event) {
        event.preventDefault();
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        let confirmPassword = document.getElementById("confirmPassword").value;
        let userType = undefined;
        let user={};
        const validator = "@shop";

        if (password.includes(validator)) userType = "Shopkeeper";
        else userType = "Normal";

        if (handleValidation(username, password, confirmPassword)) {

          function sendXMLreq(username,password,userType){
            const xhr = new XMLHttpRequest();
            const url = "SetUser.php";
            const params = JSON.stringify({ username: username, password: password ,userType:userType});

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-type", "application/json");

            xhr.onload = function () {
              if (xhr.status >=200 && xhr.status<300){
                if((JSON.parse(xhr.responseText)).status==='success'){
                  user = {
                    userType: userType,
                    username: username,
                  };

                  localStorage.setItem("User", JSON.stringify(user))
                  if (userType === "Shopkeeper") window.location.href = "Shop.php"
                  else window.location.href = "Hero.php"
                }
                if(JSON.parse(xhr.responseText).status==='error'){
                  showToast(JSON.parse(xhr.responseText).message, 3000,"linear-gradient(45deg, #FF5733, #FF0000)");
                }
                }
              else{
                  showToast(`Error ${xhr.status}`, 3000,"linear-gradient(45deg, #FF5733, #FF0000)");                  
                }

            };
            xhr.send(params);

          }
          sendXMLreq(username,password,userType)
          //send user to backend for storage and respond with status from backend
          //if db responds with "OK" window.location.href="Hero.php"
          //else showToast("Error while storing details", 3000);
        }
      }
      function handleValidation(username, password, confirmPassword) {
        if(username.length<6){
          showToast("Username must be greater than 5 words", 3000,"linear-gradient(45deg, #FF5733, #FF0000)");
          return false;
        }
        else if(password!==confirmPassword){
          showToast("Password and ConfirmPassword must be same", 3000,"linear-gradient(45deg, #FF5733, #FF0000)");
          return false;
        }
        else if(password.length<4){
          showToast("Password cannot be less than 4 words", 3000,"linear-gradient(45deg, #FF5733, #FF0000)");
          return false;
        }
        else{
          return true;  //make it true
        }
        //if username.length < 5 return false and call showToast("Username must be greater than 5 letters", 3000);
        //if password !== confirmpassword return false and call       showToast("Password and ConfirmPassword are not same", 3000);
        // return true  __for test purpose__also  return if everything works in function
      }

      const wheight = window.innerHeight;
      const wwidth = window.innerWidth;

      function pickColor() {
        const colors = [
          "red",
          "green",
          "blue",
          "yellow",
          "orange",
          "purple",
          "cyan",
          "magenta",
        ];
        const index = Math.floor(Math.random() * colors.length);
        return colors[index];
      }

      function random() {
        return Math.random();
      }

      function removeFromScreen() {
        svg
          .selectAll("circle")
          .interrupt()
          .transition()
          .duration(1500)
          .attr("cy", 1200)
          .ease(d3.easeCubic)
          .remove();
      }

      function setRandomMotion() {
        svg.selectAll("circle").each(function () {
          d3.select(this)
            .transition()
            .duration(random() * 8000)
            .attr("r", random() * 200)
            .attr("fill", pickColor())
            .ease(d3.easeBounce)
            .transition()
            .duration(random() * 5000)
            .attr("cx", random() * wwidth)
            .attr("cy", random() * wheight)
            .ease(d3.easeLinear);
        });
      }
      const svg = d3.select("#svg-container");

      function addCircles() {
        svg
          .append("circle")
          .attr("cx", random() * wwidth)
          .attr("cy", random() * 200)
          .attr("r", random() * 20)
          .attr("fill", pickColor())
          .on("click", function () {
            d3.select(this)
              .transition()
              .duration(random() * 8000)
              .attr("r", random() * 200)
              .attr("fill", pickColor())
              .ease(d3.easeBounce)
              .transition()
              .duration(random() * 5000)
              .attr("cx", random() * wwidth)
              .attr("cy", random() * wheight)
              .ease(d3.easeLinear);
          })
          .on("dblclick", function () {
            d3.select(this)
              .interrupt()
              .transition()
              .duration(1500)
              .attr("cy", 1200)
              .ease(d3.easeCubic);
          });
      }

      const remover = svg
        .append("rect")
        .attr("height", 40)
        .attr("width", 40)
        .attr("x", 1300)
        .attr("y", 600)
        .attr("fill", "red")
        .on("click", removeFromScreen);

      const adder = svg
        .append("rect")
        .attr("height", 40)
        .attr("width", 40)
        .attr("x", 1250)
        .attr("y", 600)
        .attr("fill", "limegreen")
        .on("click", addCircles);

      const mover = svg
        .append("rect")
        .attr("height", 40)
        .attr("width", 40)
        .attr("x", 1350)
        .attr("y", 600)
        .attr("fill", "blue")
        .on("click", setRandomMotion);


    </script>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="handleSubmit(event)"  >  
    <h1>Register</h1>
    <input
        type="text"
        placeholder="Username"
        name="username"
        id="username"
        autofocus
        required
    />
    <input
        type="password"
        placeholder="Password"
        id="password"
        name="password"
        required
    />
    <input
        type="password"
        placeholder="ConfirmPassword"
        id="confirmPassword"
        name="confirmPassword"
        required
    />
    <button type="submit" name="myButton">Submit</button>
    <span>Already a user ?<a href="./Login.php" target="_parent"> Login</a></span>
</form>
  </body>
</html>


        <!--
        $sql = "INSERT INTO useridpass (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters and execute the statement
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt->affected_rows > 0) {
            echo "User inserted successfully.";
        } else {
            echo "Error inserting user.";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close(); -->