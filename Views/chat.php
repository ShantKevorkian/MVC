<?php if($this->userInfo['id'] == $_SESSION['userId']): ?>
    <?php header("Location: /account");?>
<?php endif; ?>
<div class = "container-fluid mt-5">
    <div class="m-auto bg-light border border-secondary rounded mt-5 w-50">
        <div class = "bg-secondary">
            <h4 class = 'p-3 text-light'><?=$this->userInfo['name']?></h4>
        </div>
        <div style = "height: 700px; overflow-y: auto" class = "d-flex flex-column">
            <?php
                foreach ($this->get_msg as $msg): ?>
                <?php if($msg["body"] != NULL): ?>
                    <?php if($msg["from_id"] == $_SESSION['userId']): ?>
                        <div class = "w-75">
                            <h5 class = "mt-4 ml-3 float-left bg-primary p-3 text-light" style = "border-radius: 20px;"><?=$msg["body"]?></h5>
                        </div>
                    <?php else: ?>
                        <div>
                            <h5 class = "mt-4 mr-3 float-right bg-dark p-3 text-light" style = "border-radius: 20px;"><?=$msg["body"]?></h5>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class = "mt-auto">
            <div class="input-group">
                <input type="text" class="form-control p-2" placeholder="Enter message..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="btn btn-secondary"><i class = "fa fa-paper-plane" style = "width: 35px;" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>