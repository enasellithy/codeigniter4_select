<?= $this->extend('default') ?>

<?= $this->section('content') ?>


<section>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Select Category
                </h5>
                <p class="card-text">

                <div class="form-group">
                    <label>Main Category</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option selected disabled>...</option>
                        <?php foreach($cats as $v) : ?>
                            <option value="<?= $v['id'] ?>">
                                <?= $v['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group" id="subCategory" style="display: none;">
                    <label>Main Category</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                    </select>
                </div>

                </p>
            </div>
        </div>
    </div>
</section>



<?= $this->endSection() ?>

<?= $this->section('js') ?>

<script>
    $( "#parent_id" ).change(function(){
        let parent_id = $(this).val();
        if(parent_id != null){
            $.get( "getByID/"+parent_id, function(res) {
                let out = '';
                // console.log(res);
                $('#subCategory').css({'display':'block'});
                $.each(res, function(key , value){
                    console.log(value['id']);
                    let items = key == 0 ?? "<option selected disabled>Sub Category</option>";
                    // // let items =  key == 0 ?? "<option selected disabled>Sub Category</option>";
                    out += items +
                        '<option value="'+value['id']+'">'+value['name']+'</option>';
                });
                $('#subCategory #parent_id').html(out);
            });
        }
    });
</script>

<?= $this->endSection() ?>

