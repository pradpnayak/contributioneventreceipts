<?php

require_once 'contributioneventreceipts.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function contributioneventreceipts_civicrm_config(&$config) {
  _contributioneventreceipts_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function contributioneventreceipts_civicrm_xmlMenu(&$files) {
  _contributioneventreceipts_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function contributioneventreceipts_civicrm_install() {
  _contributioneventreceipts_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function contributioneventreceipts_civicrm_postInstall() {
  _contributioneventreceipts_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function contributioneventreceipts_civicrm_uninstall() {
  _contributioneventreceipts_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function contributioneventreceipts_civicrm_enable() {
  _contributioneventreceipts_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function contributioneventreceipts_civicrm_disable() {
  _contributioneventreceipts_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function contributioneventreceipts_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _contributioneventreceipts_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function contributioneventreceipts_civicrm_managed(&$entities) {
  _contributioneventreceipts_civix_civicrm_managed($entities);
  $entities[] = [
    'module' => 'contributioneventreceipts',
    'name' => 'contributionpagecustomfield',
    'update' => 'never',
    'entity' => 'OptionValue',
    'params' => [
      'label' => ts('Contribution Page'),
      'name' => 'civicrm_contribution_page',
      'value' => 'ContributionPage',
      'option_group_id' => 'cg_extend_objects',
      'is_active' => 1,
      'options' => ['match' => ['option_group_id', 'name']],
      'version' => 3,
    ],
  ];
  $entities[] = [
    'module' => 'contributioneventreceipts',
    'name' => 'contributionevent_og',
    'update' => 'never',
    'entity' => 'OptionGroup',
    'params' => [
      'label' => ts('Receipt Message Template'),
      'name' => 'contributionevent_og_msg_tpl',
      'is_active' => 1,
      'is_reserved' => 1,
      'options' => ['match' => ['name']],
      'version' => 3,
    ],
  ];
  $entities[] = [
    'module' => 'contributioneventreceipts',
    'name' => 'eventreceipts_customGroup',
    'entity' => 'CustomGroup',
    'update' => 'never',
    'params' => [
      'version' => 3,
      'name' => 'Event_receipts_customGroup',
      'title' => ts('Receipts Template'),
      'extends' => 'Event',
      'style' => 'Inline',
      'is_active' => 1,
      'is_reserved' => 1,
      'is_public' => 0,
    ],
  ];
  $entities[] = [
    'module' => 'contributioneventreceipts',
    'name' => 'eventreceipts_customField',
    'entity' => 'CustomField',
    'update' => 'never',
    'params' => [
      'version' => 3,
      'name' => 'message_tpl_id',
      'label' => ts('Receipt Message Template'),
      'data_type' => 'String',
      'html_type' => 'Select',
      'is_active' => 1,
      'text_length' => 255,
      'default_value' => 0,
      'custom_group_id' => 'Event_receipts_customGroup',
      'help_post' => ts('If selected, CiviCRM sends receipt using this message template during event signup.'),
      'option_group_id' => 'contributionevent_og_msg_tpl',
    ],
  ];
  $entities[] = [
    'module' => 'contributioneventreceipts',
    'name' => 'contributionreceipts_customGroup',
    'entity' => 'CustomGroup',
    'update' => 'never',
    'params' => [
      'version' => 3,
      'name' => 'ContributionPage_receipts_customGroup',
      'title' => ts('ContributionPage Receipts Template'),
      'extends' => 'ContributionPage',
      'style' => 'Inline',
      'is_active' => 1,
      'is_reserved' => 1,
      'is_public' => 0,
    ],
  ];
  $entities[] = [
    'module' => 'contributioneventreceipts',
    'name' => 'contributionreceipts_customField',
    'entity' => 'CustomField',
    'update' => 'never',
    'params' => [
      'version' => 3,
      'name' => 'message_tpl_id',
      'label' => ts('Receipt Message Template'),
      'data_type' => 'String',
      'html_type' => 'Select',
      'is_active' => 1,
      'text_length' => 255,
      'default_value' => 0,
      'custom_group_id' => 'ContributionPage_receipts_customGroup',
      'help_post' => ts('If selected, CiviCRM sends receipt using this message template.'),
      'option_group_id' => 'contributionevent_og_msg_tpl',
    ],
  ];
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function contributioneventreceipts_civicrm_caseTypes(&$caseTypes) {
  _contributioneventreceipts_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function contributioneventreceipts_civicrm_angularModules(&$angularModules) {
  _contributioneventreceipts_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function contributioneventreceipts_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _contributioneventreceipts_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function contributioneventreceipts_civicrm_entityTypes(&$entityTypes) {
  _contributioneventreceipts_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function contributioneventreceipts_civicrm_themes(&$themes) {
  _contributioneventreceipts_civix_civicrm_themes($themes);
}

/**
 * Implements hook_civicrm_alterMailParams().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterMailParams
 */
function contributioneventreceipts_civicrm_alterMailParams(&$params, $context) {
  if (in_array(CRM_Utils_Array::value('groupName', $params), [
    'msg_tpl_workflow_event', 'msg_tpl_workflow_membership', 'msg_tpl_workflow_contribution',
  ]) && in_array(CRM_Utils_Array::value('valueName', $params), [
    'event_online_receipt', 'event_offline_receipt',
    'contribution_online_receipt', 'membership_online_receipt',
  ])) {
    if (empty($params['tplParams'])) {
      $tplParams = CRM_Core_Smarty::singleton()->get_template_vars();
    }
    else {
      $tplParams = $params['tplParams'];
    }

    $entity = NULL;
    switch ($params['valueName']) {
      case 'event_online_receipt':
      case 'event_offline_receipt':
        $objectId = CRM_Utils_Array::value('eventID', $tplParams);
        if (empty($objectId) && !empty($tplParams['event'])) {
          $objectId = CRM_Utils_Array::value('id', $tplParams['event']);
        }
        $entity = 'Event';
        break;

      case 'contribution_online_receipt':
      case 'membership_online_receipt':
        $objectId = $tplParams['contributionPageId'];
        $entity = 'ContributionPage';
    }

    if (empty($objectId)) {
      return;
    }

    $messageTemplateId = _contributioneventreceipts_civicrm_getMessageTempId(
      $objectId, $entity
    );

    if ($messageTemplateId) {
      $params['valueName'] = $params['groupName'] = NULL;
      $params['messageTemplateID'] = $messageTemplateId;
    }
  }
}

/**
 * Get Message template id for receipt.
 *
 * @param integer $objectId
 * @param string $entity
 *
 * @return integer
 */
function _contributioneventreceipts_civicrm_getMessageTempId($objectId, $entity) {
  $customFieldId = _contributioneventreceipts_civicrm_getCustomFieldId($entity);
  if ($customFieldId) {
    try {
      return civicrm_api3($entity, 'getvalue', [
        'return' => "custom_{$customFieldId}",
        'id' => $objectId,
      ]);
    }
    catch (Exception $e) {
      // ignore exception
    }
  }
  return 0;
}

/**
 * Get custom field Id.
 *
 * @param string $namePrefix
 *
 * @return void
 */
function _contributioneventreceipts_civicrm_getCustomFieldId($namePrefix) {
  try {
    return civicrm_api3('CustomField', 'getvalue', [
      'return' => 'id',
      'custom_group_id' => "{$namePrefix}_receipts_customGroup",
      'name' => 'message_tpl_id',
    ]);
  }
  catch (Exception $e) {
    // ignore exception
  }
  return;
}

/**
 * Implements hook_civicrm_fieldOptions().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_fieldOptions
 */
function contributioneventreceipts_civicrm_fieldOptions($entity, $field, &$options, $params) {
  if (in_array($entity, ['Event', 'ContributionPage']) && strpos($field, 'custom_') === 0) {
    $id = str_replace('custom_', '', $field);
    try {
      civicrm_api3('CustomField', 'getvalue', [
        'return' => 'id',
        'custom_group_id' => "{$entity}_receipts_customGroup",
        'name' => 'message_tpl_id',
        'id' => $id,
      ]);
      $options = _contributioneventreceipts_civicrm_getTemplates();
    }
    catch (Exception $e) {
    }
  }
}

/**
 * Get all message templates.
 *
 * @return array
 */
function _contributioneventreceipts_civicrm_getTemplates() {
  $result = civicrm_api3('MessageTemplate', 'get', [
    'return' => ['id', 'msg_title'],
    'is_active' => 1,
    'options' => ['limit' => 0, 'sort' => 'msg_title'],
    'is_default' => 1,
  ])['values'];
  return array_column($result, 'msg_title', 'id');
}

/**
 * Implements hook_civicrm_buildForm().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_buildForm
 */
function contributioneventreceipts_civicrm_buildForm($formName, &$form) {
  if ('CRM_Custom_Form_CustomDataByType' == $formName
    && $form->getVar('_type') == 'Event'
  ) {
    CRM_Core_Resources::singleton()->addStyle(
      '.custom-group-Event_receipts_customGroup { display: none !important; }'
    );
  }

  if (in_array($formName, [
    'CRM_Event_Form_ManageEvent_Registration',
    'CRM_Contribute_Form_ContributionPage_ThankYou',
  ])) {
    $namePrefix = 'ContributionPage';
    if ('CRM_Event_Form_ManageEvent_Registration' == $formName) {
      $namePrefix = 'Event';
    }

    $form->assign('namePrefix', $namePrefix);
    $snippet = CRM_Utils_Request::retrieve('snippet', 'String');
    if (empty($snippet)) {
      return;
    }
    try {
      $customField = civicrm_api3('CustomField', 'getsingle', [
        'return' => ['id', 'label', 'help_post'],
        'custom_group_id' => "{$namePrefix}_receipts_customGroup",
        'name' => 'message_tpl_id',
      ]);
      $form->assign('msgTPLFieldNamePostHelp', $customField['help_post']);
      $options = civicrm_api3($namePrefix, 'getoptions', [
        'field' => "custom_{$customField['id']}",
      ])['values'];
      $form->add(
        'select', 'message_tpl_id', $customField['label'], $options, FALSE,
        ['class' => ' crm-select2 ', 'placeholder' => '-- select msg tpl --']
      );
      CRM_Core_Region::instance('page-body')->add([
        'template' => 'CRM/ContributionEventReceipts/Form/common.tpl',
      ]);

      $default = [
        'message_tpl_id' => '',
      ];
      if ($form->getVar('_id')) {
        $default['message_tpl_id'] = _contributioneventreceipts_civicrm_getMessageTempId(
          $form->getVar('_id'),
          $namePrefix
        );
      }
      $form->setDefaults($default);
    }
    catch (Exception $e) {
      //ignore exception.
    }
  }
}

/**
 * Implements hook_civicrm_buildForm().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_buildForm
 */
function contributioneventreceipts_civicrm_postProcess($formName, &$form) {
  if (in_array($formName, [
    'CRM_Event_Form_ManageEvent_Registration',
    'CRM_Contribute_Form_ContributionPage_ThankYou',
  ])) {
    $submitValues = $form->_submitValues;
    if (isset($submitValues['message_tpl_id'])) {

      $entity = 'ContributionPage';
      if ('CRM_Event_Form_ManageEvent_Registration' == $formName) {
        $entity = 'Event';
      }

      $customFieldId = _contributioneventreceipts_civicrm_getCustomFieldId($entity);
      if (empty($customFieldId)) {
        return;
      }
      civicrm_api3($entity, 'create', [
        "custom_{$customFieldId}" => $submitValues['message_tpl_id'],
        'id' => $form->getVar('_id'),
      ]);
      $form->ajaxResponse['updateTabs']['#tab_settings'] = 1;
    }
  }
}
