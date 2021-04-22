<?php if($this->userInfo['id'] == $_SESSION['userId']): ?>
    <?php header("Location: /account");?>
<?php endif; ?>
<div class = "container-fluid mt-5">
    <div class="m-auto bg-light border border-secondary rounded mt-5" style = "width: 35%;">
        <div class = "bg-secondary">
            <h4 class = 'p-3 text-light m-0'><a href = "/account/friends" class = "fas fa-angle-double-left mr-3 text-light" style = "text-decoration: none;"></a><?=$this->userInfo['name']?></h4>
        </div>
        <div style = "height: 700px; overflow-y: auto;" class = "d-flex flex-column" id = "chatMsg"> 
            <?php foreach ($this->get_msg as $msg): ?>
                <?php if($msg["body"] != ''): ?>
                    <?php if($msg["from_id"] == $_SESSION['userId']): ?>
                        <small class = "ml-4 mt-3">You</small>
                        <div class = "w-75">
                            <h5 class = "ml-3 mb-0 float-left bg-primary p-3 text-light" style = "border-radius: 20px;"><?=$msg["body"]?></h5>
                        </div>
                        <small class = "ml-4 mb-1"><?=$msg["time"]?></small>
                    <?php else: ?>
                        <div>
                            <small class = "mr-4 mt-3 float-right"><?=$this->userInfo['name']?></small>
                        </div>
                        <div>
                            <h5 class = "mr-3 mb-0 float-right bg-dark p-3 text-light" style = "border-radius: 20px;"><?=$msg["body"]?></h5>
                        </div>
                        <div>
                            <small class = "mr-4 mb-1 float-right"><?=$msg["time"]?></small>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class = "mt-auto">
            <div class="input-group">
                <input type="text" autocomplete="off" class="form-control p-2" placeholder="Enter message..." id = "chatInput" name = "chat" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="btn btn-secondary rounded-0 pl-4 pr-4" id = "button">Send<i class = "fa fa-paper-plane ml-2" aria-hidden="true"></i></button>
            </div> 
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#chatInput").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#button").click();
            }
        });
    
        $("#button").click(function() {
            let q = $("#chatInput").val();
            if(q.length > 0) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/account/getMsg/<?=$this->userInfo['id']?>",
                    data: {
                        chat: q
                    },
                    success: function(response) {
                        $("#chatMsg").append("<small class = 'ml-4 mt-3'>You</small>");
                        $("#chatMsg").append("<div class = 'w-75'><h5 class = 'ml-3 mb-0 float-left bg-primary p-3 text-light' style = 'border-radius: 20px;'>" + response['body'] + "</h5></div>");
                        $("#chatMsg").append("<small class = 'ml-4 mb-1'>" + response['time'] + "</small>");
                        $('#chatMsg').scrollTop($('#chatMsg')[0].scrollHeight);
                        $("#chatInput").val("");
                    }
                });
            }
        });
    });
</script>
