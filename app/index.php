<?php
//echo realpath('.');
include_once 'libraries/start.php';
include_once 'helpers/session_helper.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "libraries/head.php"; ?>
    <link rel="stylesheet" href="template/css/style_log.css" type="text/css">
</head>

<body>
    <?php include_once "libraries/header.php";

    if (isset($_SESSION['id_u'])) {
        switch ($_SESSION['permission']) {
            case 0:
                include_once "libraries/nav-admin.php";
                break;
        }
    } else {
    ?>
        <div class="container-fluid">
            <section>
                <h3>Shop now</h3>
                <table>
                    <tr>
                        <td>
                            HON
                        </td>
                    </tr>
                </table>
            </section>
        </div>
    <?php
    }
    ?>

    <?php include_once "libraries/footer.php"; ?>

</body>

</html>
