<?php  include('inc/header.php');  ?> 

<?php  require_once('inc/db.php');  ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center display-4 border p-3 my-5 "> Registration System Using PHP </h1>
                <?php if(isset($_SESSION['user_name'])): ?> 
                    <h3>You Are Logged In</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php  include('inc/footer.php');  ?> 
