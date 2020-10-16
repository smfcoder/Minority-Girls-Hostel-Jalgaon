 <!-- Sidebar -->
        <?php 
                $side="SELECT * FROM admin where username='$sname';";
                $eside=mysqli_query($sql,$side);
                $fetch=mysqli_fetch_array($eside);
        ?>

    <ul class="sidebar navbar-nav" style="background-color:white;">
      <li class="nav-item active">
        <a class="nav-link" href="index.php" style="color:black;">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span >Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>Home Page</span>
      </li>
      
      
      <?php
            if($fetch['slider']==1)
            {
      ?>
      <li class="nav-item">
        <a class="nav-link" href="slider.php" style="color:black;">
        <i class="fas fa-retweet"></i>
          <span>Slider</span></a>
      </li>
      
      
        
        <?php
            }
            if($fetch['news']==1)
            {
        ?>
      <li class="nav-item">
        <a class="nav-link" href="marque.php" style="color:black;">
          <i class="fas fa-newspaper"></i>
          <span>News Flash</span></a>
      </li>
      
      <?php
            }
            if($fetch['whatnew']==1)
            {
        ?>
      
      
      
      <li class="nav-item">
        <a class="nav-link" href="whatsnew.php" style="color:black;">
          <i class="fab fa-angellist"></i>
          <span>What's New</span></a>
      </li>
      
      <?php
            }
            if($fetch['addpeople']==1)
            {
        ?>
      
      
      <li class="nav-item">
        <a class="nav-link" href="people.php" style="color:black;">
        <i class="fas fa-user-friends"></i>
          <span>Add People</span></a>
      </li>
      
      <?php
            }
            if($fetch['govlink']==1)
            {
        ?>
      
      
        <li class="nav-item">
        <a class="nav-link" href="govlinks.php" style="color:black;">
          <i class="fas fa-vector-square"></i>
          <span>Scrolling Gov links/images</span></a>
      </li>
      
      <?php
            }
            if($fetch['quicklink']==1)
            {
        ?>
      
      
        <li class="nav-item">
        <a class="nav-link" href="quicklinks.php" style="color:black;">
          <i class="fas fa-link"></i>
          <span>Quicklinks</span></a>
      </li>
      
      <?php
            }
            if($fetch['gallery']==1)
            {
        ?>
      
      
      <li class="nav-item">
        <a class="nav-link" href="gallery.php" style="color:black;">
          <i class="fab fa-envira"></i>
          <span>Gallery</span></a>
      </li>
      
        <?php
            }
            if($fetch['copy']==1)
            {
            
        ?>
        
         <li class="nav-item">
        <a class="nav-link" href="copyright.php" style="color:black;">
          <i class="fab fa-envira"></i>
          <span>Copy Right Link</span></a>
      </li>
        
        
        
        <?php
            }
            if($fetch['parent']==1)
            {
        ?>
        <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>Navigation bar(Menus)</span>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/parentpage.php" style="color:black;">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Add Nav Menu</span></a>
      </li>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/showparentpage.php" style="color:black;">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Delete Nav Menu</span></a>
      </li>
      
      <?php
            }
            if($fetch['subchild']==1)
            {
        ?>
      
      
       <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>Sub Menus page</span>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/subchild.php" style="color:black;">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Add Sub-Menu</span></a>
      </li>
     </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/showsubchild.php" style="color:black;">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>List Sub-Menus with Menu</span></a>
      </li>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/showsubchildwithoutparent.php" style="color:black;">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>List Sub-Menus Without Menu</span></a>
      </li>
      
      <?php
            }
           
        ?>
      
      
       <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>Add content</span>
      </li>
      
      <?php
            if($fetch['addfile']==1)
            {
        ?>
        
        <li class="nav-item">
            <a class="nav-link" href="selectfile.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Add Files</span></a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="delselectfile.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Delete File</span></a>
        </li>      
      
        <li class="nav-item">
            <a class="nav-link" href="orderfile.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Display Files</span></a>
        </li>  
      
      <?php
            }
            if($fetch['addtext']==1)
            {
        ?>
      
      
        <li class="nav-item">
            <a class="nav-link" href="selectortext.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Add Text</span></a>
        </li>
          
        <li class="nav-item">
            <a class="nav-link" href="selectedittext.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Edit Text</span></a>
        </li>      
      
        
        <li class="nav-item">
            <a class="nav-link" href="delselecttext.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Delete Text</span></a>
        </li>      
      
      
     <?php
            }
        ?> 
      
        
         <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>User</span>
      </li>
        
        
        
        <li class="nav-item">
            <a class="nav-link" href="changepass.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Change Password</span></a>
        </li>      
      <?php
            if($fetch['user']==1)
            {        
        ?>
        <li class="nav-item">
            <a class="nav-link" href="adduser.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Add User</span></a>
        </li>
          
        <li class="nav-item">
            <a class="nav-link" href="allusers.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>All Users</span></a>
        </li>      
      <?php
            }
        ?>
          
        <!--<li class="nav-item">-->
        <!--    <a class="nav-link" href="" style="color:black;">-->
        <!--      <i class="fas fa-chalkboard-teacher"></i>-->
        <!--      <span>Delete User</span></a>-->
        <!--</li>      -->
      
        
        
         <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>Logout</span>
      </li>
        
        <li class="nav-item">
            <a class="nav-link" href="logout.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Logout</span></a>
        </li>
        
        
    </ul>