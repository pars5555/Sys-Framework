<form autocomplete="off" class="page-options-block">
    <div class="page-limit-option default-legth">
        <select id="namespace_select">
            {foreach from=$namespaces item=namespace}
                <option value='{$namespace}' {if $selectedNamespace == $namespace}selected{/if}>{$namespace}</option>
            {/foreach}
        </select>
    </div>
    <div class="clear"></div>
</form>
<div id='selectedPageContent'>
    {include file="$content"}
</div>