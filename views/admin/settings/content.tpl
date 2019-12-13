<div class="table main-table responsive-table real-voters">
    <ul class="table-row headline-row">
        <li class="table-cell">Variable</li>
        <li class="table-cell">Value</li>
        <li class="table-cell">Description</li>
        <li class="table-cell"></li>
        <li class="table-cell"></li>
    </ul>
    {foreach from=$settings item=row}
        <ul class="table-row table-row-item">
            <li class="table-cell">{$row->getVar()}</li>
            <li class="table-cell "><input class="input-default" type="text" value="{$row->getValue()}" id="value_{$row->getId()}"/></li>
            <li class="table-cell "><textarea class="textarea-default" id="description_{$row->getId()}" type="text" rows="2">{$row->getDescription()}</textarea></li>
            <li class="table-cell centered"><a data-row_id="{$row->getId()}" class="button btn-primary f_save btn">Save</a></li>
        </ul>
    {/foreach}
</div>