<html>
    <head>
        <title>Posts</title>
        <link href="poster_style.css"  rel="stylesheet" type="text/css"/>
    </head>
    <body>
<?php
    require "db.php";
?>
        <a href="post.php"><img src="images/add.png"/>New Post</a>

        <div id="posts_list">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Post Time</th>
                        <th>Last Edited</th>
                        <th>Body</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $posts = $mysqli->query("select * from posts order by post_time desc;");
                    if($posts){
                        while($row = $posts->fetch_object()){
                            echo "<tr>";
                            echo "<td>" . $row->title . "</td>";
                            echo "<td>" . $row->post_time . "</td>";
                            echo "<td>" . $row->edit_time . "</td>";
                            echo "<td>" . $row->body . "</td>";
                            echo "<td class='actions'><a href='post.php?action=edit&id=" . $row->id . "'><img src='images/pencil.png'/></a>" .
                                 "<a href='post.php?action=delete&id=" . $row->id . "'><img src='images/delete.png'/></a></td>";
                            echo "</tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>