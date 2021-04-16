<div class = "container-fluid">
    <div class="row mt-2">
        <div class="col-sm-3">
            <div class="bg-light border border-secondary rounded mt-2 border border-secondary">
                <div class = "d-flex justify-content-center">
                    <img src="Public/Images/Avatars/<?=$this->userAvatar?>" alt="avatar"  width='350' height='350' class="rounded">
                </div>
                <span id = "sizeError" class="d-flex justify-content-center text-danger"><?=$this->sizeError?></span>
                <span id = "sizeError" class="d-flex justify-content-center text-danger"><?=$this->typeError?></span>
                <span id = "sizeError" class="d-flex justify-content-center text-danger"><?=$this->uploadError?></span>
                <div class="custom-file">
                    <form action="" method="POST" enctype="multipart/form-data"> 
                        <input type="file" class = "custom-file-input text-light" name="avatar" id = "avatar" onchange="this.form.submit();">
                        <label class="custom-file-label" for="image">Choose Image to Upload</label>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <h3 class="text-light"><?=$this->userName?></h3>
        </div>
    </div>
</div>