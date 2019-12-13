<div class="table main-table responsive-table real-voters">
    <ul class="table-row headline-row">
        <li class="table-cell">Name</li>
        <li class="table-cell">English</li>
        <li class="table-cell">Armenian</li>
        <li class="table-cell">Russian</li>
        <li class="table-cell">Actions</li>
    </ul>
    {foreach from=$snippets item=row}
        <ul class="table-row table-row-item">
            <li class="table-cell">{$row->getName()}</li>
            <li class="table-cell"><textarea class="textarea-default" type="text" rows="2" id="phrase_en_{$row->getId()}" >{$row->getEn()}</textarea></li>
            <li class="table-cell"><textarea class="textarea-default" type="text" rows="2" id="phrase_hy_{$row->getId()}" >{$row->getHy()}</textarea></li>
            <li class="table-cell"><textarea class="textarea-default" type="text" rows="2" id="phrase_ru_{$row->getId()}" >{$row->getRu()}</textarea></li>
            <li class="table-cell centered"><a data-rowid="{$row->getId()}" class="button btn-primary f_save btn">Save</a></li>
        </ul>
    {/foreach}
</div>