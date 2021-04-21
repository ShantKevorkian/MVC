<?php if($this->userInfo['id'] == $_SESSION['userId']): ?>
    <?php header("Location: /account");?>
<?php endif; ?>
<div class = "container-fluid mt-5">
    <div class="m-auto bg-light border border-secondary rounded mt-5 w-50">
        <div class = "bg-secondary">
            <h4 class = 'p-3 text-light m-0'><?=$this->userInfo['name']?></h4>
        </div>
        <div style = "height: 700px; overflow-y: auto;" class = "d-flex flex-column" id = "chatMsg"> 
        <?php foreach ($this->get_msg as $msg): ?>
                <?php if($msg["body"] != ''): ?>
                    <?php if($msg["from_id"] == $_SESSION['userId']): ?>
                        <div class = "w-75">
                            <h5 class = "mt-4 ml-3 mb-0 float-left bg-primary p-3 text-light" style = "border-radius: 20px;"><?=$msg["body"]?></h5>
                        </div>
                        <small class = "ml-4"><?=$msg["date"]?></small>
                    <?php else: ?>
                        <div>
                            <h5 class = "mt-4 mr-3 mb-0 float-right bg-dark p-3 text-light" style = "border-radius: 20px;"><?=$msg["body"]?></h5>
                        </div>
                        <div>
                            <small class = "mr-4 float-right"><?=$msg["date"]?></small>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class = "mt-auto">
            <form>
                <div class="input-group">
                    <input type="text" autocomplete="off" class="form-control p-2" placeholder="Enter message..." id = "chatInput" name = "chat" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button type = "submit" id = "test" class="btn btn-secondary rounded-0 pl-4 pr-4">Send<i class = "fa fa-paper-plane ml-2" aria-hidden="true"></i></button>
                </div> 
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('form').submit(function(event) {
            $(document).scrollTop($(document.getElementById("test")).height());
            event.preventDefault();
            let q = $("#chatInput").val();
            if(q == '') {
                return false;
            }
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/account/getMsg/<?=$this->userInfo['id']?>",
                data: {
                    chat: q
                },
                success: function(response) {
                    $("#chatMsg").append("<div class = 'w-75'><h5 class = 'mt-4 ml-3 mb-0 float-left bg-primary p-3 text-light' style = 'border-radius: 20px;''>" + response['body'] + "</h5></div>");
                    $("#chatMsg").append("<small class = 'ml-4'>" + response['date'] + "</small>");
                }
            });
            $("#chatInput").val("");
        });
    });
</script>