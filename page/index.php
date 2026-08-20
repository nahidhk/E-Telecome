<?php
include '../ndsql-admin/config.php';
$pageName = $_GET['p'] ?? 'home';
$pageData = ndsql_get_pages($pageName);
$access = $_GET['access'];
page_title($pageData['title']);
include '../hader.php';

if ($pageName === 'home') {
    header("Location: /");
    exit();
}
$date = trim($pageData['last_edit']);
ndsql_page_views_count($pageName, $pageData['views'] + 1);
$checker = $pageData['status'];
?>

<div class="flex center medel">
    <div class="box">

        <?php if ($checker === 'published') { ?>
        <h1 class="flex center medel">
            <?php echo $pageData['title'] ?>
        </h1>
        <hr>
        <div class="flex beet">
            <div class="td-name">
                <small>
                    Posted by : <?php echo $pageData['editor'] ?> &nbsp;
                    Last updated : <?php echo (new DateTime($date))->format("n/j/y h:i A"); ?>
                </small>
            </div>
            <div class="td-name">
                <small>
                    Total Views : <?php echo $pageData['views'] ?>
                </small>
            </div>
        </div>
        <div>
            <br><br>
            <?php echo $pageData['content'] ?>
        </div>
        <?php } ?>
        <?php if ($checker === 'trash') { ?>
        <h1 class="textCenter">
            <i class="fa-solid fa-trash-can"></i> <br>
            This url has been trash & removed !
        </h1>
        <?php } ?>



        <?php if ($checker === 'private') { ?>

        <?php 
        if($access === $pageData['password']){
            ?>

        <h1 class="flex center medel">
            <?php echo $pageData['title'] ?>
        </h1>
        <hr>
        <div class="flex beet">
            <div class="td-name">
                <small>
                    Posted by : <?php echo $pageData['editor'] ?> &nbsp;
                    Last updated : <?php echo (new DateTime($date))->format("n/j/y h:i A"); ?>
                </small>
            </div>
            <div class="td-name">
                <small>
                    Total Views : <?php echo $pageData['views'] ?>
                </small>
            </div>
        </div>
        <div>
            <br><br>
            <?php echo $pageData['content'] ?>
        </div>

        <?php
        }else{
        ?>


        <div class="flex center medel column">
      
               
          
            <h1> <i class="fa-solid fa-lock"></i> <br> Access Restricted</h1>
            <p>This page access only <span>Admin</span>!</p>
            <?php if ($access) {
                    echo"<p style='color: red'>error Password !</p>" ;
                }  
                ?>
            <div>
                <input id="pass" type="password" class="input" placeholder="Input Admin Password">
            </div>
            <button type="button" onclick="passc()" class="btn">Unlock</button>
        </div>
        <?php }?>
        <?php } ?>
        <script>
        function passc() {
            const passData = document.getElementById('pass');
            if (passData.value) {
                window.location = `/page/?p=<?php echo $pageName?>&access=${passData.value}`;
            } else {
                alert("fild the password!")
            }
        }
        </script>


        <?php if ($checker === 'draft') { ?>
        <h1 class="textCenter">
           <i class="fa-solid fa-computer"></i><br>
            I'ts Working .......!
        </h1>
        <?php } ?>





    </div>
</div>
<?php include '../footer.php'; ?>