<?php
require_once "../logics/datas_users.php";
$users_with_phones = $datas_users->get_users_with_phones();
$phones = $datas_users -> get_phones();

$page = 1;
$reversed = False;
if(isset($_GET['page'])) $page = $_GET['page'];
if(isset($_GET['reversed'])) $reversed = $_GET['page'];
$users = $datas_users -> get_users($page, $reversed);

?>

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
                            <?php
                                if(isset($_GET["reversed"]) and $_GET["reversed"] == True){
                                    echo "<th class='reversed'><a href=list_users.php?page=$page>At first</a></th>";
                                }else{
                                    echo "<th class='reversed'><a href=list_users.php?page=$page&reversed=True>From the end</a></th>";
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($users as $key => $value){
                                $id = $value['id'];
                                $first_name = $value['first_name'];
                                $email = $value['email'];
                                $last_name = $value['last_name'];
                                $company_name = $value['company_name'];
                                $position = $value['position'];
                                $phone = "";
                                for($i = 0; $i < count($phones); $i++)
                                    if (in_array($value['id'], $phones[$i])) $phone = $phones[$i]["phoness"];

                                echo "
                                    <tr>
                                        <td>$id</td>
                                        <td>$first_name</td>
                                        <td>$last_name</td>
                                        <td>$email</td>
                                        <td>$company_name</td>
                                        <td>$position</td>
                                        <td>$phone</td>
                                        <td><a href='edit.php?userId=$id' class='edit'>Edit</a></td>
                                        <td><a href='../logics/user_controller.php?userId=$id' class='delete'>Delete</a></td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination">
            <?php
                require_once "../logics/paginations.php";
                $amount_pages = $pagination -> get_numbers_pagination();
                for($i = 1; $i <= $amount_pages; $i++){
                    echo "<a href='list_users.php?page=$i'>$i</a>";
                }
            ?>
        </div>
    </div>
</body>
</html>
