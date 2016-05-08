<?php
$pasteId = $_GET['id'];
require("settings.php");

$query = $pdo->prepare("SELECT * FROM pastes WHERE ID = :idToCheck");
$query->bindParam("idToCheck", $pasteId);
$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);



$pasteTitle = $result['title'];
$pasteContents = $result['contents'];
$pasteAuthor = $result['author'];
$pasteTime = $result['time'];


if (!$result)
{
    exit("<h1>That paste doesn't exist!</h1>");
}


?>



<!DOCTYPE html>

<html>
<head>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/highlight.js/9.3.0/styles/default.min.css">
    <script src="//cdn.jsdelivr.net/highlight.js/9.3.0/highlight.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>



    <style>
        .btn-container {
    margin-left: auto;
            margin-right: auto;
        }

        .submit-btn {
    width: 80%;
    margin-left:auto;
            margin-right:auto;
            margin-top:20px;
        }

        .sel-opt {
    width:40%;
}


        .main-container {
    overflow:auto;
}

        .invis {
    visibility: hidden;
}

        .ajaxAlert {
    margin-bottom: 5px;
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }




    </style>
</head>

<body>
<div class="container">
    <?php require("navbar.php"); ?>

<div id="pasteBox" class="well main-container">
    <h1 style="text-align:center"><?php
        if ($pasteTitle !== "")
        {
            echo htmlspecialchars($pasteTitle);
        }
        else
        {
            echo "Paste ID: " . htmlspecialchars($pasteId);
        }
        ?></h1>
    <?php
    if ($pasteAuthor != "")
    {
        echo "<h5 style='text-align:center;'>By " . htmlspecialchars($pasteAuthor) . "</h5>";
    }
    ?>
    <pre class="codeFormat"><code><?php echo htmlspecialchars($pasteContents); ?></code></pre>
</div>

</body>
</html>

<script>
    hljs.initHighlighting();
</script>

