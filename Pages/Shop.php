<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coupon Hostor</title>
  <style>
    * {
      -webkit-user-select: none;
      user-select: none;
      font-family: sans-serif;
    }

    body {
      font-family: "Times New Roman", Times, serif;
      margin: 0px 0px;
      font-family: sans-serif;
      background: #000000e5;
      overflow: hidden;
      height: 100vh;
      width: 100vw;
    }

    .shop {
      font-size: 8rem;
      font-weight: 600;
      text-align: center;
      background: linear-gradient(to right,
          rgb(209, 0, 216),
          rgb(206, 11, 40));
      color: transparent;
      -webkit-background-clip: text;
      background-clip: text;
      text-shadow: 0 0 60px rgba(236, 34, 175, 0.736);
      animation: anime 1s infinite alternate;
      text-decoration: underline;
      position: relative;
      bottom: 80px;
      padding-bottom: 0.1rem;
    }

    @keyframes anime {
      100% {
        text-shadow: 0 0 60px rgba(255, 40, 94, 0.775);
      }
    }

    .logout {
      padding: 0.7rem 2rem;
      background: red;
      font-weight: 800;
      color: white;
      border-radius: 0.7rem;
      border: 2px solid rgb(255, 37, 37);
      transition: all 0.3s ease-in-out;
      z-index: 1000;
      scale: 1;
      position: absolute;
      top: 5rem;
      right: 3rem;
    }

    .logout:hover {
      scale: 1.1;
      /* Scale up on hover */
      background: rgb(255, 51, 51);
    }

    .logout:active {
      background: #85005f;
    }

    .Container {
      width: 100vw;
      height: 100vh;
      position: relative;
      top: -10rem;
      border-top: 2px solid white;
      display: grid;
      grid-template-columns: 1fr 3fr;
      column-gap: 2rem;
      margin-top: 5rem;
    }

    .head {
      width: 100vw;
      height: fit-content;
    }

    .right {
      border-left: 2px solid white;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .devopts {
      width: 100%;
      display: flex;
      justify-content: flex-end;
    }

    .devopts ul li {
      color: white;
    }

    ul {
      list-style-type: none;
      padding: 0;
      margin: 2rem 6rem;
      display: flex;
      justify-content: flex-end;
    }

    ul li {
      background: lime;
      width: 70px;
      text-align: center;
      padding: 9px 20px;
      color: #ffffff;
      border-radius: 0.7rem;
      cursor: pointer;
      font-size: 1.5rem;
      font-weight: bold;
      position: relative;
      left: 2.5rem;
      transition: all 0.1s ease-in-out;
      border: 2px solid rgb(5, 173, 5);
    }

    ul li:active {
      background-color: rgb(40, 253, 40);
      scale: 0.9;
    }

    .coupons {
      width: 50rem;
      height: 20rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 2rem;
      overflow-x: hidden;
      overflow-y: scroll;
      padding: 4rem 2rem;
      scroll-snap-type: y mandatory;
      scroll-snap-align: center;
      scroll-behavior: smooth;
      transition: all 0.2s ease-in-out;
    }


    .couponDragLeft {
      transform: translateX(-90rem);
    }

    .coupons::-webkit-scrollbar {
      width: 7px;
    }

    .coupons::-webkit-scrollbar-track {
      width: 9px;
      box-shadow: inset 1px 1px 1px #000;
    }

    .coupons::-webkit-scrollbar-thumb {
      background: gray;
      border-radius: 0.2rem;
    }

    .coupon-card {
      background-color: rgb(245, 245, 245);
      width: 50rem;
      min-height: 30vh;
      scroll-snap-align: center;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
      overflow: hidden;
      border-radius: 0.4rem;
      box-shadow: 2px 2px 5px #000000, 2px 2px 5px #000;
      transition: all 0.4s ease-in-out;
      opacity: 0.5;
      display: flex;
      flex-direction: column;
    }

    .coupon-card:hover {
      opacity: 1;
      scale:1.05;
      box-shadow: inset 0 -15px 15px -5px rgba(0, 0, 0, 0.5), inset 0 15px 15px -5px rgba(0, 0, 0, 0.5);
    }

    .coupon-card:first-child {
      opacity: 1;
    }

    .left {
      display: flex;
      justify-content: center;
    }

    #coupon_header {
      height: 5vh;
    }

    #coupon_header {
      padding-top: 0.8rem;
      padding-bottom: 0.1rem;
    }

    #coupon_desc {
      padding-top: 1.7rem;
      padding-bottom: 0.1rem;
      resize: none;
    }

    #coupon_header,
    #coupon_desc {
      background: transparent;
      border-radius: 0.5rem;
      border-bottom: 2px solid white;
      outline: none;
      color: whitesmoke;
    }

    .fetchimg_api {
      width: fit-content;
      padding: 0.5rem 2rem;
      font-size: 0.7rem;
      background: blue;
      border: 2px solid blue;
      color: white;
      text-align: center;
      align-self: center;
      font-weight: bold;
      transition: all 0.1s ease-in-out;
      border: 2px solid blue;
      border-radius: 0.3rem;
    }

    .fetchimg_api:active {
      scale: 0.9;
      background: lightskyblue;
    }

    .submit_btn {
      margin-top: 2rem;
      width: fit-content;
      padding: 0.4rem 6rem;
      text-align: center;
      align-self: center;
      background: blue;
      color: white;
      font-weight: bolder;
      transition: all 0.1s ease-in-out;
      border: 2px solid blue;
      border-radius: 0.3rem;

    }

    .submit_btn:active {
      scale: 0.9;
      background: lightskyblue;
    }

    #coupon_header:focus .header_label {
      font-size: 2rem;
    }

    .header_label {
      position: absolute;
      top: 2.3rem;
      color: white;
      left: 1rem;
      transition: all 0.3s ease-in-out;
    }

    .desc_label {
      position: absolute;
      top: 7rem;
      color: white;
      left: 1rem;
    }

    .coupon_form {
      display: flex;
      flex-direction: column;
      gap: 1.3rem;
      height: fit-content;
      margin-top: 3rem;
      margin-left: 2rem;
      width: 100%;
      padding: 2rem 0.3rem;
      position: relative;
      overflow: hidden;
      visibility: hidden;
      opacity: 0;
      transition: all 0.3s ease-in-out;
      transition-delay: 0.5s;
      transform: translateX(-10rem);
    }

    .show {
      visibility: visible;
      opacity: 1;
      transform: translateX(0rem);
    }

    #toast-container {
      position: fixed;
      bottom: 20px;
      left: 0%;
      z-index: 1000;
    }

    .toast {
      width: fit-content;
      display: none;
      padding: 10px 20px;
      border-radius: 5px;
      background: #08ff2d;
      color: #fff;
      font-size: 1rem;
      font-weight: bold;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
      margin-bottom: 10px;
      opacity: 0;
      transform: translateX(-10rem);

    }

    .toast.show {
      display: block;
      opacity: 1;
      transform: translateX(0rem);
    }

    .coupon_remove_btn {
      font-size: 2rem;
      position: absolute;
      top: 50%;
      right: 2rem;
      padding: 0.01rem 1rem;
      background-color: red;
      color: white;
      text-align: center;
      outline: none;
      border: 2px solid red;
      border-radius: 0.3rem;
      opacity: 1;
      transition: all 0.1s ease-in-out;
      z-index: 400;
    }

    .coupon_remove_btn:active {
      scale: 0.9;
      opacity: 0.9;
    }

    .coupon_header {
      transition: all 0.2s ease-in-out;
      scale: 1;
      text-align: center;
      margin: 0rem;
      width: 100%;
      text-align: start;
      color: transparent;
      background: linear-gradient(to right, #1609aa, #7516a9);
      max-height: 30%;
      font-size: 3rem;
      z-index: 201;
      /* -webkit-text-stroke: 2px black; */
      text-shadow: 2px 2px 30px #a27e7e;
      margin-bottom: 0.5rem;
      -webkit-background-clip: text;
      background-clip: text;
      transition: all 0.2s ease-in-out;
      animation: anime 1s infinite alternate;
      text-shadow: 2px 2px 5px #c3c3c3;
    }

    .coupon-card:hover .coupon_header {
      scale: 1.2;
      transform: translateX(10%);
    }

    .coupon_desc {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-weight: 800;
      width: 40%;
      height: fit-content;
      align-self: flex-start;
      background: linear-gradient(to right, violet, blue), linear-gradient(to bottom, violet, blue);
      max-height: 60%;
      color: white;
      z-index: 200;
      text-align: center;
      overflow: auto;
      transition: all 0.4s ease-in-out;
      transform: translateX(-40vw);
      letter-spacing: 1px;
      text-wrap: wrap;
      overflow-wrap: break-word;
      text-overflow: clip;
      margin: 0rem;
      border-bottom-right-radius: 0.3rem;
      border-top-right-radius: 0.3rem;
      padding: 0.3rem;

    }

    .coupon-card:hover .coupon_desc {
      overflow: auto;
      font-size: 1.1rem;
      transform: translateX(0rem);

    }

    .coupon_desc::-webkit-scrollbar {
      width: 2px;
    }

    .coupon_desc::-webkit-scrollbar-track {
      width: 9px;
      box-shadow: inset 1px 1px 1px #ffffff;
    }

    .coupon_desc::-webkit-scrollbar-thumb {
      background: rgb(180, 15, 15);
      border-radius: 0.2rem;
    }

    .coupon_footer {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-weight: bold;
      width: 100%;
      max-height: 10%;
      position: absolute;
      bottom: 0rem;
      text-align: center;
      transform: translateY(10rem);
      transition: all 0.2s ease-in-out;
      background: linear-gradient(to right, #85005f, #1609aa, #7516a9);
      color: white;
      z-index: 201;
    }

    .coupon-card:hover .coupon_footer {
      transform: translateY(0rem);
    }

    .coupon_date {
      position: absolute;
      bottom: 0.1rem;
      right: 1rem;
      transform: translateX(10rem);
      transition: all 0.2s ease-in-out;
    }

    .coupon-card:hover .coupon_date {
      transform: translateX(0rem);
    }

    .img {
      object-fit: cover;
      width: 100px;
      height: 50px;
      position: absolute;
      left: 19vw;
      bottom: 45vh;
      border: 1px dashed white;
      opacity: 0;
      transition: all 0.2s ease-in;
      transition-delay: 1.1s;
    }

    .imgshow {
      opacity: 1;
    }

    /* .skeleton{
      opacity:0.7;
      animation:skeleton-loading 1s linear infinite alternate;
    } */
    @keyframes skeleton-loading {
      0% {
        background-color: hsl(200, 20%, 70%);
      }

      100% {
        background-color: hsl(200, 20%, 95%);
      }
    }

    .couponCount {
      position: fixed;
      top: 8.5rem;
      left: 2rem;
      color: #ffffffc3;
      font-size: 1.2rem;
    }

    .numCount {
      position: fixed;
      top: 8.3rem;
      left: 10rem;
      color: #ffffffdd;
      font-size: 1.5rem;
    }

    .skeletonBody {
      width: 50rem;
      min-height: 30vh;
      scroll-snap-align: center;
      border-radius: 0.4rem;
      transition: all 0.4s ease-in-out;
      animation: skeleton-anime 1s linear infinite alternate;
      opacity: 0.5;
    }

    @keyframes skeleton-anime {
      0% {
        background-color: hsl(200, 20%, 70%);
      }

      100% {
        background-color: hsl(200, 20%, 85%);
      }
    }
  </style>
  <div id="toast-container"></div>
</head>

<body>
  <script>
    let img;

    document.addEventListener("DOMContentLoaded", function() {
      if (!JSON.parse(localStorage.getItem("User"))) {
        showToast("You are not logged in!", 3000, "linear-gradient(45deg, #FFA500, #FF4500)")
        setTimeout(() => {
          window.location.href = "./Login.php"
        }, 3000)
      } else if (JSON.parse(localStorage.getItem("User")).userType === "Normal") {
        showToast("Unauthorized!", 3000, "linear-gradient(45deg, #FFA500, #FF4500)")
        setTimeout(() => {
          window.location.href = "./Login.php"
        }, 3000)
      }
    });

    document.addEventListener("DOMContentLoaded", function() {
      const user = JSON.parse(localStorage.getItem("User"))
      const params = JSON.stringify({
        username: user.username
      });

      const xhr = new XMLHttpRequest();
      url = "./Loadcontent.php";

      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/json");


      xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
          try {
            if (JSON.parse(xhr.responseText).status === "success") {
              const responseData = JSON.parse(xhr.responseText);
              displayCoupons(responseData.data);
              showToast(responseData.message, 3000, "linear-gradient(45deg, #006400, #00FF00)");
              document.querySelector(".numCount").innerText = responseData.data.length;
            }
            if (JSON.parse(xhr.responseText).status === "error") {

              if (JSON.parse(localStorage.getItem("User")).userType === "Shopkeeper") {
                console.log("You have no previous coupons stored, create so people can see your shop")
                showToast(JSON.parse(xhr.responseText).message, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
              }
            }
          } catch (e) {
            showToast("There was some error! Try again later", 3000, "linear-gradient(45deg, #FF5733, #FF0000)")
          }

        } else {
          showToast(`Error ${xhr.status}`, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
        }
      };
      xhr.onerror = function() {
        showToast("Request Failed!", 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
      };
      xhr.send(params);
    });

    function displayCoupons(coupons) {
      const couponsContainer = document.querySelector(".coupons");
      const skeletonBodies = document.querySelectorAll(".skeletonBody");

      skeletonBodies.forEach(element => {
        element.remove();
      });

      coupons.forEach(coupon => {
        const couponCard = document.createElement("div");
        couponCard.style.backgroundImage = `url(${coupon.image})`;
        couponCard.setAttribute("data-id", coupon.id);
        couponCard.classList.add("coupon-card");
        // couponCard.classList.add("skeleton");
        couponCard.innerHTML = `
                <h3 class="coupon_header">${coupon.header}</h3>
                <pre class="coupon_desc">${coupon.description}</pre>
                <button class="coupon_remove_btn" onclick="RemoveCard(event)">-</button>
                <div class="coupon_footer">Rights reserved! <span class="coupon_date">${coupon.Date}</span></div>
            `;

        couponsContainer.appendChild(couponCard);
        couponsContainer.scrollTop = couponsContainer.scrollHeight;
      });


    }

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

    function FetchImg(event) {
      event.preventDefault();
      let header = document.getElementById("coupon_header").value;
      let query
      if (!header) query = "grid";
      else query = header;
      const apiKey = "VDVunUt6lUUtkIczBR9Khwrwea6P9oz24fHfI97CvaXTxKxPKX4Lx1R1";
      let apiUrl;


      if (typeof query === "string" && query.trim() !== "") {
        apiUrl = `https://api.pexels.com/v1/search?query=${query}&per_page=1&size=small&orientation=landscape`;
      } else {
        apiUrl = `https://api.pexels.com/v1/search?query=grid&per_page=1&size=small&orientation=landscape`;
      }
      let xhr = new XMLHttpRequest();
      xhr.open("GET", apiUrl, true);
      xhr.setRequestHeader("Authorization", apiKey);

      xhr.onload = function() {
        if (xhr.status === 200) {
          try {
            const response = JSON.parse(xhr.responseText);
            img = response;
            console.log(img)
            document.querySelector(".img").style.backgroundColor = img.photos[0].avg_color
            document.querySelector(".img").src = img.photos[0].src.original;
            showToast("Fetched Your Image!", 3000, "linear-gradient(45deg, #006400, #00FF00)");
          } catch (e) {
            showToast("Oops something went wrong, try changing the title! ", 3000, "linear-gradient(45deg, #FF5733, #FF0000)")
            document.querySelector(".img").classList.toggle("imgshow");
            document.querySelector(".img").style.backgroundColor = "transparent"
            document.querySelector("form").classList.remove("show"); //classes used to add anime
            document.querySelector("form").reset(); //RESET CONTENT 
          }

        } else {
          console.error("Request failed with status:", xhr.status);
          showToast("Problem fetching image from internet try uploading", 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
        }
      };

      xhr.send();
    }

    function ToggleForm() {
      document.querySelector("form").classList.toggle("show");
      document.querySelector(".img").classList.toggle("imgshow");
    }

    function handleLogout() {
      localStorage.removeItem("User");
      window.location.href = "Login.php";
    }

    function convertToBase64(file) {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = error => reject(error);
      });
    }

    async function handleForm(e) {
      e.preventDefault();
      const user = JSON.parse(localStorage.getItem("User"))
      let header = document.getElementById("coupon_header").value;
      let description = document.getElementById("coupon_desc").value;
      try {
        if (!img) {
          img = await convertToBase64(document.querySelector("#coupon_image").files[0]);
          console.log(img)
        } else {
          img = img.photos[0].src.original
        }
      } catch (e) {
        showToast("Pick a photo!", 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
        throw new Error('Blocked!')
      }
      if (user.userType === "Shopkeeper") {
        function sendXMLreq(username, header, description, image) {
          const xhr = new XMLHttpRequest();
          const url = "./StoreCoupon.php";
          const params = JSON.stringify({
            username: username,
            header: header,
            description: description,
            image: image
          });

          xhr.open("POST", url, true);
          xhr.setRequestHeader("Content-type", "application/json");

          xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
              if ((JSON.parse(xhr.responseText)).status === 'success') {
                handleaddCoupon(header, description, image, JSON.parse(xhr.responseText).id);
                showToast("Coupon stored successfully!", 3000, "linear-gradient(45deg, #006400, #00FF00)");
                img = "";
                let couponCountElement = document.querySelector(".numCount")
                couponCountElement.innerText = parseInt(couponCountElement.innerText) + 1
              }
              if (JSON.parse(xhr.responseText).status === 'error') {
                console.log("inside load err")
                showToast(JSON.parse(xhr.responseText).message, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
              }
            } else {
              showToast(`Error ${xhr.status}`, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
            }

          };
          xhr.send(params);
        }
        sendXMLreq(user.username, header, description, img)
      }
    }


    function handleaddCoupon(header, desc, image, id) {
      let couponCard = document.createElement("div");
      couponCard.classList.add("coupon-card");
      // couponCard.classList.add("skeleton");
      couponCard.setAttribute("data-id", id);
      couponCard.style.backgroundImage = `url(${image})`;

      couponCard.innerHTML = `
                              <h3 class="coupon_header">${header}</h3>
                              <pre class="coupon_desc"> ${desc}</pre>
                              <button class="coupon_remove_btn" onclick="RemoveCard(event)">-</button>
                              <div class="coupon_footer">Rights reserved!</div>
                            `;
      document.querySelector(".coupons").appendChild(couponCard);

      document.querySelector(".img").classList.toggle("imgshow");
      document.querySelector(".img").src = "";
      document.querySelector(".img").style.backgroundColor = "transparent"
      document.querySelector("form").classList.remove("show"); //classes used to add anime
      document.querySelector("form").reset(); //RESET CONTENT  

      const couponsContainer = document.querySelector(".coupons");
      couponsContainer.scrollTop = couponsContainer.scrollHeight; //scrollto bottom
    }

    function RemoveCard(event) { //removing specific card
      const couponCard = event.target.parentElement;
      let delete_permission = confirm('The selected card will be deleted')
      if (delete_permission) {
        //delete from db and if deleted run following
        const couponId = parseInt(couponCard.getAttribute("data-id"));

        function sendXMLreq(id) {
          const xhr = new XMLHttpRequest();
          const url = "./DeleteCoupon.php";
          const params = JSON.stringify({
            id: id
          });

          xhr.open("POST", url, true);
          xhr.setRequestHeader("Content-type", "application/json");

          xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
              if ((JSON.parse(xhr.responseText)).status === 'success') {
                couponCard.classList.add("couponDragLeft")
                setTimeout(() => {
                  showToast("Coupon deleted!", 3000, "linear-gradient(45deg, #0000FF, #87CEEB)");
                  couponCard.remove();
                  let couponCountElement = document.querySelector(".numCount")
                  couponCountElement.innerText = parseInt(couponCountElement.innerText) - 1
                }, 400)

              }
              if (JSON.parse(xhr.responseText).status === 'error') {
                console.log("inside load err")
                showToast(JSON.parse(xhr.responseText).message, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
              }
            } else {
              showToast(`Error ${xhr.status}`, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
            }

          };
          xhr.send(params);
        }
        sendXMLreq(couponId)
      }
    }

    function handleImgClick() {
      document.querySelector(".img").src = "";
      document.querySelector(".img").style.backgroundColor = "transparent"
      img=""
    }
    // const couponForm = document.querySelector('form');
    // const couponImageInput = document.getElementById('coupon_image');

    // couponForm.addEventListener('dragover', function(event) {
    //   event.preventDefault();
    // });


    // couponForm.addEventListener('drop', function(event) {
    //   event.preventDefault();
    //   const file = event.dataTransfer.files[0];
    //   if (file) {
    //     couponImageInput.files = event.dataTransfer.files;
    //   }
    // });
  </script>
  <div class="head">
    <h1 class="shop">Shop</h1>
    <button class="logout" onclick="handleLogout()">Logout</button>
  </div>
  <div class="couponCount">Your Coupons: <span class="numCount">0</span></div>
  <div class="Container">
    <div class="left">
      <form class="coupon_form" enctype="multipart/form-data" onsubmit="handleForm(event)">
        <label for="coupon_header" class="header_label">Title</label>
        <input type="text" id="coupon_header" name="coupon_header" autocomplete="additional-name" autofocus required />

        <label for="coupon_desc" class="desc_label">Description</label>
        <textarea type="text" id="coupon_desc" name="coupon_desc" required rows="7" maxlength="200"></textarea>

        <input type="file" id="coupon_image" name="coupon_image" accept=".jpg, .jpeg , .png" />

        <button class="fetchimg_api" type="submit" onclick="FetchImg(event)">
          Fetch Image
        </button>
        <button class="submit_btn" type="submit">Upload</button>
      </form>
      <img class="img" src="" alt="No image" onclick="handleImgClick()">
    </div>
    <div class="right">
      <div class="devopts">
        <ul>
          <li onclick="ToggleForm()">+</li>
        </ul>
      </div>
      <div class="coupons ">
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
      </div>
    </div>
  </div>
</body>

</html>