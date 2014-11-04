<?php
require("app/configs/Global_Config.php");
$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$view = new View($model);
$controller = new Controller($model, $view);
$model->checkUserLoggedIn();
$userData = array ('userName' => $_COOKIE['user'],
                        'userFName' => ucfirst($model->getUserFName((string)$_COOKIE['user'])),
            'userLName' => ucfirst($model->getUserLName((string)$_COOKIE['user'])),
            'userDOB' => $model->getUserDOB((string)$_COOKIE['user']),
            'userInstitution' => $model->getUserInsitution((string)$_COOKIE['user']),
            'userRep' => $model->getUserRep((string)$_COOKIE['user']),
            'userProfilePic' => substr(($model->getUserProfileImage((string)$_COOKIE['user'])), 0, -3)
            );
$user = new User($model, $userData);
if(isset($_POST['Logout'])) {
  $model->logUserOut();
  header('Refresh :0');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="resources/images/logo.png">
    <title>HC > Welcome</title>
    <link rel="stylesheet" type="text/css" href="resources/css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="resources/plugins/vertical-timeline/css/style.css" />
    <script src="resources/plugins/vertical-timeline/js/modernizr.js"></script>
  </head>
<body>
  <div class="wrap">
    <div class="Welcome">
      <h1>History Chains</h1>
    </div>


    <section class="TopChain CreateChainTimeline1">
            <h2>Step 3: Study</h2>
      <h2 id="chainName"><?php $controller->getActiveChain($user); ?> </h2>
             <section id="cd-timeline" class="cd-container">
                <?php $controller->getInitialChain($model->getActiveChain($user)); ?>
    </section>

  </div>
</body>
