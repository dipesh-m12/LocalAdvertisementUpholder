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
      }
      html {
        font-size: 62.5%;
        font-family: sans-serif;
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
        background: linear-gradient(red, blue, rgb(78, 255, 78), black);
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
        transition: all 0.2s ease-in-out;
        width: 100%;
        min-height: 40rem;
        scroll-snap-align: center;
      }

      .couponCard:hover.couponCard:hover:nth-child(1n) {
        background-color: rgb(67, 235, 67);
        scale: 1.1;
        box-shadow: 4px 5px 7px #000;
      }
      .couponCard:hover.couponCard:hover:nth-child(2n) {
        background-color: rgb(250, 36, 36);
        scale: 1.1;
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
        overflow-y: scroll;
        padding: 7rem 4rem;
        margin-bottom: 2rem;
        scroll-snap-type: y mandatory;
        scroll-snap-align: center; /* Add this line */
        border-bottom: 0.1px solid rgb(151, 151, 151);
        box-shadow: inset 0 -30px 30px #9b9b9b;

        scale: .8;
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
        height: fit-content;
        padding: 1rem;
        background: #000;
        margin-top: 2px solid #fff;
        box-shadow: 0px 0px 0px #fff, 2px -10px 30px #d2d2d2;

        scale: 0.86;
        opacity: 0;
        animation: fade-in   linear forwards;
        animation-timeline: view();
        animation-range: entry 200px;
      }
      @keyframes fade-in{
        to{
          scale: 1;opacity: 1;
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
    </style>
    <script>
      function scrollToSupport() {
        const navs = document.querySelector(".navs");
        navs.scrollIntoView({ behavior: "smooth" });
      }
      function handleSubmit(event) {
        event.preventDefault();
      }
      function handleNavigation(page) {
        if (page === "Login.php") {
          localStorage.removeItem("User");
        }
        window.location.href = page;
      }
      function addCouponCard() {
        const couponCard = document.createElement("div");
        couponCard.classList.add("couponCard");
        document.querySelector(".coupon").appendChild(couponCard);
      }
    </script>
  </head>
  <body>
    <div class="scroll-watcher"></div>
    <div class="Container">
      <div class="head">
        <video class="vid" autoplay muted loop>
          <source src="./pexels-rostislav-uzunov-5680034 (1080p).mp4" />
        </video>
        <div class="navs">
          <div class="logo">
            <img 
              src="./Blue_Modern_Company_Logo__1_-removebg-preview.png"
              alt="Logo"
            />
          </div>
          <div class="search">
            <form onsubmit="handleSubmit(event)">
              <input
                type="text"
                name="searchShop"
                id="searchShop"
                placeholder="Search shops"
                autofocus
              />
              <button id="searchButton">Search</button>
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
        </ul>
      </div>
      <div class="main">
        <div class="coupon">
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
          <div class="couponCard"></div>
        </div>
      </div>
      <div class="footer">
        <h1>Thank You!</h1>
        <p>&copy; 2024 Coupon Hostor. All rights reserved.</p>
        <p>
          For support, contact:
          <span onclick="scrollToSupport()" style="color: blue;">View support</span>
        </p>
        <p>400614 Navi Mumbai, India</p>
      </div>
    </div>
  </body>
</html>