<div class="table main-table responsive-table real-voters">
    <ul class="table-row headline-row">
        <li class="table-cell">Page</li>
        <li class="table-cell">English</li>
        <li class="table-cell">Armenian</li>
        <li class="table-cell">Russian</li>
        
    </ul>
    {foreach from=$rows item=row}
        <ul class="table-row table-row-item">
            <li class="table-cell">{$row->getUrl()}</li>
            <li class="table-cell"><input type="text" id="en_{$row->getId()}" value="{$row->getEn()}" style="width: 100%"/></li>
            <li class="table-cell"><input type="text" id="hy_{$row->getId()}" value="{$row->getHy()}" style="width: 100%"/></li>
            <li class="table-cell"><input type="text" id="ru_{$row->getId()}" value="{$row->getRu()}" style="width: 100%"/></li>           
            <li class="table-cell centered"><a data-rowid="{$row->getId()}" class="button btn-primary f_save btn">Save</a></li>
        </ul>
    {/foreach}
</div>