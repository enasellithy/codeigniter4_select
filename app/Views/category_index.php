<?= $this->extend('default') ?>

<?= $this->section('content') ?>


<section>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Categories
                </h5>
                <div class="sub-title">
                    <a href="/create" class="btn btn-info">
                        Add Category
                    </a>
                </div>
                <p class="card-text">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Main Category</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($cats as $v) : ?>
                            <tr>
                                <th scope="row">
                                    <?= $v['id'] ?>
                                </th>
                                <th scope="row">
                                    <?= $v['name'] ?>
                                </th>
                                <th scope="row">
                                    <?php
                                     $cat = new \App\Models\Category();
                                     $catName = $cat->find($v['parent_id'])['name'];
                                     print_r($catName);
                                    ?>
                                </th>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </p>
            </div>
        </div>
    </div>
</section>



<?= $this->endSection() ?>

