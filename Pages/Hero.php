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
      scroll-behavior: smooth;
      -webkit-user-drag: none;
      font-family: sans-serif;
    }

    html {
      font-size: 62.5%;
      font-family: "Times New Roman", Times, serif;
    }

    body {
      overflow-x: hidden;
      margin: 0px 0px;
      overflow-y: scroll;
    }

    .Container {
      width: 100vw;
      height: 200vh;
      background: #ffffff;
    }

    .head {
      height: 80vh;
      box-shadow: 10px 40px 30px #a29797, -10px -40px 30px #a29797;
    }

    .vid {
      height: 100%;
      width: 100%;
      object-fit: cover;
    }

    .navs {
      width: 100vw;
      height: 70vh;
      display: flex;
      justify-content: space-around;
      position: absolute;
      top: 0px;
      left: 0px;
    }

    .search {
      width: 20vw;
      padding: 1rem;
      display: flex;
      justify-self: center;
      align-items: center;
    }

    form {
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      position: relative;
      right: 15rem;
      top: 4rem;
    }

    #searchShop {
      padding: 0.9rem 2rem 0.4rem 1rem;
      font-size: 1.5rem;
      border-top-left-radius: 1rem;
      border-bottom-left-radius: 1rem;
      outline: none;
      border: 2px solid blue;
      width: 400px;
    }

    #searchButton {
      padding: 0.75rem;
      position: relative;
      right: 2px;
      padding: 1rem 0.6rem 0.6rem;
      background: #1234fa;
      color: #ffffff;
      font-weight: bold;
      border-top-right-radius: 1rem;
      border-bottom-right-radius: 1rem;
    }

    #searchButton:active {
      background: green;
    }

    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
      box-shadow: inset 2px 3px gray;
    }

    ::-webkit-scrollbar-thumb {
      background: linear-gradient(to bottom, #6c6c6c, white, #bcbcbc);
      border-radius: 0.4rem;
      height: 58.5rem;
    }

    .nav {
      margin: 5rem;
      position: sticky;
      top: 0;
      z-index: 1000;
      min-height: 3rem;
    }

    .nav ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      display: flex;
      justify-content: center;
    }

    .nav ul li {
      width: 80px;
      text-align: center;
      padding: 10px 20px;
      margin-right: 10px;
      color: #ffffff;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1.5rem;
      font-weight: bold;
      z-index: 3000;
    }

    .nav ul li:last-child {
      margin-right: 0;
    }

    .logout {
      background-color: red;
      border: 2px solid rgb(255, 96, 96);
      scale: 1;
      transition: all 0.3s ease-in-out;
    }

    .logout:hover {
      background-color: rgb(253, 33, 33);
      scale: 1.2;
    }

    .about {
      background-color: #0025f5;
      border: 2px solid #3553fb;
      transition: all 0.3s ease-in-out;
      scale: 1;
    }

    .about:hover {
      background-color: #1d3efd;
      scale: 1.2;
    }

    .contact {
      background-color: green;
      border: 2px solid rgb(39, 171, 39);
      scale: 1;
      transition: all 0.3s ease-in-out;
    }

    .contact:hover {
      background-color: rgb(18, 155, 18);
      scale: 1.2;
    }

    .favouriteSection {
      background-color: #351eff;
      border: 2px solid #351eff;
      scale: 1;
      transition: all 0.3s ease-in-out;
      align-self: end;
    }

    .favouriteSection:hover {
      background-color: rgb(43, 71, 227);
      scale: 1.2;
    }

    .main {
      width: 100vw;
      height: fit-content;
      display: flex;
      justify-content: center;
      width: 100%;
      padding: 2rem;
      margin-top: 2rem;
    }

    .couponCard {
      background-color: rgb(245, 245, 245);
      box-shadow: 2px 3px 7px #403f3f;
      scale: 1;
      width: 100%;
      min-height: 40rem;
      scroll-snap-align: center;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
      overflow: hidden;
      border-radius: 0.7rem;
      transition: all 0.3s ease-in-out;
      opacity: 0.5;
      display: flex;
      flex-direction: column;
      z-index: 3001;
    }

    .couponCard:active .couponCard_header {
      visibility: hidden;
    }

    .couponCard:hover {
      opacity: 1;
      box-shadow: inset 0 -15px 15px -5px rgba(0, 0, 0, 0.5),
        inset 0 15px 15px -5px rgba(0, 0, 0, 0.5);
    }

    .couponCard:first-child {
      opacity: 1;
    }

    .couponCard:hover.couponCard:hover:nth-child(1n) {
      background-color: hsl(200, 20%, 70%);
      scale: 1.05;
      box-shadow: 4px 5px 7px #000;
    }

    .couponCard:hover.couponCard:hover:nth-child(2n) {
      background-color: hsl(200, 20%, 95%);
      scale: 1.05;
      box-shadow: 4px 5px 7px #000;
    }

    .coupon {
      width: 80vw;
      height: 120rem;
      display: flex;
      align-items: center;
      gap: 4rem;
      flex-direction: column;
      overflow-x: hidden;
      overflow-y: auto;
      padding: 7rem 4rem;
      margin-bottom: 2rem;
      scroll-snap-type: y mandatory;
      scroll-snap-align: center;
      /* Add this line */
      border-bottom: 0.1px solid rgb(151, 151, 151);
      box-shadow: inset 0 -30px 30px #9b9b9b;

      scale: 0.8;
      opacity: 0;
      animation: fade-in linear forwards;
      animation-timeline: view();
      animation-range: entry 200px;
    }

    .coupon::-webkit-scrollbar {
      width: 7px;
    }

    .coupon::-webkit-scrollbar-track {
      width: 9px;
      box-shadow: inset 1px 1px 1px #000;
    }

    .coupon::-webkit-scrollbar-thumb {
      background: linear-gradient(blue, rgb(78, 255, 78), red);
      height: 50rem;
    }

    .footer {
      width: 100vw;
      height: 220vh;
      padding: 1rem;
      background: #000;
      margin-top: 2px solid #fff;
      box-shadow: 0px 0px 0px #fff, 2px -10px 30px #d2d2d2;

      scale: 0.86;
      opacity: 0;
      animation: fade-in linear forwards;
      animation-timeline: view();
      animation-range: entry 10px;
      font-family: "Times New Roman", Times, serif;
      padding-bottom: 3rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    @keyframes fade-in {
      to {
        scale: 1;
        opacity: 1;
      }
    }

    .footer h1 {
      font-size: 8rem;
      font-weight: 600;
      text-align: center;
      background: linear-gradient(to right, red, blue);
      color: transparent;
      -webkit-background-clip: text;
      background-clip: text;
      text-shadow: 0 0 60px rgba(255, 0, 0, 0.658);
      animation: anime 1s infinite alternate;
      margin: 0;
      position: fixed;
      top: 43%;
      left: 50%;
      transform: translateX(-50%);
      opacity: 0;
      animation: fade-in linear forwards;
      animation-timeline: view();
      animation-range: 30rem 35rem;
    }

    @keyframes anime {
      100% {
        text-shadow: 0 0 60px rgba(0, 38, 255, 0.658);
      }
    }

    .footer p {
      color: white;
      font-size: 1.7rem;
      text-align: center;
      margin-bottom: -1rem;
    }

    .scroll-watcher {
      height: 5px;
      position: fixed;
      top: 0;
      z-index: 1000;
      background-color: blue;
      width: 100%;
      scale: 0 1;
      transform-origin: left;
      animation: scroll-watcher linear;
      animation-timeline: scroll();
    }

    @keyframes scroll-watcher {
      to {
        scale: 1 1;
      }
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
      font-size: 1.5rem;
      font-weight: bold;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
      margin-bottom: 10px;
      opacity: 0;
      transform: translateX(-10rem);
      z-index: 4000;
    }

    .toast.show {
      display: block;
      opacity: 1;
      transform: translateX(0rem);
    }

    .skeletonBody {
      scale: 1;
      width: 100%;
      min-height: 40rem;
      scroll-snap-align: center;
      border-radius: 1rem;
      transition: all 0.3s ease-in-out;
      opacity: 0.5;
      animation: skeleton-anime 0.5s linear infinite alternate;
    }

    @keyframes skeleton-anime {
      0% {
        background-color: hsl(200, 20%, 70%);
      }

      100% {
        background-color: hsl(200, 20%, 80%);
      }
    }

    @keyframes anime {
      100% {}
    }

    .couponCard:first-child {
      opacity: 1;
    }

    .couponCard:nth-child(2):hover .couponCard:first-child {
      opacity: 0.5;
    }

    .coupon_header {
      transition: all 0.2s ease-in-out;
      text-align: center;
      margin-left: 1rem;
      width: 100%;
      text-align: start;
      color: transparent;
      background: linear-gradient(to right, #ff7e5f, #feb47b, #ffcf96),
        linear-gradient(to bottom, #ff7e5f, #feb47b, #ffcf96);
      max-height: 30%;
      font-size: 8rem;
      z-index: 202;
      /* -webkit-text-stroke: 2px black; */
      margin: 0.5rem;
      font-family: "Roboto", sans-serif;
      -webkit-background-clip: text;
      background-clip: text;
      transition: all 0.2s ease-in-out;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .couponCard:hover .coupon_header {
      scale: 1.01;
    }

    .coupon_desc {
      font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
        sans-serif;
      font-weight: 800;
      width: 40%;
      align-self: flex-start;
      height: fit-content;
      max-height: 60%;
      color: white;
      z-index: 200;
      text-align: center;
      overflow: auto;
      transition: all 0.2s ease-in-out;
      transform: translateX(-40vw);
      background: linear-gradient(to right, #ff7e5f, #feb47b, #ffcf96),
        linear-gradient(to bottom, #ff7e5f, #feb47b, #ffcf96);
      text-wrap: wrap;
      overflow-wrap: break-word;
      text-overflow: clip;
      font-size: 2.2rem;
      padding: 1rem;
      border-bottom-right-radius: 0.6rem;
      border-top-right-radius: 0.6rem;
    }

    .couponCard:hover .coupon_desc {
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
      font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
        sans-serif;
      font-weight: bold;
      width: 100%;
      max-height: 30%;
      position: absolute;
      bottom: 0rem;
      text-align: center;
      transform: translateY(10rem);
      transition: all 0.3s ease-in-out;
      background: linear-gradient(to bottom, #ff7e5f, #feb47b, #ffcf96),
        linear-gradient(to right, #ff7e5f, #feb47b, #ffcf96);
      color: white;
      font-size: 2rem;
      border-top-left-radius: 0.4rem;
      border-top-right-radius: 0.4rem;
    }

    .couponCard:hover .coupon_footer {
      transform: translateY(0rem);
    }

    .coupon_date {
      position: absolute;
      bottom: 0.1rem;
      right: 2rem;
      transform: translateX(10rem);
      transition: all 0.3s ease-in-out;
      font-size: 2rem;
    }

    .couponCard:hover .coupon_date {
      transform: translateX(0rem);
    }

    #heartSvg {
      position: absolute;
      top: 1rem;
      right: 2rem;
      z-index: 2000;
    }

    .glow {
      background: white;
      color: black;
    }

    .glowred {
      background: red;
    }

    .Support {
      position: absolute;
      bottom: 7vh
    }

    .address {
      position: absolute;
      bottom: 4vh
    }
  </style>
  <div id="toast-container"></div>
</head>

<body>
  <script>
    let couponData = [];
    let dataChunkCount = -10;
    let couponData_backup = [];
    let FavouriteElements = [];
    let lastTenValues = [];

    document.addEventListener("DOMContentLoaded", function() {
      if (!JSON.parse(localStorage.getItem("User"))) {
        showToast("You are not LoggedIn!", 3000, "linear-gradient(45deg, #FFA500, #FF4500)");
        setTimeout(() => {
          window.location.href = "./Login.php";
        }, 3000);
        throw new Error("Unauthorized!");
      } else if (
        JSON.parse(localStorage.getItem("User")).userType === "Shopkeeper"
      ) {
        showToast("Unauthorized!", 3000, "linear-gradient(45deg, #FFA500, #FF4500)");
        setTimeout(() => {
          window.location.href = "./Login.php";
        }, 3000);
        exit;
      }
    });

    document.addEventListener("DOMContentLoaded", function() {
      if (!JSON.parse(localStorage.getItem("User"))) return;
      const xhr = new XMLHttpRequest();
      url = "./GetAllFavourites.php";

      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/json");

      xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
          if (JSON.parse(xhr.responseText).status === "success") {
            try {
              const {
                data
              } = (JSON.parse(xhr.responseText))
              if (data) {
                FavouriteElements = data.map(ele => parseInt(ele.couponid))
              }
            } catch (e) {
              console.log(e.message);
            }
          }
          if (JSON.parse(xhr.responseText).status === "error") {
            console.log(JSON.parse(xhr.responseText).message);
          }
        } else {
          showToast(`Error ${xhr.status}`, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
        }
      };
      xhr.onerror = function() {
        showToast("Request Failed!", 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
      };
      const params = {
        username: JSON.parse(localStorage.getItem("User")).username,
      };
      xhr.send(JSON.stringify(params));
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

    document.addEventListener("DOMContentLoaded", function() {
      if (!JSON.parse(localStorage.getItem("User"))) return;
      const xhr = new XMLHttpRequest();
      url = "./GetAllCoupons.php";

      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/json");

      xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
          try {
            if (JSON.parse(xhr.responseText).status === "success") {

              if (
                JSON.parse(localStorage.getItem("User")).userType === "Normal"
              ) {
                const responseData = JSON.parse(xhr.responseText);
                couponData = responseData.data.slice();
                couponData_backup = responseData.data.slice();
                lastTenValues = couponData.slice(dataChunkCount);
                couponData.splice(dataChunkCount);
                displayCoupons(lastTenValues.reverse());
                window.scrollTo(0, 1 * window.innerHeight);
                showToast(responseData.message, 3000, "linear-gradient(45deg, #0000FF, #87CEEB)");
              }
            }
          } catch (e) {
            showToast("No currently Hosted Coupons!", 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
          }
          if (JSON.parse(xhr.responseText).status === "error") {
            console.log("There are no currently hosted coupons available.");
            showToast(JSON.parse(xhr.responseText).message, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
          }
        } else {
          showToast(`Error ${xhr.status}`, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
        }
      };
      xhr.onerror = function() {
        showToast("Request Failed!", 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
      };
      xhr.send();
    });

    function displayCoupons(coupons) {
      const couponsContainer = document.querySelector(".coupon");
      const skeletonBodies = document.querySelectorAll(".skeletonBody");

      skeletonBodies.forEach((element) => {
        element.remove();
      });

      coupons.forEach((coupon) => {
        const couponCard = document.createElement("div");
        couponCard.style.backgroundImage = `url(${coupon.image})`;
        const id = parseInt(coupon.id)

        couponCard.setAttribute("data-id", coupon.id);
        couponCard.classList.add("couponCard");
        couponCard.innerHTML = `
                <h3 class="coupon_header">${coupon.header}</h3>
                <svg id="heartSvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30px" height="30px"  onclick='toggleFillColor(event)'>
    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="none" stroke="red" stroke-width="2" style="pointer-events: none;"/>
  </svg>
                <pre class="coupon_desc">${coupon.description}</pre>
                <div class="coupon_footer">Rights reserved! <span class="coupon_date">${coupon.Date}</span></div>
            `;
        if (FavouriteElements.includes(id)) {
          const heartSvg = couponCard.querySelector('#heartSvg');
          if (heartSvg) {
            heartSvg.querySelector('path').setAttribute('fill', 'red');
          }
        }
        // const couponHeader = couponCard.querySelector('.coupon_header');
        // couponHeader.style.backgroundImage = `url(${coupon.image})`;
        couponsContainer.appendChild(couponCard);
      });
    }

    function toggleFillColor(event) {
      let svg = event.currentTarget;
      let path = svg.querySelector('path');
      let currentColor = path.getAttribute('fill');
      let favouriteSection = document.querySelector(".favouriteSection");
      let username = JSON.parse(localStorage.getItem("User")).username;

      if (currentColor === 'none' || currentColor === null || currentColor === "black") {
        const couponCard = event.target.parentElement;
        const couponId = parseInt(couponCard.getAttribute("data-id"));


        function sendCouponFavourite(username, couponId) {
          const xhr = new XMLHttpRequest();
          let url = "./SetCouponFavourite.php";
          xhr.open("POST", url, true);
          xhr.setRequestHeader("Content-Type", "application/json");
          xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
              if (JSON.parse(xhr.responseText).status === "success") {
                try {
                  path.setAttribute('fill', 'red');
                  favouriteSection.classList.add("glow")
                  setTimeout(() => {
                    favouriteSection.classList.remove("glow")
                  }, 300);
                  showToast(JSON.parse(xhr.responseText).message, 3000, "linear-gradient(45deg, red, blue)");

                } catch (e) {
                  showToast(e.message, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
                }
              }
              if (JSON.parse(xhr.responseText).status === "error") {
                showToast(JSON.parse(xhr.responseText).message, 3000, "linear-gradient(45deg, #FF5733, #FF0000)"); //linear-gradient(20deg, black,40%,gray,90%,white)
              }
            } else {
              showToast(`Error ${xhr.status}`, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
            }
          };
          xhr.onerror = function() {
            showToast("Request Failed!", 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
          };
          const params = {
            username: username,
            couponid: couponId
          };
          xhr.send(JSON.stringify(params));
        }
        sendCouponFavourite(username, couponId);

      } else if (currentColor === 'red') {
        const couponCard = event.target.parentElement;
        const couponId = parseInt(couponCard.getAttribute("data-id"));


        function deleteCouponFavourite(username, couponId) {
          const xhr = new XMLHttpRequest();
          let url = "./UnsetCouponFavourite.php";
          xhr.open("POST", url, true);
          xhr.setRequestHeader("Content-Type", "application/json");
          xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
              if (JSON.parse(xhr.responseText).status === "success") {
                try {
                  path.setAttribute('fill', 'none');
                  favouriteSection.classList.add("glowred")
                  setTimeout(() => {
                    favouriteSection.classList.remove("glowred")
                  }, 300);
                  showToast(JSON.parse(xhr.responseText).message, 3000, "linear-gradient(20deg, black,40%,gray,90%,white)");

                } catch (e) {
                  showToast(e.message, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
                }
              }
              if (JSON.parse(xhr.responseText).status === "error") {
                showToast(JSON.parse(xhr.responseText).message, 3000, "linear-gradient(45deg, red,60%,orange,30%,peach)"); //
              }
            } else {
              showToast(`Error ${xhr.status}`, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
            }
          };
          xhr.onerror = function() {
            showToast("Request Failed!", 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
          };
          const params = {
            username: username,
            couponid: couponId
          };
          xhr.send(JSON.stringify(params));
        }
        deleteCouponFavourite(username, couponId);
      }
    }

    function scrollToSupport() {
      const navs = document.querySelector(".navs");
      navs.scrollIntoView({
        behavior: "smooth",
      });
    }

    function handleSubmit(event, count = 10) {
      event.preventDefault();
      window.scrollTo(0, 1 * window.innerHeight);
      // const randomValues = [];
      // const selectedIndices = new Set();

      // while (randomValues.length < count) {
      //   const randomIndex = Math.floor(Math.random() * couponData.length);

      //   if (!selectedIndices.has(randomIndex)) {
      //     randomValues.push(couponData[randomIndex]);
      //     selectedIndices.add(randomIndex);
      //   }
      // }
      // console.log(randomValues);
      // displayCoupons(randomValues);
      // window.scrollTo(0, 1 * window.innerHeight);
      // document.querySelector(".coupon").scrollTop = document.querySelector(".coupon").scrollHeight;
    }

    function handleNavigation(page) {
      if (page === "Login.php") {
        localStorage.removeItem("User");
      }
      window.location.href = page;
    }

    function handleInput(val) {
      let searchedElements = [];
      let [text, con] = val.split(" ")
      if (text) {
        text = text.toLowerCase()
      }
      if (con) {
        con = con.toLowerCase()
      }

      if (!text) {
        let couponHolder = document.querySelector(".coupon");
        couponHolder.innerHTML = "";
        for (let i = 0; i < 10; i++) {
          let card = document.createElement("div");
          card.classList.add("skeletonBody");
          couponHolder.appendChild(card);
        }
        displayCoupons(lastTenValues);
      } else {
        let couponHolder = document.querySelector(".coupon");
        couponHolder.innerHTML = "";
        for (let i = 0; i < 10; i++) {
          let card = document.createElement("div");
          card.classList.add("skeletonBody");
          couponHolder.appendChild(card);
        }
        searchedElements = couponData_backup.filter((ele) => {
          let id = ele.id.toLowerCase()
          let username = ele.username.toLowerCase()
          let header = ele.header.toLowerCase()
          let description = ele.description.toLowerCase()
          let image = ele.image.toLowerCase()
          let date = ele.Date.toLowerCase()
          // console.log(id,username,header,description,image,date)
          // console.log(date.includes(text))
          if (id.includes(text) || username.includes(text) || header.includes(text) || description.includes(text) || date.includes(text)) {
            if (con) {
              if (id.includes(con) || username.includes(con) || header.includes(con) || description.includes(con) || date.includes(con)) return true;
              else return false;
            }
            return true;
          } else return false;
        });
        console.log(searchedElements)
        setTimeout(() => {
          if (searchedElements.length === 0) showToast("No such coupon available!", 4000, "linear-gradient(45deg, #FF5733, #FF0000)")
        }, 500)
        displayCoupons(searchedElements)

      }
    }
    // function addCouponCard() {
    //   const couponCard = document.createElement("div");
    //   couponCard.classList.add("couponCard");
    //   document.querySelector(".coupon").appendChild(couponCard);
    // }
  </script>

  <div class="scroll-watcher"></div>
  <div class="Container">
    <div class="head">
      <video class="vid" autoplay muted loop>
        <source src="./pexels-rostislav-uzunov-5680034 (1080p).mp4" />
      </video>
      <div class="navs">
        <div class="logo">
          <img src="./Blue_Modern_Company_Logo__1_-removebg-preview.png" alt="Logo" />
        </div>
        <div class="search">
          <form onsubmit="handleSubmit(event)">
            <input type="text" name="searchShop" id="searchShop" placeholder="Search shops" oninput="handleInput(this.value)" autofocus />
            <button id="searchButton" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
    <div class="nav">
      <ul>
        <li class="about" onclick="handleNavigation('About.php')">About</li>
        <li class="contact" onclick="handleNavigation('Contact.php')">
          Contact
        </li>
        <li class="logout" onclick="handleNavigation('Login.php')">
          Logout
        </li>
        <li class="favouriteSection" onclick="handleNavigation('Favourite.php')">
          Favourites!
        </li>
      </ul>
    </div>
    <div class="main">
      <div class="coupon" loading="lazy">
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <div class="skeletonBody"></div>
        <!-- <div class="couponCard">
          <h3 class="coupon_header">Header</h3>
          <pre class="coupon_desc">Description</pre>
          <div class="coupon_footer">Rights reserved! <span class="coupon_date">Date</span></div>
        </div> -->
      </div>
    </div>
    <div class="footer">
      <h1>Couponify!</h1>
      <p>&copy; 2024 Coupon Hostor. All rights reserved.</p>
      <p class="Support">
        For support, contact:
        <span onclick="scrollToSupport()" style="color: blue;">View support</span>
      </p>
      <p class="address">400614 Navi Mumbai, India</p>
    </div>
  </div>
</body>

</html>