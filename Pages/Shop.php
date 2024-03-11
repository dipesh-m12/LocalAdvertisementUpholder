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
    }

    .coupon_remove_btn:active {
      scale: 0.9;
      opacity: 0.9;
    }
  </style>
  <div id="toast-container"></div>
</head>

<body>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      if (!JSON.parse(localStorage.getItem("User")))
        window.location.href = "Login.php";
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
          if (JSON.parse(xhr.responseText).status === "success") {
            const responseData = JSON.parse(xhr.responseText);
            displayCoupons(responseData.data);
            showToast(responseData.message, 3000, "green");
          }
          if (JSON.parse(xhr.responseText).status === "error") {
            console.log("You have no previous coupons stored, create so people can see your shop")
            showToast(JSON.parse(xhr.responseText).message, 3000, "red");
          }

        } else {
          showToast(`Error ${xhr.status}`, 3000, "red");
        }
      };
      xhr.onerror = function() {
        showToast("Request Failed!", 3000, "red");
      };
      xhr.send(params);
    });

    function displayCoupons(coupons) {
      console.log(coupons)
      const couponsContainer = document.querySelector(".coupons");

      coupons.forEach(coupon => {
        const couponCard = document.createElement("div");
        couponCard.style.backgroundImage = `url(${coupon.image})`;
        couponCard.setAttribute("data-id", coupon.id);
        couponCard.classList.add("coupon-card");
        couponCard.innerHTML = `
                <h3 class="coupon_header">${coupon.header}</h3>
                <pre class="coupon_desc">${coupon.description}</pre>
                <button class="coupon_remove_btn" onclick="RemoveCard(event)">-</button>
                <div class="coupon_footer">Rights reserved!</div>
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
      if (color === "red" || color === "blue") toast.style.background = color;

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

    function FetchImg() {
      //xml req
      console.log("xml req to a api for img");
      showToast("Fetched Your Image", 3000, "green"); //if success
      showToast(
        "Problem fetching image from internet try uploading",
        3000,
        "red"
      ); //if fails
    }

    function ToggleForm() {
      document.querySelector("form").classList.toggle("show");
    }

    function handleLogout() {
      localStorage.removeItem("User");
      window.location.href = "Login.php";
    }

    function handleForm(e) {
      e.preventDefault();
      const user = JSON.parse(localStorage.getItem("User"))
      let header = document.getElementById("coupon_header").value;
      let description = document.getElementById("coupon_desc").value;
      let image = URL.createObjectURL(
        document.getElementById("coupon_image").files[0]
      );
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
                showToast("Coupon stored successfully!", 3000);
              }
              if (JSON.parse(xhr.responseText).status === 'error') {
                console.log("inside load err")
                showToast(JSON.parse(xhr.responseText).message, 3000, "red");
              }
            } else {
              showToast(`Error ${xhr.status}`, 3000, "red");
            }

          };
          xhr.send(params);
        }
        sendXMLreq(user.username, header, description, image)
      }
    }


    function handleaddCoupon(header, desc, image, id) {
      let couponCard = document.createElement("div");
      couponCard.classList.add("coupon-card");
      couponCard.setAttribute("data-id", id);
      couponCard.style.backgroundImage = `url(${image})`;
      couponCard.innerHTML = `
                              <h3 class="coupon_header">${header}</h3>
                              <pre class="coupon_desc"> ${desc}</pre>
                              <button class="coupon_remove_btn" onclick="RemoveCard(event)">-</button>
                              <div class="coupon_footer">Rights reserved!</div>
                            `;
      document.querySelector(".coupons").appendChild(couponCard);

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
                showToast("Coupon deleted!", 3000, "blue");
                couponCard.remove();
              }
              if (JSON.parse(xhr.responseText).status === 'error') {
                console.log("inside load err")
                showToast(JSON.parse(xhr.responseText).message, 3000, "red");
              }
            } else {
              showToast(`Error ${xhr.status}`, 3000, "red");
            }

          };
          xhr.send(params);
        }
        sendXMLreq(couponId)
      }
    }
  </script>
  <div class="head">
    <h1 class="shop">Shop</h1>
    <button class="logout" onclick="handleLogout()">Logout</button>
  </div>
  <div class="Container">
    <div class="left">
      <form class="coupon_form" enctype="multipart/form-data" onsubmit="handleForm(event)">
        <label for="coupon_header" class="header_label">Title</label>
        <input type="text" id="coupon_header" name="coupon_header" autocomplete="additional-name" autofocus required />

        <label for="coupon_desc" class="desc_label">Description</label>
        <textarea type="text" id="coupon_desc" name="coupon_desc" required rows="7" maxlength="200"></textarea>

        <input type="file" id="coupon_image" name="coupon_image" accept=".jpg, .jpeg , .png" required />

        <button class="fetchimg_api" type="button" onclick="FetchImg()">
          Fetch Image
        </button>
        <button class="submit_btn" type="submit">Upload</button>
      </form>
    </div>
    <div class="right">
      <div class="devopts">
        <ul>
          <li onclick="ToggleForm()">+</li>
        </ul>
      </div>
      <div class="coupons">
        <!-- <div class="coupon-card">
          <button class="coupon_remove_btn" onclick="RemoveCard(event)">-</button>
        </div> -->
      </div>
    </div>
  </div>
</body>

</html>