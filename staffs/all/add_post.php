 <?php
    if(isset($_POST['create_post'])){
        
        $post_title=$_POST['title'];
        $post_author=$_POST['author'];
        $post_category_id=$_POST['post_category'];
        $post_status=$_POST['post_status'];
        
        $post_image=$_FILES['image']['name'];
        $post_image_temp=$_FILES['image']['tmp_name'];
		
		//$post_video=$_FILES['video']['name'];
        //$post_video_temp=$_FILES['video']['tmp1_name'];
        
        $post_tags=$_POST['post_tags'];
        $post_content=$_POST['post_content'];
        
		
		$username=$_SESSION['username'];

        
        move_uploaded_file($post_image_temp,"images/$post_image");
        
       // move_uploaded_file($post_video_temp,"images/".$post_video);
		//$url="C:\xampp\htdocs\csedept\images\$post_video";
        
        $query="INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status,username) ";
	$query .="VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}','{$username}')";
        
        $create_post_query=mysqli_query($connection,$query);
      
            confirmPost($create_post_query);   
        $the_post_id=mysqli_insert_id($connection);
         echo "<p class='bg-success'>Post Created <a href='post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Post</a></p>";
    }
?>
   
   
   

   
   <form action="" method="post" enctype="multipart/form-data">
    
         <div class="form-group">
         <lable for="title">Post Title</lable>
         <input type="text" class="form-control" name="title">
     </div>
     
     <div class="form-group">
        <select name="post_category" id="">
            <?php
             $query="SELECT * FROM categories";
            $select_categories=mysqli_query($connection,$query);
            
            confirmQuery($select_categories);

            while($row = mysqli_fetch_assoc($select_categories)){
            $cat_id= $row['cat_id'];
            $cat_title = $row['cat_title'];
                
                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
        ?>
            
        </select>
       </div>
     
     <div class="form-group">
         <lable for="title">organized by</lable>
         <input type="text" class="form-control" name="author">
     </div>
     
     <div class="form-group">
        
         <select name="post_status" id="">
             <option value="draft">Post Status</option>
              <option value="published">Published</option>
               <option value="draft">Draft</option>
         </select>
     </div>
     
     <div class="form-group">
         <lable for="post_image">Post Image</lable>
         <input type="file" name="image"> 
     </div>
     
	<!-- <div class="form-group">
         <lable for="post_image">Post video</lable>
         <input type="file" name="video"> 
     </div>-->
	 
     <div class="form-group">
         <lable for="post_tags">Post Tags</lable>
         <input type="text" class="form-control" name="post_tags"> 
     </div>
     
     <div class="form-group">
         <lable for="post_tags">Post Content</lable>
         <textarea class="form-control" name="post_content" id="" cols="30" rows="10"> 
         </textarea>
     </div>
     
     <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
         
     </div>
     
     
 </form>