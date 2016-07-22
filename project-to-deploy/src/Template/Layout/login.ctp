<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('example.css') ?>

    <?= $this->fetch('meta') ?>

</head>
<body>
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <div class="login">
        <?= $this->fetch('content') ?>
    </div>
</div>
<footer>
</footer>
</body>
</html>
