<?php echo $this->Html->css('bootstrap.min'); ?>
<?= $this->Form->create($todo, ['url' => $this->Url->build(['action' => 'viewTodo'])]) ?>
  <h3 class='my-2'>View todo</h3>
  <div class="mb-3">
      <?php echo $this->Form->input(
        'Title', 
        ['class'=>'form-control', 'readonly' => true], 
        ['placeholder'=>'Title']); ?>
  </div>
  <div class="mb-3">
      <?php echo $this->Form->input(
        'Description', 
        ['class'=>'form-control', 'readonly' => true], 
        ['placeholder'=>'Description', 'readonly']); ?>
  </div>
  <div>
      <?php echo $this->Html->link('Back', ['action'=>'index'], ['class'=>'btn btn-primary mb-2']); ?>
  </div>
<?= $this->Form->end() ?>