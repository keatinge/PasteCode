<!DOCTYPE html>
<html>
<head>
    
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

    <div id="pasteInput" class="well main-container">
        <h1 style="text-align:center">Create New Paste</h1>
        <textarea class="form-control" rows="5" style="height: 600px;" id="paste" placeholder="paste some code"></textarea>
        <div style="text-align:center">
         <button id="submit" class="btn btn-success submit-btn">Continue</button>
        </div>
    </div>

    <div id="alertBox">

    </div>


    <div class="well main-container invis" id="config">
        <h1 style="text-align:center;">Configure your settings for this paste</h1>
        <div class="options">
            <center>

                <form action="submitPaste.php" method="post">

                    <label style="text-align:left;">Title</label>
                    <input type="text" name="title" placeholder="Untitled Project" class="form-control sel-opt" id="title">
                    <br>

                    <label style="text-align:left;">Author</label>
                    <input type="text" placeholder="Anonymous" class="form-control sel-opt" name="author" id="author">
                    <br>

                    <label style="text-align:left;">Deletion Password</label>
                    <input type="password" placeholder="no deletion password" class="form-control sel-opt" name="deletepw" id="deletepw">

                    <input type="hidden" id="pasteContents" name="pasteContents">
                    <br>

                    <a style="width:20%" id="goBack" class="btn btn-danger"><-- Go Back</a>
                    <input type="submit" style="width:20%" id="finalSubmit" value="Submit" class="btn btn-success">
                </form>

            </center>
        </div>

    </div>
</body>


<script>

    var pastedText = "";
    function validatePaste(input) {
        if (input !== "") {
            return true;
        }
        else {
            return false;
        }
    }
    $("#submit").click( function () {
        pastedText = $("#paste").val();

        if (validatePaste(pastedText)) {
            $("#pasteInput").slideUp(400);
            $("#config").removeClass("invis");

            $("#pasteContents").val(pastedText);

        } else {
            alert("There's something wrong with your paste!");
        }

    });


    $("#config").on("click", "#goBack", function () {
        $("#pasteInput").slideDown(400);
        $("#config").addClass('invis');
    });


</script>
</html>
