<!doctype html>
<html lang="en-ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/zeroing.css">
    <link rel="stylesheet" href="../css/add_users.css">
    <title>Add Account</title>
</head>
<body>
    <form action="../logics/add_accounts.php" method="post" class="form" autocomplete="off">
        <h1 class="form_title">Add Account</h1>
        <div class="form_group">
            <input type="text" class="form_input" placeholder="First Name" name="first_name">
        </div>
        <div class="form_group">
            <input type="text" class="form_input" placeholder="Last Name" name="last_name">
        </div>
        <div class="form_group">
            <input type="email" class="form_input" placeholder="email" name="email">
        </div>
        <div class="form_group">
            <input type="text" class="form_input" placeholder="Company Name" name="company_name">
        </div>
        <div class="form_group">
            <input type="text" class="form_input" placeholder="Position" name="position">
        </div>
        <div class="form_group phones">
            <input type="text" class="form_input phone" placeholder="Phone 1" name="phone1">
            <input type="text" class="form_input phone" placeholder="Phone 2" name="phone2">
            <input type="text" class="form_input phone" placeholder="Phone 3" name="phone3">
        </div>
        <button class="form_button" type="submit">Add</button>

    </form>
</body>
</html>
