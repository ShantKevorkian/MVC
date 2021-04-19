<div class = "container-fluid">
    <div class="row mt-2">
    <?php if($this->userInfo['avatar'] == NULL): ?>
        <?php $this->userInfo['avatar'] = "avatar.png"; ?>
    <?php endif; ?>
        <div class='col-sm-3'>
            <div class='bg-light border border-secondary rounded mt-2'>
                <div class = "bg-secondary">
                    <h4 class = 'p-2 text-light'><?=$this->userInfo['name']?>
                        <span class = "float-right">
                            <?php
                            if($this->friendsAccount): ?>
                                <a href = "/account/chat/<?=$this->userInfo['id']?>" style='font-size: 30px; text-decoration: none;' class = 'far text-light'>&#xf075;</a>
                            <?php endif; ?>
                        </span>
                    </h4>
                </div>
                <div class = 'd-flex justify-content-center'>
                    <img src='/Public/Images/Avatars/<?=$this->userInfo['avatar']?>' alt='avatar' class = 'img-fluid'>
                </div>
                <?php
                if(!$this->friendsAccount): ?>
                    <span id = 'error' class='d-flex justify-content-center text-danger'><?=$this->error_msg?></span>
                    <div class='custom-file'>
                        <form method='POST' enctype='multipart/form-data'> 
                            <input type='file' class = 'custom-file-input' name='avatar' onchange='this.form.submit();'>
                            <label class='custom-file-label' for = 'image'>Choose Image to Upload</label>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>