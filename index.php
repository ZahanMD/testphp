<?php
// Handle form submission
$name = $email = $message = "";
$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Basic sanitization
    $name = htmlspecialchars(trim($_POST["name"] ?? ""));
    $email = htmlspecialchars(trim($_POST["email"] ?? ""));
    $message = htmlspecialchars(trim($_POST["message"] ?? ""));

    // Validation
    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Simulate sending (in real use, send email or save to DB)
        $success = "Thank you, $name! Your message has been received.";
        $name = $email = $message = ""; // Clear form
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP One-Page Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        header {
            background: #4CAF50;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        main {
            max-width: 600px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 {
            margin-top: 0;
        }
        input, textarea {
            width: 100%;
            padding: 0.8rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 0.8rem 1.2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
        .message {
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 4px;
        }
        .success {
            background: #d4edda;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
        }
        footer {
            text-align: center;
            padding: 1rem;
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to My PHP Page</h1>
    </header>
    <main>
        <h2>Contact Form</h2>
        <?php if ($success): ?>
            <div class="message success"><?= $success ?></div>
        <?php elseif ($error): ?>
            <div class="message error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="name" placeholder="Your Name" value="<?= $name ?>" required>
            <input type="email" name="email" placeholder="Your Email" value="<?= $email ?>" required>
            <textarea name="message" placeholder="Your Message" rows="5" required><?= $message ?></textarea>
            <button type="submit">Send Message</button>
        </form>
    </main>
    <footer>
        &copy; <?= date("Y") ?> My Simple PHP Site
    </footer>
</body>
</html>
