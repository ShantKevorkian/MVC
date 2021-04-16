<div class = "container-fluid">
    <div class="row mt-2">
        <?php
        foreach ($this->friends as $friend) {
            if($friend['avatar'] == NULL) {
                $friend['avatar'] = "avatar.png";
            }
            echo "<a class='col-sm-4' style = 'text-decoration: none;' href = '/account/user/".$friend['id']."'>
                <div class='bg-light border border-secondary rounded mt-2 border border-secondary'>
                    <div class = 'd-flex justify-content-center'>
                        <img src='/Public/Images/Avatars/".$friend['avatar']."' alt='avatar' class = 'rounded img-fluid' style = 'width: 50%;'>
                        <div class='card-body'>
                            <h5 class='card-title text-dark'>Name: ".$friend['name']."</h5>
                        </div>
                    </div>
                </div>
            </a>";
        }
        ?>
    </div>
</div>