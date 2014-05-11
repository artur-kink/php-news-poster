<html>
    <head>
        <title>Posts</title>
    </head>
    <body>
<?php
    require "db.php";
?>
        <a href="post.php"><img src="images/add.png"/>New Post</a>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Post Time</th>
                    <th>Body</th>
                    <th></th>
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
                        echo "<td>" . $row->body . "</td>";
                        echo "<td><a href='post.php?action=edit&id=" . $row->id . "'><img src='images/pencil.png'/></a>" .
                             "<a href='post.php?action=delete&id=" . $row->id . "'><img src='images/delete.png'/></a></td>";
                        echo "</tr>";
                    }
                }
            ?>
            </tbody>
        </table>
    </body>
</html>