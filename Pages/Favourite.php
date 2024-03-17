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
    }

    body {
      margin: 0 0;
      height: 100vh;
      width: 100vw;
      font-family: "Times New Roman", Times, serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      overflow: hidden;
    }

    .leftbackarrow {
      position: absolute;
      top: 2vh;
      left: 1vw;
      height: 5vh;
      width: 5vh;
      transition: all 0.1s ease-in-out;
    }

    .leftbackarrow:hover {
      fill: red;
    }

    .leftbackarrow:active {
      scale: 0.8;
    }

    .Container {
      width: fit-content;
      margin-top: 10vh;
    }

    .header {
      margin: 0;
      width: fit-content;
      position: relative;
      cursor: pointer;
    }

    .header::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -2px;
      width: 0;
      height: 2px;
      background-color: black;
      transition: width 0.7s ease-in-out;
    }

    .header:hover::after {
      width: 100%;
      background-color: red;
    }

    .favouriteCoupons {
      width: 70vw;
      height: 80vh;
      padding: 2rem 3rem;
      border-left: 2px solid #4a4a4ae5;
      box-shadow: inset 0px 5px 10px black;
      border-radius: 0.3rem;
      overflow: auto;
      display: flex;
      align-items: center;
      gap: 2rem;
      flex-direction: column;
      overflow-x: hidden;
      overflow-y: scroll;
      margin-bottom: 2rem;
      scroll-snap-type: y mandatory;
      scroll-snap-align: center;
    }

    .favouriteCoupons::-webkit-scrollbar {
      width: 10px;
    }

    .favouriteCoupons::-webkit-scrollbar-track {
      background: #f1f1f1;
      box-shadow: inset 2px 3px gray;
    }

    .favouriteCoupons::-webkit-scrollbar-thumb {
      background: linear-gradient(to bottom,
          #6c6c6c,
          rgba(123, 123, 123, 0.848),
          #bcbcbc);
      border-radius: 0.4rem;
      height: 20rem;
    }

    .couponCard {
      background-color: rgb(245, 245, 245);
      box-shadow: 2px 3px 7px #403f3f;
      scale: 1;
      width: 100%;
      min-height: 25rem;
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
    }

    .transformLeft {
      transform: translateX(-80vw);
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
      font-size: 1.3rem;
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
      min-height: 25rem;
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

    .coupon_header {
      transition: all 0.2s ease-in-out;
      text-align: center;
      width: fit-content;
      text-align: start;
      color: transparent;
      background: linear-gradient(to right, #ff7e5f, #feb47b, #ffcf96),
        linear-gradient(to bottom, #ff7e5f, #feb47b, #ffcf96);
      max-height: 30%;
      font-size: 4rem;
      z-index: 202;
      margin: 1rem 0.5rem 0.2rem 0.5rem;
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
      font-size: 1.4rem;
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
      font-size: 1.2rem;
      border-top-left-radius: 0.2rem;
      border-top-right-radius: 0.2rem;
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
      font-size: 1.3rem;
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
  </style>
  <div id="toast-container"></div>
</head>

<body>
  <script>
    let FavouriteElements = [];
    let couponData = [];
    let sortedCouponData = [];

    const ws = new WebSocket('ws://localhost:8080');

    document.addEventListener("DOMContentLoaded", function() {
      if (!JSON.parse(localStorage.getItem("User"))) {
        showToast("You are not LoggedIn!", 3000, "linear-gradient(45deg, #FFA500, #FF4500)");
        setTimeout(() => {
          window.location.href = "./Login.php";
        }, 3000);
        //   throw new Error("Unauthorized!");
      } else if (
        JSON.parse(localStorage.getItem("User")).userType !== "Normal"
      ) {
        showToast("Unauthorized!", 3000, "linear-gradient(45deg, #FFA500, #FF4500)");
        setTimeout(() => {
          window.location.href = "./Login.php";
        }, 3000);
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

    document.addEventListener("DOMContentLoaded", function() {
      if (!JSON.parse(localStorage.getItem("User"))) return;
      const xhr1 = new XMLHttpRequest();
      const url1 = "./GetAllFavourites.php";

      xhr1.open("POST", url1, true);
      xhr1.setRequestHeader("Content-Type", "application/json");

      xhr1.onload = function() {
        if (xhr1.status >= 200 && xhr1.status < 300) {
          if (JSON.parse(xhr1.responseText).status === "success") {
            try {
              const {
                data
              } = JSON.parse(xhr1.responseText);
              if (data) {
                FavouriteElements = data.map(ele => parseInt(ele.couponid));
                FavouriteElements.reverse();
                console.log(FavouriteElements);
                sendSecondRequest();
              }
            } catch (e) {
              console.log(e.message);
            }
          }
          if (JSON.parse(xhr1.responseText).status === "error") {
            showToast(JSON.parse(xhr1.responseText).message, 3000, "linear-gradient(45deg, #FF5733, #FF0000)"); //red
          }
        } else {
          showToast(`Error ${xhr1.status}`, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
        }
      };

      xhr1.onerror = function() {
        showToast("Request Failed!", 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
      };

      const params1 = {
        username: JSON.parse(localStorage.getItem("User")).username,
      };

      xhr1.send(JSON.stringify(params1));

      function sendSecondRequest() {
        const xhr2 = new XMLHttpRequest();
        const url2 = "./GetUserFavouriteCouponsFromShopCoupons.php";

        xhr2.open("POST", url2, true);
        xhr2.setRequestHeader("Content-Type", "application/json");

        xhr2.onload = function() {
          if (xhr2.status >= 200 && xhr2.status < 300) {
            if (JSON.parse(xhr2.responseText).status === "success") {
              try {
                if (
                  JSON.parse(localStorage.getItem("User")).userType === "Normal"
                ) {
                  const {
                    data,
                    message
                  } = JSON.parse(xhr2.responseText);
                  couponData = data
                  if (couponData.length === FavouriteElements.length) {
                    FavouriteElements.forEach(id => {
                      let object = couponData.find(obj => obj.id === String(id));
                      if (object) {
                        sortedCouponData.push(object);
                      }
                    });
                    displayCoupons(sortedCouponData);
                    showToast(message, 3000, "linear-gradient(45deg, #0000FF, #87CEEB)");
                  }
                  else console.log("unequal lengths") 
                }
              } catch (e) {
                console.log(e.message);
              }
            }
            if (JSON.parse(xhr2.responseText).status === "error") {
              showToast(JSON.parse(xhr2.responseText).message, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
            }
          }
        };

        xhr2.onerror = function() {
          showToast("Request Failed!", 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
        };

        const params2 = {
          couponid: FavouriteElements
        };

        xhr2.send(JSON.stringify(params2));
      }
    });


    function displayCoupons(coupons) {
      const couponsContainer = document.querySelector(".favouriteCoupons");
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
        couponsContainer.appendChild(couponCard);
      });
    }

    function toggleFillColor(event) {
      let username = JSON.parse(localStorage.getItem("User")).username;
      const couponCard = event.target.parentElement;
      const couponId = parseInt(couponCard.getAttribute("data-id"));


      function deleteCouponFavourite(username, couponId) {
        const xhr = new XMLHttpRequest();
        let url = "./UnsetCouponFavourite.php";
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onload = function() {
          if (xhr.status >= 200 && xhr.status < 300) {
            try {
              if (JSON.parse(xhr.responseText).status === "success") {
                const parentElement = event.target.parentElement
                parentElement.classList.add("transformLeft")
                setTimeout(() => {
                  showToast(JSON.parse(xhr.responseText).message, 3000, "linear-gradient(20deg, black,40%,gray,90%,white)");
                  parentElement.remove()
                }, 600)
              }
              if (JSON.parse(xhr.responseText).status === "error") {
                showToast(JSON.parse(xhr.responseText).message, 3000, "linear-gradient(45deg, red,60%,orange,30%,peach)"); //
              }
            } catch (e) {
              showToast(e.message, 3000, "linear-gradient(45deg, #FF5733, #FF0000)");
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


    function handleClick() {
      window.location.href = "./Hero.php";
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
    ws.addEventListener('open', function(event) {
      console.log('Connected to WebSocket server');
    });
    ws.addEventListener('message', function(event) {
      const specificCouponCard = document.querySelector(`div[data-id="${event.data}"]`);
      if (!specificCouponCard) return;
      specificCouponCard.classList.add("transformLeft")
      setTimeout(() => {
        specificCouponCard.remove()
      }, 300)
      showToast("A coupon in your Favourites was unlisted!", 3000, "linear-gradient(90deg, #FFD700, #FFA500, #FF6347)")
      // if(lastTenValues.includes(parseInt(event.data))){
      //   console.log("yes")
      // }
      // else{
      //   console.log("no")
      // }
    });
  </script>
  <svg class="leftbackarrow" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" onclick="handleClick()" fill="black">
    <path d="M10.25 9.02615L9.50135 8.9811C9.50045 8.9961 9.5 9.01113 9.5 9.02615H10.25ZM9.71578 8.10177L9.38104 8.77293L9.38104 8.77293L9.71578 8.10177ZM8.656 8.23115L8.16963 7.66024C8.16481 7.66434 8.16005 7.6685 8.15534 7.67273L8.656 8.23115ZM5.35 11.1952L4.84934 10.6367L4.84814 10.6378L5.35 11.1952ZM5 11.9902L5.75008 11.9964L5.74997 11.9839L5 11.9902ZM5.35 12.7852L4.84813 13.3425L4.84943 13.3437L5.35 12.7852ZM8.656 15.7482L8.15543 16.3067C8.16011 16.3109 8.16484 16.315 8.16963 16.3191L8.656 15.7482ZM9.71578 15.8775L9.38104 15.2064V15.2064L9.71578 15.8775ZM10.25 14.9532H9.5C9.5 14.9682 9.50045 14.9832 9.50135 14.9982L10.25 14.9532ZM10.25 11.2402C9.83579 11.2402 9.5 11.5759 9.5 11.9902C9.5 12.4044 9.83579 12.7402 10.25 12.7402V11.2402ZM19 12.7402C19.4142 12.7402 19.75 12.4044 19.75 11.9902C19.75 11.5759 19.4142 11.2402 19 11.2402V12.7402ZM11 11.9902V9.02615H9.5V11.9902L11 11.9902ZM10.9986 9.0712C11.04 8.38373 10.6668 7.738 10.0505 7.43061L9.38104 8.77293C9.45925 8.81193 9.5066 8.89387 9.50135 8.9811L10.9986 9.0712ZM10.0505 7.43061C9.4342 7.12323 8.69388 7.21361 8.16963 7.66024L9.14237 8.80206C9.2089 8.74539 9.30284 8.73392 9.38104 8.77293L10.0505 7.43061ZM8.15534 7.67273L4.84934 10.6367L5.85066 11.7536L9.15666 8.78958L8.15534 7.67273ZM4.84814 10.6378C4.46349 10.9842 4.24573 11.4788 4.25003 11.9964L5.74997 11.9839C5.74924 11.8958 5.78634 11.8115 5.85186 11.7525L4.84814 10.6378ZM4.25003 11.9839C4.24573 12.5015 4.46349 12.9961 4.84814 13.3425L5.85186 12.2278C5.78634 12.1688 5.74924 12.0845 5.74997 11.9964L4.25003 11.9839ZM4.84943 13.3437L8.15543 16.3067L9.15656 15.1896L5.85056 12.2266L4.84943 13.3437ZM8.16963 16.3191C8.69389 16.7657 9.4342 16.8561 10.0505 16.5487L9.38104 15.2064C9.30284 15.2454 9.2089 15.2339 9.14237 15.1772L8.16963 16.3191ZM10.0505 16.5487C10.6668 16.2413 11.04 15.5956 10.9986 14.9081L9.50135 14.9982C9.5066 15.0854 9.45925 15.1674 9.38104 15.2064L10.0505 16.5487ZM11 14.9532V11.9902L9.5 11.9902V14.9532L11 14.9532ZM10.25 12.7402H19V11.2402H10.25V12.7402Z " />
  </svg>
  <div class="Container">
    <h2 class="header">Your Favourites!</h2>
    <div class="favouriteCoupons">
      <div class="skeletonBody"></div>
      <div class="skeletonBody"></div>
      <div class="skeletonBody"></div>
      <div class="skeletonBody"></div>
      <div class="skeletonBody"></div>
    </div>
  </div>
</body>

</html>