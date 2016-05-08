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


    <div class="well main-container invis" id="config" >
        <h1 style="text-align:center;">Configure your settings for this paste</h1>
        <div class="options">
            <center>

                <label>Visibility</label>
                <select class="form-control sel-opt" id="vis">
                    <option>Public</option>
                    <option>Unlisted</option>
                    <option>One Time View</option>
                </select>
                <br>

                <label style="text-align:left;">Title</label>
                <input type="text" placeholder="Untitled Project" class="form-control sel-opt" id="title">
                <br>

                <label style="text-align:left;">Author</label>
                <input type="text" placeholder="Anonymous" class="form-control sel-opt" id="author">
                <br>

                <label style="text-align:left;">Deletion Password</label>
                <input type="password" placeholder="no deletion password" class="form-control sel-opt" id="deletepw">
                <br>


                <button style="width:20%" id="goBack" class="btn btn-danger"><-- Go Back</button>
                <button style="width:20%" id="finalSubmit" class="btn btn-success">Submit</button>

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

        } else {
            alert("There's something wrong with your paste!");
        }

    });

    $("#config").on("click", "#finalSubmit", function () {


        var visibility = $("#vis").val();
        var title = $("#title").val();
        var author = $("#author").val();
        var deletionPassword = $("#deletepw").val();


        console.log(pastedText);
        console.log(visibility);
        console.log(title);
        console.log(author);
        console.log(deletionPassword);

        var urlString = "submitPaste.php";

        var payload = {
            text : pastedText,
            vis : visibility,
            auth : author,
            delpw : deletionPassword
        };


        var post = $.post(urlString, payload);

        post.done(function (data) {
            response = data;

            //workaround for  php $HTTP_RAW_POST_DATA warning
            var re = /!!!!!(.+)/;
            response = re.exec(response)[1]


            alert(response)


        });






    });



</script>







</html>
