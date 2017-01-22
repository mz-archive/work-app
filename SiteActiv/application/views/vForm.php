<?= Form::open('/Appnum/Form', array('method' => 'post', 'class' => 'uk-form')); ?>
<?= Form::input('uplimit', '10', array('class' => 'input')); ?>
<?= Form::submit('send', 'Вывести числа'); ?>
<?= Form::close(); ?>

