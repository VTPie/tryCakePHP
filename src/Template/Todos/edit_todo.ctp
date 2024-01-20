<?php echo $this->Html->css('bootstrap.min'); ?>
<?= $this->Form->create($todo, ['url' => $this->Url->build(['action' => 'editTodo', $todo->ID])]) ?>
  <h3 class='my-2'>Edit todo</h3>
  <div class="mb-3">
      <?php echo $this->Form->input('Title', ['class'=>'form-control'], ['placeholder'=>'Title']); ?>
  </div>
  <div class="mb-3">
      <?php echo $this->Form->input('Description', ['class'=>'form-control'], ['placeholder'=>'Description']); ?>
  </div>
  <div>
      <?php echo $this->Form->button('Save', ['class'=>'btn btn-primary mb-2']); ?>
      <?php echo $this->Html->link('Cancel', ['action'=>'index'], ['class'=>'btn btn-primary mb-2']); ?>
  </div>
<?= $this->Form->end() ?>