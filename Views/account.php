<div class = "container-fluid">
    <div class="row mt-2">
        <?php
        if($this->friendsAccount): ?>
            <?php if($this->userInfo['avatar'] == NULL): ?>
                <?php $this->userInfo['avatar'] = "avatar.png"; ?>
            <?php endif; ?>
            <div class='col-sm-3'>
                <div class='bg-light border border-secondary rounded mt-2'>
                    <h4 class = 'd-flex justify-content-center p-2 bg-secondary text-light'><?=$this->userInfo['name']?></h4>
                    <div class = 'd-flex justify-content-center'>
                        <img src='/Public/Images/Avatars/<?=$this->userInfo['avatar']?>' alt='avatar' class = 'img-fluid'>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class='col-sm-3'>
                    <div class='bg-light border border-secondary rounded mt-2'>
                        <h4 class = 'd-flex justify-content-center p-2 bg-secondary text-light'><?=$this->userName?></h4>
                        <div class = 'd-flex justify-content-center'>
                            <img src='/Public/Images/Avatars/<?=$this->userAvatar?>' alt='avatar' class = 'img-fluid'>
                        </div>
                        <span id = 'error' class='d-flex justify-content-center text-danger'><?=$this->error_msg?></span>
                        <div class='custom-file'>
                            <form method='POST' enctype='multipart/form-data'> 
                                <input type='file' class = 'custom-file-input' name='avatar' onchange='this.form.submit();'>
                                <label class='custom-file-label' for = 'image'>Choose Image to Upload</label>
                            </form>
                        </div>
                    </div>
                </div>
        <?php endif; ?>
    </div>
</div>