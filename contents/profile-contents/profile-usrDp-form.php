<link rel="stylesheet" type="text/css" href="assets/css/logupform.css">
<link rel="stylesheet" type="text/css" href="assets/css/profile-css/profile-usr-editform.css">

<div class="usrEditForm">

    <h1 style="text-align: center; padding-top: 28px; color: #252436;">Upload Photo</h1>

    <div class="logupBox">
        <form action="includes/edit-usrinfo.inc.php" method="post" enctype="multipart/form-data">

            <div style="margin: 22px 0px 0px;">
            <?php
                if (isset($_REQUEST['error']) && $_REQUEST['error']=="fileTypeNotMatched") {
                    echo '<p style="color: red; padding-bottom: 20px;">You can not upload file of this type.</p>';
                }elseif (isset($_REQUEST['error']) && $_REQUEST['error']=="bigFile") {
                    echo '<p style="color: red; padding-bottom: 20px;">File size is too large!</p>';
                }elseif (isset($_REQUEST['error']) && $_REQUEST['error']=="uploadingFailed") {
                    echo '<p style="color: red; padding-bottom: 20px;">There was an error uploading your file!</p>';
                }
            ?>
            
            </div>
            
            <label for="">Choose your photo(jpg, jpeg, png)</label>
            <input type="file" style="padding-top:8px;" name="usrDp" required>

            
            <button type="submit" name="usrDpBtn" style="margin:20px 0px 20px;">Upload/Change</button>

        </form>

    </div>

</div>