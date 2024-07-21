<!doctype html>
<html lang="en-ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/zeroing.css">
    <link rel="stylesheet" href="../css/list_users.css">
    <title>List Of Users</title>
</head>
<body>
    <div class="container">
        <nav>
            <a href="add_users.php">Add Account</a>
        </nav>
        <div class="list_users">
            <div class="search_users">
                <form action="">
                    <input type="text" placeholder="Search..." name="text">
                </form>
            </div>
            <div class="users">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Company Name</th>
                            <th>Position</th>
                            <th>Phones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Alfreds Futterkiste</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>Maria Anders</td>
                            <td><a href="" class="edit">Edit</a></td>
                            <td><a href="" class="delete">Delete</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Alfreds Futterkiste</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>Maria Anders</td>
                            <td><a href="" class="edit">Edit</a></td>
                            <td><a href="" class="delete">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
