<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = $db->prepare("SELECT * FROM user WHERE user_id = {$_SESSION['id']}");
            $sql->execute();
            $result = $sql->fetchAll();
            $row = array_shift( $result );
          ?>
          <img src="<?php echo get_user_image($row['img']); ?>" alt="">
          <div class="details">
            <span><?php echo $row['user_name'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="<?php echo SITE_URL."/dashbord"; ?>" class="logout">Home</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

<?php include_once(dirname(__DIR__,1)."/inc/footer.php"); ?>
