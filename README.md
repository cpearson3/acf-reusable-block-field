# Advanced Custom Fields: Reusable Block Field

Welcome to the Advanced Custom Fields Reusable Block Field repository on Github.

The **Advanced Custom Fields: Reusable Block Field** is a custom field type for referencing reusable blocks.

The field type provides a sorted dropdown menu of the published reusable blocks on a WordPress website. 

The return value is the post ID of the reusable block. This can be passed to the get_post function (PHP) or Post object (Timber / Twig) to retrieve the post content.

## Compatibility

This ACF field type is compatible with:
* ACF 5

It has been tested on WordPress 6.0.

## Installation

1. Copy the `acf-reusable-block-field` folder into your `wp-content/plugins` folder
2. Activate the ACF Reusable Block Field plugin via the plugins admin page
3. Create a new field via ACF and select the Reusable Block Field type
4. Read the description above for usage instructions

## Changelog

### 1.0.0
* Initial Release.