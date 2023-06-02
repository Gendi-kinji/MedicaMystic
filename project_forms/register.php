<html>
    <head>
        <title>Registration page</title>
    </head>
    <style>
        body{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        background: aliceblue;
        }
        form{
            background: white;
            display: flex;
            flex-direction:column;
            border: 1px solid black;
            width: 576px;
            height: 576px;
            margin: 0% auto;
            border-radius: 25px;
            align-items: center;
            justify-content: center;
        }
    </style>
    <body>
        <h>DRUG DISPENSARY NAME</h>
        <img alt="image of logo">
        <form>
            <h3>REGISTER</h3>
            <input type="text" placeholder="username">
            <label for="register"></label>
            <select id="register">
             <option> Patient</option>
             <option>Doctor</option>
             <option>Pharmaceutical company director</option>
             <option>Pharmacist</option>
             <option>Supervisor</option>
             </select>
             <input type="password" placeholder="password">
             <input type="text" placeholder="Confirm password">
             <input type="radio" id="show">
             <label for="show">Show password</label>
             <button>Clear</button>
             <button>Confirm</button>
             <a href="Sign in page.html" target="_blank">Already have an account</a><br>
            
        </form>
    </body>
    </html>