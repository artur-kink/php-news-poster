<?php
    $title = "";
    $body = "";
    
    if($_GET["action"] == "submit"){
        //Save news post if we this is a submit.
        require "db.php";
        
        $title = $_POST["title"];
        $body = $_POST["body"];

        $result = $mysqli->query("insert into posts(title, body)" .
            "values('" . $title . "', '" . $body . "');");

        if($result){
            header('Location: posts.php');
            exit();
        }else{
            //
        }
    }else if($_GET["action"] == "edit"){
        //Retrieve data for edit form.
        require "db.php";

        $post_id = $_GET["id"];

        $result = $mysqli->query("select * from posts where id = " . $post_id);
        if($result && $post = $result->fetch_object()){
            $title = $post->title;
            $body = $post->body;
        }

    }else if($_GET["action"] == "update"){
        //Update an existing post.
        require "db.php";

        $post_id = $_GET["id"];

        $title = $_POST["title"];
        $body = $_POST["body"];

        $result = $mysqli->query("update posts set title= " .
            "'" . $title . "', body = '" . $body . "' where id = " . $post_id);
        
        if($result){
            header('Location: posts.php');
            exit();
        }else{
            //
        }
    }else if($_GET["action"] == "delete"){
        //Delete an existing post.
        require "db.php";

        $post_id = $_GET["id"];

        $result = $mysqli->query("delete from posts where id = " . $post_id);

        header('Location: posts.php');
        exit();
    }
?>
<html>
    <head>
        <title>Create new post</title>
        <link href="poster_style.css"  rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php if($_GET["action"] == "edit"){ ?>
        <form action="post.php?action=update&id=<?php echo $post_id;?>" method="post">
        <?php }else{ ?>
        <form action="post.php?action=submit" method="post">
        <?php } ?>
            <div>
                Create new post:
                <div class="input_div">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="<?php echo $title;?>"/>
                </div>

                <div class="input_div">
                    <label for="body">Body:</label><br/>
                    <textarea rows="4" cols="60" name="body" id="body"><?php echo $body;?></textarea>
                </div>

                <div>
                    <?php if($_GET["action"] == "edit"){ ?>
                    <input type="submit" value="Save"/>
                    <?php }else{ ?>
                    <input type="submit" value="Post"/>
                    <?php } ?>
                </div>
            </div>
        </form>
    </body>
</html>
