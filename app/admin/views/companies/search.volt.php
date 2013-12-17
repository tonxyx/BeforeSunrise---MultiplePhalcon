<?php echo $this->getContent(); ?>

<ul class="pager">
    <li class="previous pull-left">
        <?php echo $this->tag->linkTo(array('companies/index', '&larr; Go Back')); ?>
    </li>
    <li class="pull-right">
        <?php echo $this->tag->linkTo(array('companies/new', 'Create companies', 'class' => 'btn btn-primary')); ?>
    </li>
</ul>

<?php $v6670436361iterated = false; ?><?php $v6670436361iterator = $page->items; $v6670436361incr = 0; $v6670436361loop = new stdClass(); $v6670436361loop->length = count($v6670436361iterator); $v6670436361loop->index = 1; $v6670436361loop->index0 = 1; $v6670436361loop->revindex = $v6670436361loop->length; $v6670436361loop->revindex0 = $v6670436361loop->length - 1; ?><?php foreach ($v6670436361iterator as $company) { ?><?php $v6670436361loop->first = ($v6670436361incr == 0); $v6670436361loop->index = $v6670436361incr + 1; $v6670436361loop->index0 = $v6670436361incr; $v6670436361loop->revindex = $v6670436361loop->length - $v6670436361incr; $v6670436361loop->revindex0 = $v6670436361loop->length - ($v6670436361incr + 1); $v6670436361loop->last = ($v6670436361incr == ($v6670436361loop->length - 1)); ?><?php $v6670436361iterated = true; ?>
<?php if ($v6670436361loop->first) { ?>
<table class="table table-bordered table-striped" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Telephone</th>
            <th>Address</th>
            <th>City</th>
        </tr>
    </thead>
<?php } ?>
    <tbody>
        <tr>
            <td><?php echo $company->id; ?></td>
            <td><?php echo $company->name; ?></td>
            <td><?php echo $company->telephone; ?></td>
            <td><?php echo $company->address; ?></td>
            <td><?php echo $company->city; ?></td>
            <td width="12%"><?php echo $this->tag->linkTo(array('companies/edit/' . $company->id, '<i class="icon-pencil"></i> Edit', 'class' => 'btn')); ?></td>
            <td width="12%"><?php echo $this->tag->linkTo(array('companies/delete/' . $company->id, '<i class="icon-remove"></i> Delete', 'class' => 'btn')); ?></td>
        </tr>
    </tbody>
<?php if ($v6670436361loop->last) { ?>
    <tbody>
        <tr>
            <td colspan="7" align="right">
                <div class="btn-group">
                    <?php echo $this->tag->linkTo(array('companies/search', '<i class="icon-fast-backward"></i> First', 'class' => 'btn')); ?>
                    <?php echo $this->tag->linkTo(array('companies/search?page=' . $page->before, '<i class="icon-step-backward"></i> Previous', 'class' => 'btn ')); ?>
                    <?php echo $this->tag->linkTo(array('companies/search?page=' . $page->next, '<i class="icon-step-forward"></i> Next', 'class' => 'btn')); ?>
                    <?php echo $this->tag->linkTo(array('companies/search?page=' . $page->last, '<i class="icon-fast-forward"></i> Last', 'class' => 'btn')); ?>
                    <span class="help-inline"><?php echo $page->current; ?>/<?php echo $page->total_pages; ?></span>
                </div>
            </td>
        </tr>
    <tbody>
</table>
<?php } ?>
<?php $v6670436361incr++; } if (!$v6670436361iterated) { ?>
    No companies are recorded
<?php } ?>
