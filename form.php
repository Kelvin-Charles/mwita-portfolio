<?php require_once 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .form-layout {
            max-width: 400px;
            margin: 0 auto;
        }
        .form-row {
            margin-bottom: 10px;
        }
        .form-row label {
            display: inline-block;
            margin-right: 10px;
        }
        .radio-group {
            margin-left: 20px;
        }
        .radio-group label {
            margin-right: 20px;
        }
        .checkbox-group {
            margin-left: 20px;
        }
        .checkbox-group div {
            margin: 5px 0;
        }
        textarea {
            width: 100%;
            height: 80px;
            margin-top: 5px;
        }
        select {
            width: 200px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Information Form</h1>
        <nav>
            <a href="index.html">Back to Home</a> |
            <a href="view.php">View Submissions</a>
        </nav>
    </header>

    <main>
        <section>
            <form action="process.php" method="POST" class="form-layout">
                <div class="form-row">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>

                <div class="form-row">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>

                <div class="form-row">
                    <label>Gender:</label>
                    <div class="radio-group">
                        <input type="radio" id="male" name="gender" value="Male" required>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="Female">
                        <label for="female">Female</label>
                    </div>
                </div>

                <div class="form-row">
                    <label>Please choose your favorite foods:</label>
                    <div class="checkbox-group">
                        <div>
                            <input type="checkbox" id="steak" name="favorite_foods[]" value="Steak">
                            <label for="steak">Steak</label>
                        </div>
                        <div>
                            <input type="checkbox" id="pizza" name="favorite_foods[]" value="Pizza">
                            <label for="pizza">Pizza</label>
                        </div>
                        <div>
                            <input type="checkbox" id="chicken" name="favorite_foods[]" value="Chicken">
                            <label for="chicken">Chicken</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <label for="favorite_quote">Enter your favorite quote:</label>
                    <textarea id="favorite_quote" name="favorite_quote"></textarea>
                </div>

                <div class="form-row">
                    <label for="education">Select a Level of Education:</label>
                    <select id="education" name="education" required>
                        <option value="">Select...</option>
                        <option value="Jr High">Jr High</option>
                        <option value="High School">High School</option>
                        <option value="College">College</option>
                        <option value="Graduate">Graduate</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="favorite_time">Select your favorite time of day:</label>
                    <select id="favorite_time" name="favorite_time" required>
                        <option value="Morning">Morning</option>
                        <option value="Day">Day</option>
                        <option value="Night">Night</option>
                    </select>
                </div>

                <div class="form-row" style="margin-top: 20px;">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <p id="lastModified"></p>
        <p id="pageLocation"></p>
    </footer>

    <script src="script.js"></script>
</body>
</html> 