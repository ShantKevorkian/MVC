<?php if($this->userInfo['id'] == $_SESSION['userId']): ?>
    <?php header("Location: /account");?>
<?php endif; ?>
<div class = "container-fluid mt-5">
    <div class="m-auto bg-light border border-secondary rounded mt-5" style = "width: 35%;">
        <div class = "bg-secondary">
            <h4 class = 'p-3 text-light m-0'><a href = "/account/friends" class = "fas fa-angle-double-left mr-3 text-light" style = "text-decoration: none;"></a><?=$this->userInfo['name']?></h4>
        </div>
        <div style = "height: 700px; overflow-y: auto;" class = "d-flex flex-column" id = "chatMsg"> 
            <?php if(!empty($this->get_msg)): ?>
                <?php foreach ($this->get_msg as $msg): ?>
                    <?php if($msg["from_id"] == $_SESSION['userId']): ?>
                        <small class = "ml-4 mt-3">You</small>
                        <div class = "w-75">
                            <h5 class = "ml-3 mb-0 float-left bg-primary p-3 text-light" style = "border-radius: 20px;"><?=$msg["body"]?></h5>
                        </div>
                        <small class = "ml-4 mb-1"><?=substr($msg["date"], 11, -3)?></small>
                    <?php else: ?>
                        <div>
                            <small class = "mr-4 mt-3 float-right"><?=$this->userInfo['name']?></small>
                        </div>
                        <div>
                            <h5 class = "mr-3 mb-0 float-right bg-dark p-3 text-light" style = "border-radius: 20px;"><?=$msg["body"]?></h5>
                        </div>
                        <div>
                            <small class = "mr-4 mb-1 float-right"><?=substr($msg["date"], 11, -3)?></small>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <?php $this->get_msg[0]['id'] = 0; ?>
                <h6 class = "m-4 d-flex justify-content-center text-dark" id = "noMsg">Connect with your friend by sending a message</h6>
            <?php endif; ?>
        </div>
        <div class = "mt-auto border-top border-secondary rounded">
            <div class="input-group">
                <input type="text" autocomplete="off" class="form-control p-2" placeholder="Enter message..." id = "chatInput" name = "chat" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="btn btn-secondary btn-sm rounded-0 pl-3 pr-3" id = "button">Send<i class = "fa fa-paper-plane ml-2" aria-hidden="true"></i></button>
            </div> 
        </div>
    </div>
</div>
<script>
    var lastMsgId = <?=end($this->get_msg)['id']?>;
    $(function(){
        $("#chatInput").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#button").click();
            }
        });
    
        $("#button").click(function() {
            let msg = $("#chatInput").val();
            if(msg.length > 0) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/account/sentMsg/<?=$this->userInfo['id']?>",
                    data: {
                        chat: msg
                    },
                    beforeSend: function() {
                        $("#noMsg").replaceWith("");
                        $("#chatMsg").append("<small class = 'ml-4 mt-3'>You</small>");
                        $("#chatMsg").append("<div class = 'w-75'><h5 class = 'ml-3 mb-0 float-left bg-primary p-3 text-light' style = 'border-radius: 20px;' id = 'test'>" + msg + "</h5></div>");
                        $("#chatMsg").append("<small class = 'ml-4 mb-1 text-secondary' id = 'clock'><i class = 'fas fa-clock'></i></small>");
                        $('#chatMsg').scrollTop($('#chatMsg')[0].scrollHeight);
                    },
                    success: function(response) {
                        $("#clock").replaceWith("<small class = 'ml-4 mb-1'>" + response['date'].slice(11, -3) + "</small>");
                        $('#chatMsg').scrollTop($('#chatMsg')[0].scrollHeight);
                        lastMsgId++;
                    },
                    error: function() {
                        alert('Error - Something went wrong, try again later');
                    }
                });
                $("#chatInput").val("");
            }
        });

        setInterval(function() {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: `/account/getMsg/<?=$this->userInfo['id']?>/${lastMsgId}`,
                success: function(response) {
                    if(response.length > 0) {
                        lastMsgId = response[response.length - 1]['id'];
                        response.forEach(function(response) {
                            if(response['from_id'] != <?=$_SESSION['userId']?>) {
                                $("#noMsg").replaceWith("");
                                $("#chatMsg").append("<div><small class = 'mr-4 mt-3 float-right'>" + response['name'] + "</small></div>");
                                $("#chatMsg").append("<div><h5 class = 'mr-3 mb-0 float-right bg-dark p-3 text-light' style = 'border-radius: 20px;'>" + response['body'] + "</h5></div>");
                                $("#chatMsg").append("<div><small class = 'mr-4 mb-1 float-right'>" + response['date'].slice(11, -3) + "</small></div>");
                                $('#chatMsg').scrollTop($('#chatMsg')[0].scrollHeight);
                            }
                        });
                    }
                }
            });
        }, 800)
    });
</script>
