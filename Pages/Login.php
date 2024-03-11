<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coupon Hoster</title>
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
        height: 200vh;
        background: #ffffff;
      }

      form {
        position: absolute;
        top: 23vh;
        left: 43vw;
        display: flex;
        flex-direction: column;
        gap: 2rem;
        padding: 5rem 2rem 4rem 2rem;
        background-color: transparent;
        border: black;
        box-shadow: 5px 5px 10px #000000;
        border-radius: 2rem;
        outline: none;
      }

      input {
        border: none;
        padding: 1rem 2rem 0.4rem 1.6rem;
        outline: none;
        border-radius: 0.8rem;
        font-size: 1.2em;
        background-color: #bbbbbb;
        color: #1b1b1b;
        transition: all 0.2s ease-in;
        border: 2px solid transparent;
      }

      input:hover {
        border-radius: 2rem;
        border: 2px solid rgb(241, 0, 0);
      }
      h1 {
        color: rgb(0, 0, 0);
        text-align: center;
        -webkit-user-select: none;
        user-select: none;
      }
      span {
        font-weight: bolder;
        color: rgb(0, 0, 0);
        text-align: center;
        margin-top: 1rem;
        font-size: 0.7rem;
      }

      a {
        text-decoration: none;
        text-transform: uppercase;
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
        color: #000000;
        font-family: bolder;
        border: 2px solid #000000;
        transition: all 0.1s ease-in backwards;
        text-transform: uppercase;
        scale: 1;
      }

      button:hover {
        background-color: #000000;
        color: #ffffff;
      }

      button:focus {
        color: red;
      }

      input:focus {
        border: 2px solid blue;
      }
@media screen and (max-width: 450px) {
  form {
    position: relative;
    top: 20vh;
    left: 0;
    width: 80%;
    padding: 2rem;
  }

  #svg-container {
    position: relative;
    top: 30vh;
    width: 100vw;
    height: 50vh;
  }

  svg rect {
    display: block;
    margin: 1rem auto;
  }
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
    if(JSON.parse(localStorage.getItem("User"))){
      const user=JSON.parse(localStorage.getItem("User"))
      if(user.userType==="Shopkeeper") window.location.href="Shop.php"
      else window.location.href="Hero.php"
    }
  });

      function showToast(message, duration = 3000) {
        const toastContainer = document.getElementById("toast-container");
        const toast = document.createElement("div");
        toast.className = "toast";
        toast.innerHTML = message;
        toastContainer.appendChild(toast);
        setTimeout(() => {
          toast.classList.add("show");
          setTimeout(() => {
            toast.classList.remove("show");
            setTimeout(() => {
              toast.remove(); // Remove the toast element here
            }, 500);
          }, duration);
        }, 100);
      }
      function handleSubmit(event) {
        event.preventDefault();
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        let userType=undefined;
        const validator="@shop"

        if(password.includes(validator)) userType="Shopkeeper";
        else userType="Normal";

        if(handleValidation(username,password)){
          function sendXMLreq(username,password){
            const xhr = new XMLHttpRequest();
            const url = "GetUser.php";
            const params = JSON.stringify({ username: username, password: password });

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-type", "application/json");

            xhr.onload = function () {
              if (xhr.status >=200 && xhr.status<300){
                if((JSON.parse(xhr.responseText)).status==='success'){
                  const user={
                    userType:userType,
                    username:username,
                  }
                  localStorage.setItem("User", JSON.stringify(user))
                  if (userType === "Shopkeeper") window.location.href = "Shop.php"
                  else window.location.href = "Hero.php"
                }
                if(JSON.parse(xhr.responseText).status==='error'){
                  showToast(JSON.parse(xhr.responseText).message, 3000);
                }
                }
              else{
                  showToast(`Error ${xhr.status}`, 3000);                  
                }

            };
            xhr.send(params);

          }
          sendXMLreq(username,password)
        }
      }
      function handleValidation(username,password){
        if(username.length<6){
          showToast("Username must be greater than 5 words", 3000);
          return false;
        }
        else if(password.length<4){
          showToast("Password cannot be less than 4 words", 3000);
          return false;
        }
        else{
          return true;  //make it true
        }
//search for username(unique) in database
//if not return false and call       showToast("No such user", 3000);
//if user found but password not matching return false and call       showToast("Incorrect username or password", 3000);
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
        .attr("class", "redrect")
        .attr("height", 40)
        .attr("width", 40)
        .attr("x", 1300)
        .attr("y", 600)
        .attr("fill", "red")
        .on("click", removeFromScreen);

      const adder = svg
        .append("rect")
        .attr("class", "greenrect")
        .attr("height", 40)
        .attr("width", 40)
        .attr("x", 1250)
        .attr("y", 600)
        .attr("fill", "limegreen")
        .on("click", addCircles);

      const mover = svg
        .append("rect")
        .attr("height", 40)
        .attr("class", "bluerect")
        .attr("width", 40)
        .attr("x", 1350)
        .attr("y", 600)
        .attr("fill", "blue")
        .on("click", setRandomMotion);
    </script>

    <form onsubmit="handleSubmit(event)">
      <h1>Login</h1>
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
      <button type="submit" id="myButton">Submit</button>
      <span
        >Never used before?<a href="./Register.php" target="_parent">
          Register</a
        ></span
      >
    </form>
  </body>
</html>
