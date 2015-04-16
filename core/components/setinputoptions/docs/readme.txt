---------------------------------------
SetInputOptions
---------------------------------------
Version: 1.0.2
Author: Robin Rijkeboer <robin@qaraqter.nl>
---------------------------------------

SetInputOptions is a very basic CMP that allows you to create groups with their own input options. These options can then be used in TV's, for checkboxes / listboxes etc. This is a better / safer method than the regular way of creating these options (option1==1||option2==2), leaving them vulnerable to typo's and deletion.

# How to use the SetInputOptions extra for MODX

- Install SetInputOptions through the package manager (currently only available on extra.io)
- Go to Extra's > Set Input Options and create a group with some options
- Create a TV with an @SELECT binding to your custom input options as Input Option Value (see example below)
- Fetch the input option values in your content with the getInputOptions or Rowboat snippets

## Connect your TV to your custom input options

An example of an @SELECT binding for checkboxes and radios:
```
@SELECT `name` AS `name`,`id` FROM `[[+PREFIX]]setinputoptions_inputoptions` WHERE `group` = 2 AND `softDelete` = 0 ORDER BY `position`
```

An example @SELECT binding for listboxes and multiselects. Note the first part up till `UNION ALL`, this adds an empty first item to your TV.
```
@SELECT '' AS name, '' AS id UNION ALL ( SELECT `name` AS `name`,`id` FROM `[[+PREFIX]]setinputoptions_inputoptions` WHERE `group` = 1 AND `softDelete` = 0 ORDER BY `position` )
```

## Display input option values using the getInputOptions snippet

```
[[getInputOptions? &tv=`[[*your_template_variable]]`]]
```

### Available properties:

- tpl
- delimiter
- outputDelimiter

### Available placeholders in the row tpl:

- name
- alias

## Display input option values using the Rowboat snippet

You can also use Rowboat to list all the options in a group. Useful for example, for creating filter buttons. Don't forget to download and install Rowboat separately through package manager!

```
[[Rowboat?
    &table=`modx_setinputoptions_inputoptions`
    &tpl=`filterButtonsRow`
    &limit=`10`
    &sortBy=`position`
    &where=`{"group":"1"}`
]]
```