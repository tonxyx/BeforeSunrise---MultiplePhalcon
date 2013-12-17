
<?php echo $this->getContent(); ?>

<div align="right">
    <?php echo $this->tag->linkTo(array('companies/new', 'Create Companies', 'class' => 'btn btn-primary')); ?>
</div>

<?php
    /**
    *prilagođeno za admin - testiranje
    */
?>
<form method="post" action="<?php echo $this->url->get('admin/companies/search'); ?>">

<div class="center scaffold">

    <h2>Search companies</h2>

    <div class="clearfix">
        <label for="id">Id</label>
        <?php echo $form->render('id'); ?>
    </div>

    <div class="clearfix">
        <label for="name">Name</label>
        <?php echo $form->render('name'); ?>
    </div>

    <div class="clearfix">
        <label for="telephone">Telephone</label>
        <?php echo $form->render('telephone'); ?>
    </div>

    <div class="clearfix">
        <label for="address">Address</label>
        <?php echo $form->render('address'); ?>
    </div>

    <div class="clearfix">
        <label for="city">City</label>
        <?php echo $form->render('city'); ?>
    </div>

    <div class="clearfix">
        <?php echo $this->tag->submitButton(array('Search', 'class' => 'btn btn-primary')); ?>
    </div>

</div>

</form>
