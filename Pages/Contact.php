<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupon Hostor</title>
    <style>
        *{
            -webkit-user-select: none;
            user-select: none;
        }
        body {
            margin: 0px 0px;
            font-family: sans-serif;
            background: #000;
        }

        h1 {
            font-size: 8rem;
            font-weight: 600;
            text-align: center;
            background: linear-gradient(to right, rgb(209, 0, 216), rgb(206, 11, 40));
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            text-shadow: 0 0 60px rgba(236, 34, 175, 0.736);
            animation: anime 1s infinite alternate;
            text-decoration: underline;
        }

        @keyframes anime {
            100% {
                text-shadow: 0 0 60px rgba(255, 40, 94, 0.775);

            }
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            box-shadow: inset 2px 3px gray;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(red, blue, rgb(78, 255, 78));
            border-radius: 0.4rem;
            height: 1rem;
        }

        img {
            object-position: center;
        }
    </style>
</head>

<body>
    <h1>Contact</h1>
    <div class="image">
        <img src="./robot.gif" alt="Robot">
    </div>
</body>

</html>