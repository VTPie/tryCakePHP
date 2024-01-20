<?php echo $this->Html->css('bootstrap.min'); ?>
<div>
    <h3 class='text-center mt-4 text-primary fw-bold'>Todo List</h3>
    <?php echo $this->Html->link('Add new todo', ['action'=>'addTodo'], ['class'=>'btn btn-primary mb-2']) ?>
    <table class='table table-striped'>
        <thead>
            <th>
                No.
            </th>
            <th>
                Title
            </th>
            <th>
                Description
            </th>
            <th>
                Action
            </th>
        </thead>  
        <tbody>
            <?php if(!empty($todos)): ?>
                <?php foreach($todos as $index => $todo): ?>
                    <tr>
                        <td>
                            <?php echo ($index + 1) ?>
                        </td>
                        <td>
                            <?php echo $todo->Title;?>
                        </td>
                        <td>
                            <?php echo $todo->Description;?>
                        </td>
                        <td>
                            <?= $this->Html->link(
                                'View', 
                                ['action'=>'viewTodo', $todo->ID], 
                                ['class'=>'btn btn-primary']
                            ) ?>
                            <?= $this->Html->link(
                                'Edit',
                                ['action'=>'editTodo', $todo->ID], 
                                ['class' => 'btn btn-warning']
                            ) ?>
                            <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'deleteTodo', $todo->ID],
                                ['confirm' => 'Are you sure you want to delete this TODO ?', 'class' => 'btn btn-danger', 'method' => 'delete']
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No todos found</td>
                </tr>
            <?php endif; ?>    
        </tbody>
    </table>
</div>