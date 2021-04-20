<div class = "container-fluid">
    <div class="row mt-2">
        <?php
        foreach ($this->friends as $friend): ?>
            <?php if($friend['avatar'] == NULL): ?>
                <?php $friend['avatar'] = "avatar.png"; ?>
            <?php endif; ?>
            <div class = "col-sm-4 mb-3">
                <div class='bg-light border border-secondary rounded mt-2'>
                    <div class = 'bg-secondary'>
                        <h5 class='text-light p-3'><?=$friend['name']?>
                        <span class = "float-right">
                            <a href = "/account/chat/<?=$friend['id']?>" style='font-size: 30px; text-decoration: none;' class = 'far text-light'>&#xf075;</a>
                        </span>
                        </h5>
                    </div>
                    <a class='' style = 'text-decoration: none;' href = '/account/user/<?=$friend['id']?>'>
                        <div class = 'd-flex justify-content-center'>
                            <img src='/Public/Images/Avatars/<?=$friend['avatar']?>' alt='avatar' class = 'img-fluid' >
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>