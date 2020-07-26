{if $form.message_tpl_id.html}
<table class="msgTPLFieldName-block">
  <tr class="crm-event-manage-registration-form-block-message_tpl_id">
    <td scope="row" class="label" width="20%">{$form.message_tpl_id.label}</td>
    <td>
      {$form.message_tpl_id.html}
      <br>
      <span class='description'>{$msgTPLFieldNamePostHelp}</span>
    </td>
  </tr>
</table>
{literal}
<script type="text/javascript">
  CRM.$(function($) {
    {/literal}{if $namePrefix neq 'ContributionPage'}{literal}
      $('div#confirmEmail table tbody')
        .append($('table.msgTPLFieldName-block tr'));
    {/literal}{else}{literal}
      $('table#receiptDetails tbody')
        .append($('table.msgTPLFieldName-block tr'));
    {/literal}{/if}{literal}
  });
</script>
{/literal}
{/if}
