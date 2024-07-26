<?php session_start(); ?>
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
<?php
    require_once "../logics/datas_users.php";
    $user = $datas_users -> which_user($_GET['userId']);
    $phones = $datas_users -> which_phone($_GET['userId']);
?>
<h1><a href="list_users.php"><--List Users</a></h1>
<form action="../logics/edit_account.php    " method="post" class="form" autocomplete="off">
    <h1 class="form_title">Edit Account</h1>
    <div class="form_group">
        <input type="text" class="form_input" placeholder="First Name" name="first_name" value="<?=$user[0]['first_name']?>">
    </div>
    <div class="form_group">
        <input type="text" class="form_input" placeholder="Last Name" name="last_name" value="<?=$user[0]['last_name']?>">
    </div>
    <div class="form_group">
        <input type="email" class="form_input" placeholder="email" name="email" value="<?=$user[0]['email']?>">
    </div>
    <div class="form_group">
        <input type="text" class="form_input" placeholder="Company Name" name="company_name" value="<?=$user[0]['company_name']?>">
    </div>
    <div class="form_group">
        <input type="text" class="form_input" placeholder="Position" name="position" value="<?=$user[0]['position']?>">
        <input type="hidden" class="form_input" placeholder="Position" name="user_id" value="<?=$_GET['userId']?>">
    </div>
    <div class="form_group phones">
        <?php
            $insert_or_edit = '';
            $ids = '';
            for($i = 0; $i < 3; $i++){
                $name_placeholder = "Phone" . $i + 1;
                $name_for_input = 'phone' . $i + 1;
                if(isset($phones[$i]['phone'])){
                    $insert_or_edit .= 'edit' . '_';
                    $ids .= $phones[$i]['id'] . '_';
                    $phone = $phones[$i]['phone'];
                    echo "<input type='text' class='form_input phone' placeholder=$name_placeholder name=$name_for_input value='$phone'>";
                }else{
                    $insert_or_edit .= 'insert' . $i + 1 . '_';
                    echo "<input type='text' class='form_input phone' placeholder=$name_placeholder name=$name_for_input>";
                }
            }
            echo "<input type='hidden' name='insert_or_edit' value='$insert_or_edit'>";
            echo "<input type='hidden' name='ids' value='$ids'>";
        ?>
    </div>
    <button class="form_button" type="submit">EDIT</button>
</form>
</body>
</html>
