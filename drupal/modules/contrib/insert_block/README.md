# Insert Block

Sidebar blocks contain all sorts of nifty stuff, but sometimes you want to
stick that stuff into the body of your node. Instead of using PHP snippets
(a possible security hole on public sites), you can use this module.

When it's activated ...

[block:name of module=delta of block] (Drupal 7)
or
[block:block_id] (Drupal 8/9)

... will insert the contents of a rendered sidebar block into the body
of your node. If no delta is specified, the default block for that module
will be displayed.


## Requirements

This module requires no modules outside of Drupal core.


## Installation

You may want to read the PERFORMANCE NOTE, below, before installing.

To install Insert Block, drop it into your modules folder and turn it on.
Then enable the Insert Block filter for the input formats in which you want
to use Insert Block tags. To do this, click the configure link for an input
format at `/admin/settings/filters` and then enable the filter. 

*IMPORTANT SECURITY NOTE:* in the input format filter settings you will want
to check the "Check the roles assigned by the Block module" checkbox if you 
want Insert Block to honor the Block module's role access settings for the 
blocks you insert.


## Usage

Insert Block is intended for use in node content areas but may also be useful
anywhere Drupal's filters are enabled. It works by intercepting the content
stream, detecting that a block request has been made ([block:1] for 
example) and inserting the results of the block specified into the HTML stream.

Determining a Block's machine name

You can determine the machine name by going to the Block Layout configuration
form for administering blocks. In the list of blocks, you'll see a "configure"
link for each row. If you hover your mouse over the configure link, and look in
the status bar at the bottom of your browser, you'll see a URL similar to the 
following: 
`http://localhost/admin/structure/block/manage/my_theme_branding`
In that URL, my_theme_branding is the machine name

In the case of user created blocks, visit the Custom Block Library form.
However over the 'Edit' link. The URL is in the form 
`http://localhost//block/55`
Here 55 is the machine name, so to include that block use [block:55] in any 
content which is using a text format with the insert_block filter enabled.