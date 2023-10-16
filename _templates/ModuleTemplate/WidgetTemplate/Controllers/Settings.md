# Controller [Module]/[Widget]/Settings

## Description

Sample settings action.

## View

SettingsPanel

## Default View Parameters

[Example #1](https://github.com/wai-blue/Surikata.io/blob/main/src/Surikata/Widgets/Products/Actions/Margins.php)
[Example #2](https://github.com/wai-blue/Surikata.io/blob/main/src/Surikata/Widgets/Settings/Actions/DeliveryDefaults.php)
[Example #3](https://github.com/wai-blue/Surikata.io/blob/main/src/Surikata/Widgets/Settings/Actions/Miscellaneous.php)


* settings_group: App/Widgets/[Module]/[Widget]
* title: "Settings for [Module] » [Widget]"
* displayMode: desktop
* template:
  * tabs:
    * title: Basic settings
    * items:
      * setting: defaultSize1
        title: Default size #1
        type: int
        description: The #1 default size of something (this is a sample number setting)
      * setting: defaultSize2
        title: Default size #2
        type: int
        description: The #2 default size of something (this is a sample number setting)
    * title: Advanced settings
    * items:
      * setting: defaultEmailTemplate1
        title: Default email template #1
        type: text
        description: The #1 default email template of something (this is a sample text setting)
      * setting: defaultSize2
        title: Default size #2
        type: int
        description: The #2 default email template of something (this is a sample text setting)
