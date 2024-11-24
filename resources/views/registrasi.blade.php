<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="stylesheet" href="\css\register.css">
    <style>
        /* Reset dan style dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f0f7f1;
    padding: 20px;
}

.register_form {
    background: rgba(119, 189, 146, 0.2);
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
}

h2 {
    color: #2c584c;
    text-align: center;
    margin-bottom: 30px;
    font-size: 2em;
    font-weight: 600;
    letter-spacing: 1px;
}

.items {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-bottom: 25px;
}

label {
    color: #2c584c;
    font-size: 0.95em;
    font-weight: 500;
    margin-bottom: -8px;
    text-transform: capitalize;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #a8d5bb;
    border-radius: 8px;
    background: white;
    font-size: 1em;
    transition: all 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
}

input[type="submit"] {
    width: 100%;
    padding: 14px;
    background: #70ba72;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1.1em;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background: #5aa15c;
}

/* Animasi hover untuk input fields */
input[type="text"]:hover,
input[type="email"]:hover,
input[type="password"]:hover {
    border-color: #88c98a;
}

/* Responsive design */
@media (max-width: 600px) {
    .register_form {
        padding: 30px 20px;
    }

    h2 {
        font-size: 1.7em;
    }

    input[type="submit"] {
        padding: 12px;
    }
}

/* Error styling */
.error {
    color: #d32f2f;
    font-size: 0.85em;
    margin-top: 4px;
}

/* Success message styling */
.success-message {
    background: #dff0d8;
    color: #3c763d;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 20px;
    text-align: center;
}
    </style>
</head>
<body>
    <form action="{{ route('register.store') }}" method="POST" class="register_form">
        @csrf
        <h2>SIGN UP</h2>
        <div class="items">

        <label for="username">username</label> 
        <input type="text" name="username" required>
        
        <label for="email">email</label>
        <input type="email" name="email" required>
        
        <label for="password">password</label>
        <input type="password" name="password" required>
        
        <label for="confirm">confirm password</label>
        <input type="password" name="password_confirmation"  required>
        </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>