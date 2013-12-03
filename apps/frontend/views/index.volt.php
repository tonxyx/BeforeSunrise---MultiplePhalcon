<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php echo $this->tag->getTitle(); ?>
        <?php echo $this->tag->stylesheetLink('bootstrap/css/bootstrap.css'); ?>
        <?php echo $this->tag->stylesheetLink('bootstrap/css/bootstrap-responsive.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/style.css'); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Radna">
        <meta name="author" content="Ditus Team">
    </head>
    <body>
        <?php echo $this->getContent(); ?>
        <?php echo $this->tag->javascriptInclude('js/jquery.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('bootstrap/js/bootstrap.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/utils.js'); ?>
    </body>
</html>