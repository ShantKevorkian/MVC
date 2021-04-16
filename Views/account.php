<div class = "container-fluid">
    <div class="row mt-2">
    <?php
    if($this->friendsAccount) {
        if($this->userInfo['avatar'] == NULL) {
            $this->userInfo['avatar'] = "avatar.png";
        }
        echo "<div class='col-sm-3'>
                <div class='bg-light border border-secondary rounded mt-2 border border-secondary'>
                    <h4 class = 'd-flex justify-content-center'>Profile Picture</h4>
                    <div class = 'd-flex justify-content-center'>
                    <img src='/Public/Images/Avatars/".$this->userInfo['avatar']."' alt='avatar' class='rounded img-thumbnail'>
                    </div>
                </div>
            </div>
            <div class='col-sm'>
                <h3 class='text-light'>Name: ".$this->userInfo['name']."</h3>
            </div>";
    }
    else {
        echo "<div class='col-sm-3'>
                <div class='bg-light border border-secondary rounded mt-2 border border-secondary'>
                    <div class = 'd-flex justify-content-center'>
                        <img src='/Public/Images/Avatars/".$this->userAvatar."' alt='avatar' class='rounded img-thumbnail'>
                    </div>
                    <span id = 'error' class='d-flex justify-content-center text-danger'>".$this->error_msg."</span>
                    <div class='custom-file'>
                        <form method='POST' enctype='multipart/form-data'> 
                            <input type='file' class = 'custom-file-input text-light' name='avatar' onchange='this.form.submit();'>
                            <label class='custom-file-label' for = 'image'>Choose Image to Upload</label>
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-sm'>
                <h3 class='text-light'>Name: ".$this->userName."</h3>
            </div>";
    }
    ?>
    </div>
</div>