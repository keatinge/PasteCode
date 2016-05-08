<?php


require_once("settings.php");
if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['deletepw']) && isset($_POST['pasteContents']))
{

    $title = $_POST['title'];
    $author = $_POST['author'];
    $deletePW = $_POST['deletepw'];
    $pasteContents = $_POST['pasteContents'];
    $time = time();



    $query = $pdo->prepare("INSERT INTO `pastes`(`title`, `author`, `deletepw`, `contents`, `time`) VALUES (:title, :author, :pw, :contents, :currTime)");
    $query->bindParam("title", $title);
    $query->bindParam("author", $author);
    $query->bindParam("pw", $deletePW);
    $query->bindParam("contents", $pasteContents);
    $query->bindParam("currTime", $time);
    $query->execute();

    $lastInsertId = $pdo->lastInsertId();

}
?>

<html>
    <script>
        window.location.replace("<?php echo $baseUrl . "viewPaste.php?id=$lastInsertId"; ?>")
    </script>

</html>
